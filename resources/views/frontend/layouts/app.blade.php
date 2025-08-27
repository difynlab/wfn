<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ App\Models\Setting::find(1)->name }} | @yield('title')</title>
        <link rel="icon" href="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->favicon) }}">
        
        @stack('before-styles')
            <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="{{ asset('frontend/css/select2.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/css/date-picker-x.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/css/swiper.css') }}">
            <link rel="stylesheet" href="{{ asset('frontend/css/global.css') }}">
        @stack('after-styles')
    </head>

    <body>
        <x-frontend.header></x-frontend.header>

        @yield('content')
        
        <x-frontend.footer></x-frontend.footer>

        @stack('before-scripts')
            <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}" async defer></script>
            <script>
                window.siteKey = '{{ config('services.recaptcha.site_key') }}';
            </script>
            <script src="{{ asset('frontend/js/jquery.js') }}"></script>
            <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
            <script src="{{ asset('frontend/js/swiper.js') }}"></script>
            <script src="{{ asset('frontend/js/select2.js') }}"></script>
            <script src="{{ asset('frontend/js/date-picker-x.js') }}"></script>
            <script src="{{ asset('frontend/js/global.js') }}"></script>
        @stack('after-scripts')
    </body>

</html>