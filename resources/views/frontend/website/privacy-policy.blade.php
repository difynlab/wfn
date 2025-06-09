@extends('frontend.layouts.app')

@section('title', 'Privacy Policy')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/privacy-policy.css') }}">
@endpush

@section('content')
    <div class="privacy-policy page-global">
        <div class="section-1 container section-margin">
            <h1 class="page-title">Privacy Policy</h1>
            <p class="page-description">
                Your privacy is important to us. This Privacy Policy outlines how we collect, use, 
                and protect your personal information when you visit our website or use our services. 
                Please review it carefully to understand our practices and your rights. Whether you're 
                listing a warehouse or booking one, your privacy is our priority.
            </p>
        </div>

        <div class="section-2 container">
            <div class="content">
                <h6>1. Information We Collect</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <p>Examples of data we collect may include:</p>
                <ul>
                    <li>Name, email address, and phone number</li>
                    <li>Payment details and billing address</li>
                    <li>Warehouse listings, search preferences, and reviews</li>
                    <li>Location data</li>
                </ul>
            </div>
        </div>
    </div>
@endsection