@extends('backend.layouts.app')

@section('title', 'Warehouse')

@section('content')

    <div class="inner-page">
        <form action="{{ route('admin.pages.warehouses.update', $language) }}" method="POST" enctype="multipart/form-data" class="form">
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
                <p class="inner-page-title">Section 1</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_1_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12">
                        <label for="section_1_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="section_1_description_{{ $short_code }}" name="section_1_description_{{ $short_code }}" value="{{ $contents->{'section_1_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 2</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_2_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_warehouses_{{ $short_code }}" class="form-label label">Warehouses</label>
                        <input type="text" class="form-control input-field" id="section_2_warehouses_{{ $short_code }}" name="section_2_warehouses_{{ $short_code }}" value="{{ $contents->{'section_2_warehouses_' . $short_code} ?? '' }}" placeholder="Warehouses">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_map_view_{{ $short_code }}" class="form-label label">Map View</label>
                        <input type="text" class="form-control input-field" id="section_2_map_view_{{ $short_code }}" name="section_2_map_view_{{ $short_code }}" value="{{ $contents->{'section_2_map_view_' . $short_code} ?? '' }}" placeholder="Map View">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_search_{{ $short_code }}" class="form-label label">Search</label>
                        <input type="text" class="form-control input-field" id="section_2_search_{{ $short_code }}" name="section_2_search_{{ $short_code }}" value="{{ $contents->{'section_2_search_' . $short_code} ?? '' }}" placeholder="Search">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_size_{{ $short_code }}" class="form-label label">Size</label>
                        <input type="text" class="form-control input-field" id="section_2_size_{{ $short_code }}" name="section_2_size_{{ $short_code }}" value="{{ $contents->{'section_2_size_' . $short_code} ?? '' }}" placeholder="Size">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_size_1_{{ $short_code }}" class="form-label label">Size 1</label>
                        <input type="text" class="form-control input-field" id="section_2_size_1_{{ $short_code }}" name="section_2_size_1_{{ $short_code }}" value="{{ $contents->{'section_2_size_1_' . $short_code} ?? '' }}" placeholder="Size 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_size_2_{{ $short_code }}" class="form-label label">Size 2</label>
                        <input type="text" class="form-control input-field" id="section_2_size_2_{{ $short_code }}" name="section_2_size_2_{{ $short_code }}" value="{{ $contents->{'section_2_size_2_' . $short_code} ?? '' }}" placeholder="Size 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_size_3_{{ $short_code }}" class="form-label label">Size 3</label>
                        <input type="text" class="form-control input-field" id="section_2_size_3_{{ $short_code }}" name="section_2_size_3_{{ $short_code }}" value="{{ $contents->{'section_2_size_3_' . $short_code} ?? '' }}" placeholder="Size 3">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_size_4_{{ $short_code }}" class="form-label label">Size 4</label>
                        <input type="text" class="form-control input-field" id="section_2_size_4_{{ $short_code }}" name="section_2_size_4_{{ $short_code }}" value="{{ $contents->{'section_2_size_4_' . $short_code} ?? '' }}" placeholder="Size 4">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_type_{{ $short_code }}" class="form-label label">Type</label>
                        <input type="text" class="form-control input-field" id="section_2_type_{{ $short_code }}" name="section_2_type_{{ $short_code }}" value="{{ $contents->{'section_2_type_' . $short_code} ?? '' }}" placeholder="Type">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_price_{{ $short_code }}" class="form-label label">Price</label>
                        <input type="text" class="form-control input-field" id="section_2_price_{{ $short_code }}" name="section_2_price_{{ $short_code }}" value="{{ $contents->{'section_2_price_' . $short_code} ?? '' }}" placeholder="Price">
                    </div>

                    <div class="col-6">
                        <label for="section_2_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="section_2_button_{{ $short_code }}" name="section_2_button_{{ $short_code }}" value="{{ $contents->{'section_2_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 3</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_3_new_{{ $short_code }}" class="form-label label">New</label>
                        <input type="text" class="form-control input-field" id="section_3_new_{{ $short_code }}" name="section_3_new_{{ $short_code }}" value="{{ $contents->{'section_3_new_' . $short_code} ?? '' }}" placeholder="New">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_unlock_{{ $short_code }}" class="form-label label">Unlock Pricing</label>
                        <input type="text" class="form-control input-field" id="section_3_unlock_{{ $short_code }}" name="section_3_unlock_{{ $short_code }}" value="{{ $contents->{'section_3_unlock_' . $short_code} ?? '' }}" placeholder="Unlock Pricing">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_listed_{{ $short_code }}" class="form-label label">section_3_listed_en</label>
                        <input type="text" class="form-control input-field" id="section_3_listed_{{ $short_code }}" name="section_3_listed_{{ $short_code }}" value="{{ $contents->{'section_3_listed_' . $short_code} ?? '' }}" placeholder="section_3_listed_en">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_day_ago_{{ $short_code }}" class="form-label label">Day Ago</label>
                        <input type="text" class="form-control input-field" id="section_3_day_ago_{{ $short_code }}" name="section_3_day_ago_{{ $short_code }}" value="{{ $contents->{'section_3_day_ago_' . $short_code} ?? '' }}" placeholder="Day Ago">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_like_{{ $short_code }}" class="form-label label">Like</label>
                        <input type="text" class="form-control input-field" id="section_3_like_{{ $short_code }}" name="section_3_like_{{ $short_code }}" value="{{ $contents->{'section_3_like_' . $short_code} ?? '' }}" placeholder="Like">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_share_{{ $short_code }}" class="form-label label">Share</label>
                        <input type="text" class="form-control input-field" id="section_3_share_{{ $short_code }}" name="section_3_share_{{ $short_code }}" value="{{ $contents->{'section_3_share_' . $short_code} ?? '' }}" placeholder="Share">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_report_{{ $short_code }}" class="form-label label">Report</label>
                        <input type="text" class="form-control input-field" id="section_3_report_{{ $short_code }}" name="section_3_report_{{ $short_code }}" value="{{ $contents->{'section_3_report_' . $short_code} ?? '' }}" placeholder="Report">
                    </div>

                    <div class="col-6">
                        <label for="section_3_popular_{{ $short_code }}" class="form-label label">Popular</label>
                        <input type="text" class="form-control input-field" id="section_3_popular_{{ $short_code }}" name="section_3_popular_{{ $short_code }}" value="{{ $contents->{'section_3_popular_' . $short_code} ?? '' }}" placeholder="Popular">
                    </div>

                    <div class="col-6">
                        <label for="section_3_top_rated_{{ $short_code }}" class="form-label label">Top Rated</label>
                        <input type="text" class="form-control input-field" id="section_3_top_rated_{{ $short_code }}" name="section_3_top_rated_{{ $short_code }}" value="{{ $contents->{'section_3_top_rated_' . $short_code} ?? '' }}" placeholder="Top Rated">
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 4</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_4_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_4_title_{{ $short_code }}" name="section_4_title_{{ $short_code }}" value="{{ $contents->{'section_4_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12">
                        <label for="section_4_unlock_{{ $short_code }}" class="form-label label">Unlock Pricing</label>
                        <input type="text" class="form-control input-field" id="section_4_unlock_{{ $short_code }}" name="section_4_unlock_{{ $short_code }}" value="{{ $contents->{'section_4_unlock_' . $short_code} ?? '' }}" placeholder="Unlock Pricing">
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-button">Save Changes</button>

            <x-backend.notification></x-backend.notification>
        </form>
    </div>

@endsection