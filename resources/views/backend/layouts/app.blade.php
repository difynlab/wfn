<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ App\Models\Setting::find(1)->name }} | @yield('title')</title>
        <link rel="icon" href="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->favicon) }}">
        
        @stack('before-styles')
            <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.css') }}">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="{{ asset('backend/css/select2.css') }}">
            <link rel="stylesheet" href="{{ asset('backend/css/swiper.css') }}">
            <link rel="stylesheet" href="{{ asset('backend/css/date-picker-x.css') }}">
            <link rel="stylesheet" href="{{ asset('backend/css/froala.css') }}">
            <link rel="stylesheet" href="{{ asset('backend/css/global.css') }}">
        @stack('after-styles')
    </head>

    <body>
        <x-backend.header></x-backend.header>
        <x-backend.sidebar></x-backend.sidebar>

        <div class="container-fluid">
            <div class="backend-content">
                @yield('content')
            </div>
        </div>
    
        @stack('before-scripts')
            <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
            <script>
                window.siteKey = '{{ config('services.recaptcha.site_key') }}';
            </script>
            <script src="{{ asset('backend/js/jquery.js') }}"></script>
            <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
            <script src="{{ asset('backend/js/froala.js') }}"></script>
            <script src="{{ asset('backend/js/select2.js') }}"></script>
            <script src="{{ asset('backend/js/swiper.js') }}"></script>
            <script src="{{ asset('backend/js/lazyload.js') }}"></script>
            <script src="{{ asset('backend/js/date-picker-x.js') }}"></script>
            <script src="{{ asset('backend/js/chart.js') }}"></script>
            <script src="{{ asset('backend/js/global.js') }}"></script>
        @stack('after-scripts')
    </body>

</html>