<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $currentPassword = '';

    public string $newPassword = '';

    public string $newPasswordConfirmation = '';

    public $avatarUpload = null;

    public ?string $successMessage = null;

    public ?string $errorMessage = null;

    public function mount(): void
    {
        $this->name = auth()->user()->name;
    }

    public function updateProfile(): void
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        auth()->user()->update(['name' => $this->name]);

        $this->successMessage = 'Profile updated successfully.';
        $this->errorMessage = null;
    }

    public function updatePassword(): void
    {
        $this->validate([
            'currentPassword' => ['required', function ($attribute, $value, $fail) {
                if (! Hash::check($value, auth()->user()->password)) {
                    $fail('Current password is incorrect.');
                }
            }],
            'newPassword' => 'required|min:8|confirmed',
        ]);

        auth()->user()->update(['password' => $this->newPassword]);

        $this->currentPassword = $this->newPassword = $this->newPasswordConfirmation = '';
        $this->successMessage = 'Password changed successfully.';
        $this->errorMessage = null;
    }

    public function uploadAvatar(): void
    {
        $this->validate([
            'avatarUpload' => 'required|image|max:2048',
        ]);

        $path = $this->avatarUpload->store('avatars', 'public');
        auth()->user()->update(['avatar' => $path]);

        $this->avatarUpload = null;
        $this->successMessage = 'Profile photo updated.';
        $this->errorMessage = null;
    }

    public function removeAvatar(): void
    {
        auth()->user()->update(['avatar' => null]);
        $this->successMessage = 'Profile photo removed.';
    }

    public function render(): View
    {
        return view('livewire.user-profile')->layout('layouts.pos')->section('content');
    }
}
