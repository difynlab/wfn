@extends('backend.layouts.app')

@section('title', 'Common')

@section('content')

    <div class="inner-page">
        <form action="{{ route('admin.pages.common.update', $language) }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <div class="page-details">
                <p class="title">{{ ucfirst($language) }} Language</p>
                <p class="description">View or update page content here.</p>
            </div>

            <div class="section mb-4">
                <div class="row">
                    <div class="col-6 mb-4">
                        <label for="header_dashboard_{{ $short_code }}" class="form-label label">Header Dashboard</label>
                        <input type="text" class="form-control input-field" id="header_dashboard_{{ $short_code }}" name="header_dashboard_{{ $short_code }}" value="{{ $contents->{'header_dashboard_' . $short_code} ?? '' }}" placeholder="Header Dashboard">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="header_logout_{{ $short_code }}" class="form-label label">Header Log Out</label>
                        <input type="text" class="form-control input-field" id="header_logout_{{ $short_code }}" name="header_logout_{{ $short_code }}" value="{{ $contents->{'header_logout_' . $short_code} ?? '' }}" placeholder="Header Log Out">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="footer_title_{{ $short_code }}" class="form-label label">Footer Title</label>
                        <input type="text" class="form-control input-field" id="footer_title_{{ $short_code }}" name="footer_title_{{ $short_code }}" value="{{ $contents->{'footer_title_' . $short_code} ?? '' }}" placeholder="Footer Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="footer_sub_title_{{ $short_code }}" class="form-label label">Footer Sub Title</label>
                        <input type="text" class="form-control input-field" id="footer_sub_title_{{ $short_code }}" name="footer_sub_title_{{ $short_code }}" value="{{ $contents->{'footer_sub_title_' . $short_code} ?? '' }}" placeholder="Footer Sub Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="footer_button_{{ $short_code }}" class="form-label label">Footer Button</label>
                        <input type="text" class="form-control input-field" id="footer_button_{{ $short_code }}" name="footer_button_{{ $short_code }}" value="{{ $contents->{'footer_button_' . $short_code} ?? '' }}" placeholder="Footer Button">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="footer_first_menu_{{ $short_code }}" class="form-label label">Footer First Menu</label>
                        <input type="text" class="form-control input-field" id="footer_first_menu_{{ $short_code }}" name="footer_first_menu_{{ $short_code }}" value="{{ $contents->{'footer_first_menu_' . $short_code} ?? '' }}" placeholder="Footer First Menu">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="footer_second_menu_{{ $short_code }}" class="form-label label">Footer Second Menu</label>
                        <input type="text" class="form-control input-field" id="footer_second_menu_{{ $short_code }}" name="footer_second_menu_{{ $short_code }}" value="{{ $contents->{'footer_second_menu_' . $short_code} ?? '' }}" placeholder="Footer Second Menu">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="footer_third_menu_{{ $short_code }}" class="form-label label">Footer Third Menu</label>
                        <input type="text" class="form-control input-field" id="footer_third_menu_{{ $short_code }}" name="footer_third_menu_{{ $short_code }}" value="{{ $contents->{'footer_third_menu_' . $short_code} ?? '' }}" placeholder="Footer Third Menu">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="footer_fourth_menu_{{ $short_code }}" class="form-label label">Footer Fourth Menu</label>
                        <input type="text" class="form-control input-field" id="footer_fourth_menu_{{ $short_code }}" name="footer_fourth_menu_{{ $short_code }}" value="{{ $contents->{'footer_fourth_menu_' . $short_code} ?? '' }}" placeholder="Footer Fourth Menu">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="footer_facebook_{{ $short_code }}" class="form-label label">Footer Facebook</label>
                        <input type="text" class="form-control input-field" id="footer_facebook_{{ $short_code }}" name="footer_facebook_{{ $short_code }}" value="{{ $contents->{'footer_facebook_' . $short_code} ?? '' }}" placeholder="Footer Facebook">
                    </div>

                    <div class="col-6">
                        <label for="footer_instagram_{{ $short_code }}" class="form-label label">Footer Instagram</label>
                        <input type="text" class="form-control input-field" id="footer_instagram_{{ $short_code }}" name="footer_instagram_{{ $short_code }}" value="{{ $contents->{'footer_instagram_' . $short_code} ?? '' }}" placeholder="Footer Instagram">
                    </div>

                    <div class="col-6">
                        <label for="footer_copyright_{{ $short_code }}" class="form-label label">Footer Copyright</label>
                        <input type="text" class="form-control input-field" id="footer_copyright_{{ $short_code }}" name="footer_copyright_{{ $short_code }}" value="{{ $contents->{'footer_copyright_' . $short_code} ?? '' }}" placeholder="Footer Copyright">
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-button">Save Changes</button>

            <x-backend.notification></x-backend.notification>
        </form>
    </div>

@endsection