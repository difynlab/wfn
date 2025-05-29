@extends('backend.layouts.guest')

@section('title', 'Reset Password')

@section('content')
    
    <form action="{{ route('backend-auth.portal.reset-password.store') }}" method="POST" class="form">
        @csrf

        <p class="title">Reset Password</p>
        <p class="description">Enter your new password to access your account</p>

        <div class="mb-4 mb-md-5 position-relative">
            <label for="password" class="form-label label">Password</label>
            <input type="password" class="form-control input-field" id="password" name="password" placeholder="* * * * *" required>
            <span class="bi bi-eye-slash-fill toggle-password"></span>
            <x-backend.input-error field="password"></x-backend.input-error>
        </div>

        <div class="mb-3 mb-md-4 position-relative">
            <label for="passwordConfirmation" class="form-label label">Confirm Password</label>
            <input type="password" class="form-control input-field" id="passwordConfirmation" name="password_confirmation" placeholder="* * * * *" required>
            <span class="bi bi-eye-slash-fill toggle-password"></span>
            <x-backend.input-error field="password_confirmation"></x-backend.input-error>
        </div>
        
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="token" value="{{ $token }}">
        <button type="submit" class="btn button">Reset Password</button>
    </form>

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