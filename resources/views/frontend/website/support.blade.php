@extends('frontend.layouts.app')

@section('title', 'Support')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/support.css') }}">
@endpush
 
@section('content')
    <div class="support">
        <div class="section-1">
            <p class="title">Support</p>
        </div>
    </div>
@endsection