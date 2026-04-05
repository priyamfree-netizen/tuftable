@extends('layouts.landing-page')
@section('title', 'Pricing - ' . (global_setting()->name ?? ''))
@section('content')
<div class="max-w-[85rem] px-4 py-16 sm:px-6 lg:px-8 mx-auto">
    <div class="mx-auto mb-10 text-center">
        <h1 class="text-4xl font-bold text-gray-800 dark:text-neutral-200">@lang('landing.pricingTitle1')</h1>
        <p class="mt-3 text-gray-500 dark:text-neutral-400">@lang('landing.pricingSubTitle1')</p>
    </div>
    @include('landing.pricing', ['packages' => $packages, 'modules' => $AllModulesWithFeature])
</div>
@endsection
