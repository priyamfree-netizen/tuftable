<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <h2 class="text-xl font-bold text-center mb-2 dark:text-white">Email Verification</h2>
    <p class="text-sm text-gray-600 dark:text-gray-400 text-center mb-6">
        We sent a 6-digit OTP to <strong>{{ $email }}</strong>. Enter it below to verify your account.
    </p>

    <form wire:submit.prevent="verifyOtp">
        <div class="mb-4">
            <x-label for="otp" value="Enter OTP" />
            <x-input id="otp" class="block mt-1 w-full text-center text-2xl tracking-widest"
                type="text" wire:model="otp" maxlength="6" placeholder="000000" autofocus />
            <x-input-error for="otp" class="mt-2" />
        </div>

        <x-button class="w-full justify-center">Verify OTP</x-button>
    </form>

    <div class="mt-4 text-center">
        <button wire:click="resendOtp" class="text-sm text-skin-base hover:underline">
            Resend OTP
        </button>
    </div>
</div>
