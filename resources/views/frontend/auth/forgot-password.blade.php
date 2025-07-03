@extends('frontend.layouts.app')

@section('title', 'Forgot Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/forgot-password.css') }}">
@endpush

@section('content')
    <div class="container page-global forgot-password">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xl-5">
                <p class="title">{{ $contents->{'forgot_title_' . $middleware_language} ?? $contents->forgot_title_en }}</p>
                <p class="description">{{ $contents->{'forgot_description_' . $middleware_language} ?? $contents->forgot_description_en }}</p>

                <form action="{{ route('frontend.forgot-password.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="email" class="form-label label">{{ $contents->{'forgot_email_' . $middleware_language} ?? $contents->forgot_email_en }}</label>
                        <input type="email" class="form-control input-field" id="email" name="email" placeholder="{{ $contents->{'forgot_email_placeholder_' . $middleware_language} ?? $contents->forgot_email_placeholder_en }}" required>
                        <x-backend.input-error field="email"></x-backend.input-error>
                    </div>

                    <button type="submit" class="btn forgot-password-button">{{ $contents->{'forgot_button_' . $middleware_language} ?? $contents->forgot_button_en }}</button>
                </form>

                <p class="remember-password">{{ $contents->{'forgot_remember_' . $middleware_language} ?? $contents->forgot_remember_en }}
                    <a href="{{ route('frontend.login') }}" class="span-link">{{ $contents->{'forgot_login_' . $middleware_language} ?? $contents->forgot_login_en }}</a>
                </p>
            </div>
        </div>

        <x-frontend.notification></x-frontend.notification>
    </div>
@endsection