@extends('frontend.layouts.app')

@section('title', 'About')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}">
@endpush
 
@section('content')
    <div class="about">
        <div class="section-1">
            <p class="title">About</p>
        </div>
    </div>
@endsection