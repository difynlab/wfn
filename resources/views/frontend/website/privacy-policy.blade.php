@extends('frontend.layouts.app')

@section('title', 'Privacy Policy')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/privacy-policy.css') }}">
@endpush

@section('content')
    <div class="privacy-policy page-global">
        <div class="section-1 container section-margin">
            <h1 class="page-title">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h1>
            <p class="page-description">{{ $contents->{'description_' . $middleware_language} ?? $contents->description_en }}</p>
        </div>

        <div class="section-2 container">
            <div class="content">{!! $contents->{'content_' . $middleware_language} ?? $contents->content_en !!}</div>
        </div>
    </div>
@endsection