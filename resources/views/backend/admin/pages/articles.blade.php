@extends('backend.layouts.app')

@section('title', 'Articles')

@section('content')

    <div class="inner-page">
        <form action="{{ route('admin.pages.articles.update', $language) }}" method="POST" enctype="multipart/form-data" class="form">
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
                        <label for="description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="description_{{ $short_code }}" name="description_{{ $short_code }}" value="{{ $contents->{'description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="recent_{{ $short_code }}" class="form-label label">Recent</label>
                        <input type="text" class="form-control input-field" id="recent_{{ $short_code }}" name="recent_{{ $short_code }}" value="{{ $contents->{'recent_' . $short_code} ?? '' }}" placeholder="Recent">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="read_more_{{ $short_code }}" class="form-label label">Read more</label>
                        <input type="text" class="form-control input-field" id="read_more_{{ $short_code }}" name="read_more_{{ $short_code }}" value="{{ $contents->{'read_more_' . $short_code} ?? '' }}" placeholder="Read more">
                    </div>

                    <div class="col-6">
                        <label for="written_by_{{ $short_code }}" class="form-label label">Written By</label>
                        <input type="text" class="form-control input-field" id="written_by_{{ $short_code }}" name="written_by_{{ $short_code }}" value="{{ $contents->{'written_by_' . $short_code} ?? '' }}" placeholder="Written By">
                    </div>

                    <div class="col-6">
                        <label for="related_articles_{{ $short_code }}" class="form-label label">Related Articles</label>
                        <input type="text" class="form-control input-field" id="related_articles_{{ $short_code }}" name="related_articles_{{ $short_code }}" value="{{ $contents->{'related_articles_' . $short_code} ?? '' }}" placeholder="Related Articles">
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-button">Save Changes</button>

            <x-backend.notification></x-backend.notification>
        </form>
    </div>

@endsection