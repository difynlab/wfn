@extends('frontend.layouts.app')

@section('title', 'Homepage')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/homepage.css') }}">
@endpush
 
@section('content')
    <div class="homepage">
        <div class="section-1">
            <img src="{{ asset('storage/frontend/homepage-banner.png') }}" alt="Banner" class="banner">

            <div class="overlay">
                <p class="title">Find Your Perfect Warehouse, Anytime, Anywhere</p>

                <p class="description">Discover the warehouse that works for you. Whether you're growing a business or need personal storage, our global network lets you search and book flexible spaces that meet your needs, anytime, anywhere.</p>

                <div class="filter"><p>Search Bar</p></div>
            </div>
        </div>
        
        <div class="container section-2">
            <p class="section-title">Explore New Warehouses In Saudi Arabia</p>

            <p class="section-description">Keep up with the newest warehouse updates.</p>

            <p>Riyadh</p>
        </div>
    </div>
@endsection