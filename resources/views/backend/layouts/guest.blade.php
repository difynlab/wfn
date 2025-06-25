<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @yield('title')</title>
        <!-- <link rel="icon" href=""> -->

        @stack('before-styles')
            <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.css') }}"></link>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <link rel="stylesheet" href="{{ asset('backend/css/guest.css') }}"></link>
        @stack('after-styles')
    </head>

    <body>
        <div class="guest">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">
                    <div class="d-none d-md-block col-md-5 p-0">
                        <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->guest_image) }}" alt="Image" class="image">
                    </div>

                    <div class="col-12 col-md-7 p-0">
                        <x-backend.notification></x-backend.notification>
                        
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        @stack('before-scripts')
            <script src="{{ asset('backend/js/jquery.js') }}"></script>
            <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
            <script src="{{ asset('backend/js/global.js') }}"></script>
        @stack('after-scripts')
    </body>
</html>