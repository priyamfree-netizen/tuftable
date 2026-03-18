<x-dialog-modal wire:model.live="showRaiseSupportTicketModal">
    <x-slot name="title">
        <h2 class="text-lg">@lang('superadmin.raiseSupportTicket')</h2>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-6">
                <h2 class="text-xl font-bold text-zinc-900 dark:text-white mb-2">Choose Your Support Option</h2>
                <p class="text-sm text-zinc-600 dark:text-zinc-400">Select the support service that best fits your needs</p>
            </div>
            
            <!-- Support Options -->
            <div class="space-y-6">
                <!-- Support Card -->
                <div class="bg-white dark:bg-zinc-800 rounded-xl p-6 border border-zinc-200 dark:border-zinc-700">
                    <div class="flex items-center mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Support</h3>
                            <p class="text-sm text-zinc-600 dark:text-zinc-400">Get help with your issues</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="space-y-2">
                            <div class="flex items-center text-sm">
                                <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-zinc-600 dark:text-zinc-400">Response time: 24-48 working hours</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-zinc-600 dark:text-zinc-400">Email support</span>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center text-sm">
                                <svg class="h-4 w-4 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-zinc-600 dark:text-zinc-400">General documentation and guides</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex w-full pb-4 space-x-4 rtl:space-x-reverse mt-6 justify-end">
                <x-button-cancel  wire:click="$set('showRaiseSupportTicketModal', false)">@lang('app.close')</x-button-cancel>
            </div>
        </div>
    </x-slot>
</x-dialog-modal> 