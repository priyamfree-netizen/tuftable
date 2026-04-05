<div class="mx-4">

    {{-- Settings Tab (basic landing page settings only — dynamic content editing removed) --}}
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 mt-4">
        <h3 class="mb-4 text-xl font-semibold dark:text-white">@lang('modules.settings.disableLandingSite')</h3>
        <x-help-text class="mb-6">@lang('modules.settings.disableLandingSiteHelp')</x-help-text>
        <form wire:submit="submitForm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

                    <div class="border p-4 rounded-lg dark:border-gray-500 space-y-4">
                     <div>
                        <x-label for="disableLandingSite">
                            <div class="flex items-center cursor-pointer">
                                <x-checkbox name="disableLandingSite" id="disableLandingSite"
                                    wire:model.live='disableLandingSite' />
                                <div class="ms-2">
                                    @lang('modules.settings.disableLandingSite')
                                </div>
                            </div>
                        </x-label>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            @lang('modules.settings.disableLandingSiteHelpDescription')
                        </p>
                     </div>
                     @if (!$disableLandingSite)
                            <div>
                                <x-label for="facebook" value="{{ __('modules.settings.facebook_link') }}" />
                                <x-input id="facebook" class="block mt-1 w-full" type="url"
                                    placeholder="{{ __('placeholders.facebookPlaceHolder') }}" autofocus
                                    wire:model='facebook' />
                                <x-input-error for="facebook" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="instagram" value="{{ __('modules.settings.instagram_link') }}" />
                                <x-input id="instagram" class="block mt-1 w-full" type="url"
                                    placeholder="{{ __('placeholders.instagramPlaceHolder') }}" autofocus
                                    wire:model='instagram' />
                                <x-input-error for="instagram" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="twitter" value="{{ __('modules.settings.twitter_link') }}" />
                                <x-input id="twitter" class="block mt-1 w-full" type="url"
                                    placeholder="{{ __('placeholders.twitterPlaceHolder') }}" autofocus
                                    wire:model='twitter' />
                                <x-input-error for="twitter" class="mt-2" />
                            </div>

                            <div>
                                <x-label for="yelp" value="{{ __('modules.settings.yelp_link') }}" />
                                <x-input id="yelp" class="block mt-1 w-full" type="url"
                                    placeholder="{{ __('placeholders.yelpPlaceHolder') }}" autofocus
                                    wire:model='yelp' />
                                <x-input-error for="yelp" class="mt-2" />
                            </div>
                     @endif
                </div>

                <div class="border p-4 rounded-lg dark:border-gray-500 space-y-4">
                    <div>
                        <x-label for="metaTitle" value="{{ __('modules.settings.metaTitle') }}" />
                        <x-input id="metaTitle" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('placeholders.metaTtilePlaceHolder') }}" autofocus
                            wire:model='metaTitle' />
                        <x-input-error for="metaTitle" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="metaKeyword" value="{{ __('modules.settings.metaKeyword') }}" />
                        <x-input id="metaKeyword" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('placeholders.metaKeywordPlaceHolder') }}" autofocus
                            wire:model='metaKeyword' />
                        <x-input-error for="metaKeyword" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="metaDescription" value="{{ __('modules.settings.metaDescription') }}" />
                        <x-textarea id="metaDescription" class="block mt-1 w-full"
                            placeholder="{{ __('placeholders.metaDescriptionPlaceHolder') }}" autofocus
                            wire:model='metaDescription'></x-textarea>
                        <x-input-error for="metaDescription" class="mt-2" />
                    </div>
                </div>

                <div class="md:col-span-2 mt-4">
                    <x-button>@lang('app.save')</x-button>
                </div>
            </div>
        </form>
    </div>

</div>
