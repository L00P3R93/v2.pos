<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(): View {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $rememberMe = !empty($request->remember_me);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], remember: $rememberMe)) {
            // Regenerate the session ID to prevent session fixation attacks
            $request->session()->regenerate();
            // Update the remember token for the user
            $user = Auth::user();
            $user->update([ 'remember_token' => Str::random(40) ]);
            // Redirect to dashboard with a success message
            return redirect('home')->with('success', 'You are now logged in');
        }
        // If authentication fails, redirect back with an error message
        return back()->with('error', 'Invalid email or password');
    }

    public function verify($userId, $hash)
    {
        $user = User::query()->findOrFail($userId);

        // Check if hash is valid
        if(sha1($user->email) !== $hash)
            return redirect()->route('login')->with('error', 'Invalid verification link');

        // Check if email is already verified
        if($user->email_verified_at)
            return redirect()->route('login')->with('info', 'Email already verified. Please login.');

        // Mark email as verified and activate user
        $user->email_verified_at = now();
        $user->status = UserStatus::Active;
        $user->save();

        return redirect()->route('login')->with('success', 'Email verified successfully. You can now login.');
    }

    public function logout(Request $request): RedirectResponse {
        // Log the user out of the application
        Auth::logout();

        // Invalidate the session and regenerate the token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login with a success message
        return redirect('login')->with('success', 'Logged out successfully!');
    }
}
