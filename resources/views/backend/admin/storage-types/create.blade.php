@extends('backend.layouts.app')

@section('title', 'Create Storage Type')

@section('content')
    <div class="inner-page">
        <form action="{{ route('backend.storage-types.store') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">Add New Storage Type</p>
                <p class="description">Fill in the details below to create a new storage type.</p>
            </div>
            
            <div class="row">
                <div class="col-12 mb-4">
                    <label for="name" class="form-label label">Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                    <x-backend.input-error field="name"></x-backend.input-error>
                </div>

                <x-backend.create></x-backend.create>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>

@endsection