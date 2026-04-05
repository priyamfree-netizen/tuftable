<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ session('customer_is_rtl') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ global_setting()->logoUrl }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <meta name="keywords" content="{{ global_setting()->meta_keyword ?? global_setting()->name }}">
    <meta name="description" content="{{ global_setting()->meta_description ?? global_setting()->name }}">

    <title>@yield('title', global_setting()->meta_title ?? global_setting()->name)</title>

    <!-- Masco template CSS -->
    <link rel="stylesheet" href="{{ asset('landing_new_assets/index-c46ffb0e.css') }}" />

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    @include('sections.theme_style', [
        'baseColor' => global_setting()->theme_rgb,
        'baseColorHex' => global_setting()->theme_hex,
    ])

    @if (File::exists(public_path() . '/css/app-custom.css'))
        <link href="{{ asset('css/app-custom.css') }}" rel="stylesheet">
    @endif

    @includeIf('sections.custom_script_landing')
    @stack('styles')
</head>

<body class="font-sans antialiased bg-white dark:bg-gray-900">

    @include('partials.landing-header')

    @yield('content')

    @livewireScripts
    <!-- Prevent React bundle from mounting (we only need its CSS/AOS) -->
    <div id="root" style="display:none;"></div>
    <!-- Masco JS bundle for AOS animations and interactions -->
    <script type="module" crossorigin src="{{ asset('landing_new_assets/index-3f204186.js') }}"></script>
    @stack('scripts')
</body>
</html>
