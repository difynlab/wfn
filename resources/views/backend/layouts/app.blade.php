<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @yield('title')</title>
        <!-- <link rel="icon" href=""> -->
        
        @stack('before-styles')
            <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.css') }}">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="{{ asset('backend/css/global.css') }}">
        @stack('after-styles')
    </head>

    <body>

        @yield('content')
    
        @stack('before-scripts')
            <script src="{{ asset('backend/js/jquery.js') }}"></script>
            <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
            <script src="{{ asset('backend/js/global.js') }}"></script>
        @stack('after-scripts')
    </body>

</html>