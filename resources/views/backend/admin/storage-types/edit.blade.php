@extends('backend.layouts.app')

@section('title', 'Edit Storage Type')

@section('content')
    <div class="inner-page">
        <form action="{{ route('backend.storage-types.update', $storage_type) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">Storage Type Details</p>
                <p class="description">View or update storage type details. Save changes to apply.</p>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label for="name" class="form-label label">Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="name" name="name" placeholder="Name" value="{{ old('name', $storage_type->name) }}" required>
                    <x-backend.input-error field="name"></x-backend.input-error>
                </div>

                <x-backend.edit :data="$storage_type"></x-backend.edit>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>

@endsection