@extends('backend.layouts.app')

@section('title', 'Privacy Policy')

@section('content')

    <div class="inner-page">
        <form action="{{ route('admin.pages.privacy-policy.update', $language) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="page-details">
                <p class="title">{{ ucfirst($language) }} Language</p>
                <p class="description">View or update page content here.</p>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <label for="page_name_{{ $short_code }}" class="form-label label">Page Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                </div>
            </div>

            <div class="section mb-4">
                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="title_{{ $short_code }}" name="title_{{ $short_code }}" value="{{ $contents->{'title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="description_{{ $short_code }}" class="form-label label">Description<span class="asterisk">*</span></label>
                        <textarea class="form-control input-field textarea" rows="5" id="description_{{ $short_code }}" name="description_{{ $short_code }}" placeholder="Description" value="{{ $contents->{'description_' . $short_code} ?? '' }}" required>{{ $contents->{'description_' . $short_code} ?? '' }}</textarea>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="content_{{ $short_code }}" class="form-label label">Content</label>
                        <textarea class="editor" id="content_{{ $short_code }}" name="content_{{ $short_code }}" value="{{ $contents->{'content_' . $short_code} ?? '' }}">{{ $contents->{'content_' . $short_code} ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-button">Save Changes</button>

            <x-backend.notification></x-backend.notification>
        </form>
    </div>

@endsection