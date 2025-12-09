@extends('backend.layouts.app')

@section('title', 'Edit Warehouse Review')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.warehouses.reviews.update', [$warehouse, $warehouse_review]) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="page-details">
                <p class="title">Warehouse Review Details</p>
                <p class="description">View or update warehouse review details. Save changes to apply.</p>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 mb-3 mb-md-4">
                    <label for="user_id" class="form-label label">User<span class="asterisk">*</span></label>
                    <select class="form-select input-field js-single" id="user_id" name="user_id" required>
                        <option value="">Select user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $warehouse_review->user_id) == $user->id ? 'selected' : '' }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                        @endforeach
                    </select>
                    <x-backend.input-error field="user_id"></x-backend.input-error>
                </div>

                <div class="col-12 col-md-6 mb-3 mb-md-4">
                    <label for="star" class="form-label label">Star<span class="asterisk">*</span></label>
                    <select class="form-select input-field js-single" id="star" name="star" required>
                        <option value="">Select star</option>
                        <option value="1" {{ old('star', $warehouse_review->star) == '1' ? "selected" : "" }}>1</option>
                        <option value="2" {{ old('star', $warehouse_review->star) == '2' ? "selected" : "" }}>2</option>
                        <option value="3" {{ old('star', $warehouse_review->star) == '3' ? "selected" : "" }}>3</option>
                        <option value="4" {{ old('star', $warehouse_review->star) == '4' ? "selected" : "" }}>4</option>
                        <option value="5" {{ old('star', $warehouse_review->star) == '5' ? "selected" : "" }}>5</option>
                    </select>
                    <x-backend.input-error field="star"></x-backend.input-error>
                </div>

                <div class="col-12 mb-3 mb-md-4">
                    <label for="language" class="form-label label">Language<span class="asterisk">*</span></label>
                    <select class="form-select input-field" id="language" name="language" required>
                        <option value="">Select language</option>
                        <option value="english" {{ old('language', $warehouse_review->language) == 'english' ? "selected" : "" }}>English</option>
                        <option value="arabic" {{ old('language', $warehouse_review->language) == 'arabic' ? "selected" : "" }}>Arabic</option>
                    </select>
                    <x-backend.input-error field="language"></x-backend.input-error>
                </div>

                <div class="col-12 mb-3 mb-md-4">
                    <label for="content" class="form-label label">Content<span class="asterisk">*</span></label>
                    <textarea class="form-control input-field textarea" name="content" id="content" value="{{ old('content', $warehouse_review->content) }}" placeholder="Content" rows="5" required>{{ old('content', $warehouse_review->content) }}</textarea>
                    <x-backend.input-error field="content"></x-backend.input-error>
                </div>

                <x-backend.edit :data="$warehouse_review"></x-backend.edit>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>
@endsection