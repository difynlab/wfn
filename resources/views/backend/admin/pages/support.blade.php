@extends('backend.layouts.app')

@section('title', 'Support')

@section('content')

    <div class="inner-page">
        <form action="{{ route('backend.pages.support.update', $language) }}" method="POST" enctype="multipart/form-data" class="form">
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
                        <label for="name_{{ $short_code }}" class="form-label label">Name</label>
                        <input type="text" class="form-control input-field" id="name_{{ $short_code }}" name="name_{{ $short_code }}" value="{{ $contents->{'name_' . $short_code} ?? '' }}" placeholder="Name">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="name_placeholder_{{ $short_code }}" class="form-label label">Name Placeholder</label>
                        <input type="text" class="form-control input-field" id="name_placeholder_{{ $short_code }}" name="name_placeholder_{{ $short_code }}" value="{{ $contents->{'name_placeholder_' . $short_code} ?? '' }}" placeholder="Name Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="phone_{{ $short_code }}" class="form-label label">Phone</label>
                        <input type="text" class="form-control input-field" id="phone_{{ $short_code }}" name="phone_{{ $short_code }}" value="{{ $contents->{'phone_' . $short_code} ?? '' }}" placeholder="Phone">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="phone_placeholder_{{ $short_code }}" class="form-label label">Phone Placeholder</label>
                        <input type="text" class="form-control input-field" id="phone_placeholder_{{ $short_code }}" name="phone_placeholder_{{ $short_code }}" value="{{ $contents->{'phone_placeholder_' . $short_code} ?? '' }}" placeholder="Phone Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="email_{{ $short_code }}" class="form-label label">Email</label>
                        <input type="text" class="form-control input-field" id="email_{{ $short_code }}" name="email_{{ $short_code }}" value="{{ $contents->{'email_' . $short_code} ?? '' }}" placeholder="Email">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="email_placeholder_{{ $short_code }}" class="form-label label">Email Placeholder</label>
                        <input type="text" class="form-control input-field" id="email_placeholder_{{ $short_code }}" name="email_placeholder_{{ $short_code }}" value="{{ $contents->{'email_placeholder_' . $short_code} ?? '' }}" placeholder="Email Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="category_{{ $short_code }}" class="form-label label">Category</label>
                        <input type="text" class="form-control input-field" id="category_{{ $short_code }}" name="category_{{ $short_code }}" value="{{ $contents->{'category_' . $short_code} ?? '' }}" placeholder="Category">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="category_placeholder_{{ $short_code }}" class="form-label label">Category Placeholder</label>
                        <input type="text" class="form-control input-field" id="category_placeholder_{{ $short_code }}" name="category_placeholder_{{ $short_code }}" value="{{ $contents->{'category_placeholder_' . $short_code} ?? '' }}" placeholder="Category Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="category_1_{{ $short_code }}" class="form-label label">Category 1</label>
                        <input type="text" class="form-control input-field" id="category_1_{{ $short_code }}" name="category_1_{{ $short_code }}" value="{{ $contents->{'category_1_' . $short_code} ?? '' }}" placeholder="Category 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="category_2_{{ $short_code }}" class="form-label label">Category 2</label>
                        <input type="text" class="form-control input-field" id="category_2_{{ $short_code }}" name="category_2_{{ $short_code }}" value="{{ $contents->{'category_2_' . $short_code} ?? '' }}" placeholder="Category 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="category_3_{{ $short_code }}" class="form-label label">Category 3</label>
                        <input type="text" class="form-control input-field" id="category_3_{{ $short_code }}" name="category_3_{{ $short_code }}" value="{{ $contents->{'category_3_' . $short_code} ?? '' }}" placeholder="Category 3">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="subject_{{ $short_code }}" class="form-label label">Subject</label>
                        <input type="text" class="form-control input-field" id="subject_{{ $short_code }}" name="subject_{{ $short_code }}" value="{{ $contents->{'subject_' . $short_code} ?? '' }}" placeholder="Subject">
                    </div>

                    <div class="col-6">
                        <label for="subject_placeholder_{{ $short_code }}" class="form-label label">Subject Placeholder</label>
                        <input type="text" class="form-control input-field" id="subject_placeholder_{{ $short_code }}" name="subject_placeholder_{{ $short_code }}" value="{{ $contents->{'subject_placeholder_' . $short_code} ?? '' }}" placeholder="Subject Placeholder">
                    </div>

                    <div class="col-6">
                        <label for="button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="button_{{ $short_code }}" name="button_{{ $short_code }}" value="{{ $contents->{'button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-button">Save Changes</button>

            <x-backend.notification></x-backend.notification>
        </form>
    </div>

@endsection