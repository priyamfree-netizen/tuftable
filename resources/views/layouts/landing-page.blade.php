<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ session('customer_is_rtl') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="livewire-navigate" content="false">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ global_setting()->logoUrl }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <meta name="keywords" content="{{ global_setting()->meta_keyword ?? global_setting()->name }}">
    <meta name="description" content="{{ global_setting()->meta_description ?? global_setting()->name }}">

    <title>@yield('title', global_setting()->meta_title ?? global_setting()->name)</title>

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
    <script>
        // Safety net: if persisted app components (sidebar/nav) bled in via Livewire SPA,
        // force a hard reload to clear them. This runs synchronously before paint.
        (function() {
            if (document.getElementById('sidebar') || document.querySelector('[wire\\:persist]')) {
                window.location.replace(window.location.href);
            }
        })();
        // Also check after DOM is ready in case components mount async
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('sidebar') || document.querySelector('[wire\\:persist]')) {
                window.location.replace(window.location.href);
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
