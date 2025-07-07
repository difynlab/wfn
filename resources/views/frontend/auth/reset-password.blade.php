@extends('frontend.layouts.app')

@section('title', 'Reset Password')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/reset-password.css') }}">
@endpush

@section('content')
    <div class="container page-global reset-password">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xl-5">
                <p class="title">{{ $contents->{'reset_title_' . $middleware_language} ?? $contents->reset_title_en }}</p>
                <p class="description">{{ $contents->{'reset_description_' . $middleware_language} ?? $contents->reset_description_en }}</p>

                <form action="{{ route('reset-password.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 mb-md-4 position-relative">
                        <label for="password" class="form-label label">{{ $contents->{'	reset_new_password_' . $middleware_language} ?? $contents->	reset_new_password_en }}</label>
                        <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * * * *" required>
                        <span class="bi bi-eye-slash-fill toggle-password"></span>
                        <x-backend.input-error field="password"></x-backend.input-error>
                    </div>

                    <div class="mb-3 mb-md-4 position-relative">
                        <label for="passwordConfirmation" class="form-label label">{{ $contents->{'reset_confirm_password_' . $middleware_language} ?? $contents->reset_confirm_password_en }}</label>
                        <input type="password" class="form-control input-field" id="passwordConfirmation" name="password_confirmation" placeholder="* * * * * * *" required/>
                        <span class="bi bi-eye-slash-fill toggle-password"></span>
                        <x-backend.input-error field="password_confirmation"></x-backend.input-error>
                    </div>

                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <button type="submit" class="btn reset-password-button">{{ $contents->{'reset_button_' . $middleware_language} ?? $contents->reset_button_en }}</button>
                </form>
            </div>
        </div>

        <x-frontend.notification></x-frontend.notification>
    </div>
@endsection

@push('after-scripts')
    <script>
        $(".toggle-password").click(function () {
            $(this).toggleClass("bi-eye-slash-fill bi-eye-fill");
            
            if($(this).prev().attr("type") == "password") {
                $(this).prev().attr("type", "text");
            }
            else {
                $(this).prev().attr("type", "password");
            }
        });
    </script>
@endpush