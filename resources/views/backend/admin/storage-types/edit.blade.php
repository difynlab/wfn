@extends('backend.layouts.app')

@section('title', 'Edit Storage Type')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.storage-types.update', $storage_type) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">Storage Type Details</p>
                <p class="description">View or update storage type details. Save changes to apply.</p>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-3 mb-md-4">
                    <label for="name_en" class="form-label label">Name (EN)<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="name_en" name="name_en" placeholder="Name (EN)" value="{{ old('name_en', $storage_type->name_en) }}" required>
                    <x-backend.input-error field="name_en"></x-backend.input-error>
                </div>

                <div class="col-12 col-md-6 mb-3 mb-md-4">
                    <label for="name_ar" class="form-label label">Name (AR)<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="name_ar" name="name_ar" placeholder="Name (AR)" value="{{ old('name_ar', $storage_type->name_ar) }}" required>
                    <x-backend.input-error field="name_ar"></x-backend.input-error>
                </div>

                <x-backend.edit :data="$storage_type"></x-backend.edit>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>

@endsection