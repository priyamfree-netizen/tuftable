<?php

namespace App\Livewire\Forms;

use App\Models\User;
use App\Notifications\CustomerEmailVerify;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Providers\RouteServiceProvider;

class VerifySignupOtp extends Component
{
    use LivewireAlert;

    public $otp;
    public $userId;
    public $email;

    public function mount($userId)
    {
        $this->userId = $userId;
        $user = User::findOrFail($userId);
        $this->email = $user->email;
    }

    public function verifyOtp()
    {
        $this->validate(['otp' => 'required|digits:6']);

        $user = User::findOrFail($this->userId);

        if ($user->email_otp !== $this->otp) {
            $this->addError('otp', __('Invalid OTP. Please try again.'));
            return;
        }

        if ($user->email_otp_expires_at && now()->isAfter($user->email_otp_expires_at)) {
            $this->addError('otp', __('OTP has expired. Please request a new one.'));
            return;
        }

        // Mark verified
        $user->email_verified_at = now();
        $user->email_otp = null;
        $user->email_otp_expires_at = null;
        $user->save();

        auth()->login($user);

        return redirect(RouteServiceProvider::ONBOARDING_STEPS);
    }

    public function resendOtp()
    {
        $user = User::findOrFail($this->userId);
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->email_otp = $otp;
        $user->email_otp_expires_at = now()->addMinutes(15);
        $user->save();

        try {
            $user->notify(new CustomerEmailVerify());
            $this->alert('success', 'OTP resent to your email.', ['toast' => true, 'position' => 'top-end']);
        } catch (\Exception $e) {
            $this->alert('error', 'Failed to send OTP. Please try again.', ['toast' => true, 'position' => 'top-end']);
        }
    }

    public function render()
    {
        return view('livewire.forms.verify-signup-otp')
            ->layout('layouts.auth');
    }
}
