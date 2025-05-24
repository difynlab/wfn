@extends('frontend.layouts.app')

@section('title', 'Warehouses')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/warehouses.css') }}">
@endpush
 
@section('content')
    <div class="warehouses">
        <div class="section-1">
            <p class="title">Warehouses</p>
        </div>
    </div>
@endsection