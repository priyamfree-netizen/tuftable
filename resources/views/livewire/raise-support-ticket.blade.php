<x-dialog-modal wire:model.live="showRaiseSupportTicketModal">
    <x-slot name="title">
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
            </svg>
            <span>@lang('superadmin.raiseSupportTicket')</span>
        </div>
    </x-slot>

    <x-slot name="content">
        @if ($step === 'success')
            {{-- Success State --}}
            <div class="text-center py-8 px-4">
                <div class="mx-auto w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Report Submitted!</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Your report has been sent to the TufTable team. We'll look into it and get back to you.
                </p>
                <x-button wire:click="closeModal">Close</x-button>
            </div>
        @else
            {{-- Form State --}}
            <div class="space-y-4 px-1">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Facing an issue? Report it to the TufTable team and we'll fix it as soon as possible.
                </p>

                {{-- Category --}}
                <div>
                    <x-label for="category" value="Issue Category" />
                    <select id="category" wire:model="category"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-skin-base focus:ring-skin-base rounded-md shadow-sm text-sm">
                        <option value="">-- Select a category --</option>
                        @foreach ($categories as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="category" class="mt-1" />
                </div>

                {{-- Subject --}}
                <div>
                    <x-label for="subject" value="Subject" />
                    <x-input id="subject" type="text" wire:model="subject" class="mt-1 block w-full"
                        placeholder="Brief title of the issue" maxlength="150" />
                    <x-input-error for="subject" class="mt-1" />
                </div>

                {{-- Description --}}
                <div>
                    <x-label for="description" value="Description" />
                    <textarea id="description" wire:model="description" rows="5"
                        placeholder="Describe the issue in detail — what you did, what happened, what you expected..."
                        maxlength="2000"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-skin-base focus:ring-skin-base rounded-md shadow-sm text-sm resize-none"></textarea>
                    <div class="flex justify-between mt-1">
                        <x-input-error for="description" />
                        <span class="text-xs text-gray-400">{{ strlen($description) }}/2000</span>
                    </div>
                </div>

                {{-- Info box --}}
                <div class="p-3 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg text-xs text-blue-700 dark:text-blue-300">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Your restaurant name and account details will be included automatically so we can investigate faster.
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6 px-1 pb-2">
                <x-button-cancel wire:click="closeModal">Cancel</x-button-cancel>
                <x-button wire:click="submit" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="submit">Submit Report</span>
                    <span wire:loading wire:target="submit">Sending...</span>
                </x-button>
            </div>
        @endif
    </x-slot>
</x-dialog-modal>
