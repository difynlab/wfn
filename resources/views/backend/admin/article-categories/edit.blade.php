@extends('backend.layouts.app')

@section('title', 'Edit Article Category')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.article-categories.update', $article_category) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf

            <div class="page-details">
                <p class="title">Article Category Details</p>
                <p class="description">View or update article category details. Save changes to apply.</p>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label for="name" class="form-label label">Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="name" name="name" placeholder="Name" value="{{ old('name', $article_category->name) }}" required>
                    <x-backend.input-error field="name"></x-backend.input-error>
                </div>

                <div class="col-12 mb-4">
                    <label for="language" class="form-label label">Language<span class="asterisk">*</span></label>
                    <select class="form-select input-field" id="language" name="language" required>
                        <option value="">Select language</option>
                        <option value="english" {{ old('language', $article_category->language) == 'english' ? "selected" : "" }}>English</option>
                        <option value="arabic" {{ old('language', $article_category->language) == 'arabic' ? "selected" : "" }}>Arabic</option>
                    </select>
                    <x-backend.input-error field="language"></x-backend.input-error>
                </div>

                <x-backend.edit :data="$article_category"></x-backend.edit>
                <x-backend.notification></x-backend.notification>
            </div>
        </form>
    </div>
@endsection