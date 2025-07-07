@extends('backend.layouts.guest')

@section('title', 'Forgot Password')

@section('content')
    <form action="{{ route('admin.forgot-password.store') }}" method="POST" class="form">
        @csrf
        
        <p class="title">Forgot Your Password</p>
        <p class="description">Don't worry! Resetting your password is easy. Just type in the email you registered to Warehouse Exchange.</p>

        <div class="mb-4 mb-md-5">
            <label for="email" class="form-label label">Email Address</label>
            <input type="email" class="form-control input-field" id="email" name="email" value="{{ old('email') }}" placeholder="Please enter your email address" required>
            <x-backend.input-error field="email"></x-backend.input-error>
        </div>
        
        <button type="submit" class="btn button">Send Password</button>
    </form>

    <p class="remember-password">Did you remember your password?
        <a href="{{ route('admin.login') }}" class="span-link">Login</a>
    </p>
@endsection