<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     *  Override default login attempt to add remember_token update
     */
    protected function attemptLogin(Request $request): RedirectResponse|bool
    {
        $user = User::query()->where($this->username(), $request->{$this->username()})->first();

        if ($user) {
            // If user is pending -> redirect them to verification notice
            if ($user->status === UserStatus::Pending) {
                // Temporarily allow login so they can access verification routes
                Auth::login($user);

                // Redirect to verification notice
                return redirect()->route('verification.notice');
            }

            // If user is active -> allow login
            if ($user->status === UserStatus::Active) {
                $loginAttempt = $this->guard()->attempt(
                    $this->credentials($request),
                    $request->filled('remember_me')
                );

                if ($loginAttempt) {
                    $user->update([
                        'remember_token' => Str::random(40),
                    ]);
                }

                return $loginAttempt;
            }
        }

        return false;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::query()->where($this->username(), $request->{$this->username()})->first();

        if ($user and $user->status !== UserStatus::Active) {
            throw ValidationException::withMessages([
                $this->username() => ['Your account is not active. Please verify your email or contact support.'],
            ]);
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     *  Override loggedOut behavior
     */
    protected function loggedOut(Request $request): RedirectResponse
    {
        // Redirect to login with a success message
        return redirect('login')->with('success', 'Logged out successfully!');
    }
}
