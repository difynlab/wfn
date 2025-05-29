@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>

    <form action="{{ route('backend-auth.portal.logout') }}" method="POST">
        @csrf
        <button type="submit" class="log-out">Sign Out</button>
    </form>
 
@endsection