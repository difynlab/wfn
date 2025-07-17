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
            <link rel="stylesheet" href="{{ asset('backend/css/date-picker-x.css') }}">
            <!-- <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/46.0.0/ckeditor5.css" crossorigin> -->

            <!-- <script src="https://cdn.tiny.cloud/1/dnao1075olebawsyyyymw93wlh9iutcayasg1jpajwhhc7rq/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> -->

            <!-- <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' /> -->

            <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet"> -->
            <link rel="stylesheet" href="{{ asset('backend/css/global.css') }}">
        @stack('after-styles')
    </head>

    <body>
        <x-backend.header></x-backend.header>

        <div class="wrapper">
            <x-backend.sidebar></x-backend.sidebar>

            <div class="content">
                @yield('content')
            </div>
        </div>
    
        @stack('before-scripts')
            <script src="{{ asset('backend/js/jquery.js') }}"></script>
            <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
            <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
            <!-- <script src="https://cdn.ckeditor.com/ckeditor5/46.0.0/ckeditor5.umd.js"></script> -->
            <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script> -->
            <!-- <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script> -->
            <script>
                const uploadUrl = "{{ route('admin.ckeditor.upload') }}?_token={{ csrf_token() }}";
            </script>
            <script src="{{ asset('backend/js/select2.js') }}"></script>
            <script src="{{ asset('backend/js/date-picker-x.js') }}"></script>
            <script src="{{ asset('backend/js/chart.js') }}"></script>
            <script src="{{ asset('backend/js/global.js') }}"></script>
        @stack('after-scripts')
    </body>

</html>