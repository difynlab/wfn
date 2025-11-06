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

            <div class="row mb-3 mb-md-4">
                <div class="col-12">
                    <label for="page_name_{{ $short_code }}" class="form-label label">Page Name<span class="asterisk">*</span></label>
                    <input type="text" class="form-control input-field" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Section 1</p>

                <div class="row">
                    <div class="col-12 mb-3 mb-md-4">
                        <label for="section_1_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12">
                        <label for="section_1_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="section_1_description_{{ $short_code }}" name="section_1_description_{{ $short_code }}" value="{{ $contents->{'section_1_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Section 2</p>

                <div class="row">
                    <div class="col-12 mb-3 mb-md-4">
                        <label for="section_2_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_2_warehouses_{{ $short_code }}" class="form-label label">Warehouses</label>
                        <input type="text" class="form-control input-field" id="section_2_warehouses_{{ $short_code }}" name="section_2_warehouses_{{ $short_code }}" value="{{ $contents->{'section_2_warehouses_' . $short_code} ?? '' }}" placeholder="Warehouses">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_2_map_view_{{ $short_code }}" class="form-label label">Map View</label>
                        <input type="text" class="form-control input-field" id="section_2_map_view_{{ $short_code }}" name="section_2_map_view_{{ $short_code }}" value="{{ $contents->{'section_2_map_view_' . $short_code} ?? '' }}" placeholder="Map View">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_2_search_{{ $short_code }}" class="form-label label">Search</label>
                        <input type="text" class="form-control input-field" id="section_2_search_{{ $short_code }}" name="section_2_search_{{ $short_code }}" value="{{ $contents->{'section_2_search_' . $short_code} ?? '' }}" placeholder="Search">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_2_size_{{ $short_code }}" class="form-label label">Size</label>
                        <input type="text" class="form-control input-field" id="section_2_size_{{ $short_code }}" name="section_2_size_{{ $short_code }}" value="{{ $contents->{'section_2_size_' . $short_code} ?? '' }}" placeholder="Size">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_2_size_1_{{ $short_code }}" class="form-label label">Size 1</label>
                        <input type="text" class="form-control input-field" id="section_2_size_1_{{ $short_code }}" name="section_2_size_1_{{ $short_code }}" value="{{ $contents->{'section_2_size_1_' . $short_code} ?? '' }}" placeholder="Size 1">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_2_size_2_{{ $short_code }}" class="form-label label">Size 2</label>
                        <input type="text" class="form-control input-field" id="section_2_size_2_{{ $short_code }}" name="section_2_size_2_{{ $short_code }}" value="{{ $contents->{'section_2_size_2_' . $short_code} ?? '' }}" placeholder="Size 2">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_2_size_3_{{ $short_code }}" class="form-label label">Size 3</label>
                        <input type="text" class="form-control input-field" id="section_2_size_3_{{ $short_code }}" name="section_2_size_3_{{ $short_code }}" value="{{ $contents->{'section_2_size_3_' . $short_code} ?? '' }}" placeholder="Size 3">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_2_size_4_{{ $short_code }}" class="form-label label">Size 4</label>
                        <input type="text" class="form-control input-field" id="section_2_size_4_{{ $short_code }}" name="section_2_size_4_{{ $short_code }}" value="{{ $contents->{'section_2_size_4_' . $short_code} ?? '' }}" placeholder="Size 4">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <label for="section_2_type_{{ $short_code }}" class="form-label label">Type</label>
                        <input type="text" class="form-control input-field" id="section_2_type_{{ $short_code }}" name="section_2_type_{{ $short_code }}" value="{{ $contents->{'section_2_type_' . $short_code} ?? '' }}" placeholder="Type">
                    </div>

                    <!-- <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_2_price_{{ $short_code }}" class="form-label label">Price</label>
                        <input type="text" class="form-control input-field" id="section_2_price_{{ $short_code }}" name="section_2_price_{{ $short_code }}" value="{{ $contents->{'section_2_price_' . $short_code} ?? '' }}" placeholder="Price">
                    </div> -->

                    <div class="col-12 col-md-6">
                        <label for="section_2_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="section_2_button_{{ $short_code }}" name="section_2_button_{{ $short_code }}" value="{{ $contents->{'section_2_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Section 3</p>

                <div class="row">
                    <!-- <div class="col-12 mb-3 mb-md-4">
                        <label for="section_3_new_{{ $short_code }}" class="form-label label">New</label>
                        <input type="text" class="form-control input-field" id="section_3_new_{{ $short_code }}" name="section_3_new_{{ $short_code }}" value="{{ $contents->{'section_3_new_' . $short_code} ?? '' }}" placeholder="New">
                    </div> -->

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_3_unlock_{{ $short_code }}" class="form-label label">Unlock Pricing</label>
                        <input type="text" class="form-control input-field" id="section_3_unlock_{{ $short_code }}" name="section_3_unlock_{{ $short_code }}" value="{{ $contents->{'section_3_unlock_' . $short_code} ?? '' }}" placeholder="Unlock Pricing">
                    </div>

                    <!-- <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_3_listed_{{ $short_code }}" class="form-label label">Listed</label>
                        <input type="text" class="form-control input-field" id="section_3_listed_{{ $short_code }}" name="section_3_listed_{{ $short_code }}" value="{{ $contents->{'section_3_listed_' . $short_code} ?? '' }}" placeholder="Listed">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_3_day_ago_{{ $short_code }}" class="form-label label">Day Ago</label>
                        <input type="text" class="form-control input-field" id="section_3_day_ago_{{ $short_code }}" name="section_3_day_ago_{{ $short_code }}" value="{{ $contents->{'section_3_day_ago_' . $short_code} ?? '' }}" placeholder="Day Ago">
                    </div> -->

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_3_like_{{ $short_code }}" class="form-label label">Like</label>
                        <input type="text" class="form-control input-field" id="section_3_like_{{ $short_code }}" name="section_3_like_{{ $short_code }}" value="{{ $contents->{'section_3_like_' . $short_code} ?? '' }}" placeholder="Like">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_3_share_{{ $short_code }}" class="form-label label">Share</label>
                        <input type="text" class="form-control input-field" id="section_3_share_{{ $short_code }}" name="section_3_share_{{ $short_code }}" value="{{ $contents->{'section_3_share_' . $short_code} ?? '' }}" placeholder="Share">
                    </div>

                    <!-- <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_3_report_{{ $short_code }}" class="form-label label">Report</label>
                        <input type="text" class="form-control input-field" id="section_3_report_{{ $short_code }}" name="section_3_report_{{ $short_code }}" value="{{ $contents->{'section_3_report_' . $short_code} ?? '' }}" placeholder="Report">
                    </div> -->

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="section_3_popular_{{ $short_code }}" class="form-label label">Popular</label>
                        <input type="text" class="form-control input-field" id="section_3_popular_{{ $short_code }}" name="section_3_popular_{{ $short_code }}" value="{{ $contents->{'section_3_popular_' . $short_code} ?? '' }}" placeholder="Popular">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="section_3_top_rated_{{ $short_code }}" class="form-label label">Top Rated</label>
                        <input type="text" class="form-control input-field" id="section_3_top_rated_{{ $short_code }}" name="section_3_top_rated_{{ $short_code }}" value="{{ $contents->{'section_3_top_rated_' . $short_code} ?? '' }}" placeholder="Top Rated">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Section 4</p>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <label for="section_4_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_4_title_{{ $short_code }}" name="section_4_title_{{ $short_code }}" value="{{ $contents->{'section_4_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="section_4_unlock_{{ $short_code }}" class="form-label label">Unlock Pricing</label>
                        <input type="text" class="form-control input-field" id="section_4_unlock_{{ $short_code }}" name="section_4_unlock_{{ $short_code }}" value="{{ $contents->{'section_4_unlock_' . $short_code} ?? '' }}" placeholder="Unlock Pricing">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Inner Page Section 2</p>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_section_2_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_description_{{ $short_code }}" name="inner_page_section_2_description_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_section_2_talk_to_expert_{{ $short_code }}" class="form-label label">Talk to Expert</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_talk_to_expert_{{ $short_code }}" name="inner_page_section_2_talk_to_expert_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_talk_to_expert_' . $short_code} ?? '' }}" placeholder="Talk to Expert">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_section_2_rating_{{ $short_code }}" class="form-label label">Rating</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_rating_{{ $short_code }}" name="inner_page_section_2_rating_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_rating_' . $short_code} ?? '' }}" placeholder="Rating">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_section_2_reviews_{{ $short_code }}" class="form-label label">Reviews</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_reviews_{{ $short_code }}" name="inner_page_section_2_reviews_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_reviews_' . $short_code} ?? '' }}" placeholder="Reviews">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_section_2_total_cost_{{ $short_code }}" class="form-label label">Total Cost</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_total_cost_{{ $short_code }}" name="inner_page_section_2_total_cost_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_total_cost_' . $short_code} ?? '' }}" placeholder="Total Cost">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_section_2_unlock_{{ $short_code }}" class="form-label label">Unlock</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_unlock_{{ $short_code }}" name="inner_page_section_2_unlock_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_unlock_' . $short_code} ?? '' }}" placeholder="Unlock">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_section_2_tenure_start_{{ $short_code }}" class="form-label label">Tenure Start</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_tenure_start_{{ $short_code }}" name="inner_page_section_2_tenure_start_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_tenure_start_' . $short_code} ?? '' }}" placeholder="Tenure Start">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_section_2_tenure_end_{{ $short_code }}" class="form-label label">Tenure End</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_tenure_end_{{ $short_code }}" name="inner_page_section_2_tenure_end_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_tenure_end_' . $short_code} ?? '' }}" placeholder="Tenure End">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_section_2_add_date_{{ $short_code }}" class="form-label label">Add Date</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_add_date_{{ $short_code }}" name="inner_page_section_2_add_date_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_add_date_' . $short_code} ?? '' }}" placeholder="Add Date">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_section_2_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_button_{{ $short_code }}" name="inner_page_section_2_button_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <label for="inner_page_section_2_note_{{ $short_code }}" class="form-label label">Note</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_note_{{ $short_code }}" name="inner_page_section_2_note_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_note_' . $short_code} ?? '' }}" placeholder="Note">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="inner_page_section_2_report_listing_{{ $short_code }}" class="form-label label">Report Listing</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_2_report_listing_{{ $short_code }}" name="inner_page_section_2_report_listing_{{ $short_code }}" value="{{ $contents->{'inner_page_section_2_report_listing_' . $short_code} ?? '' }}" placeholder="Report Listing">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Inner Page Section 3</p>

                <div class="row">
                    <div class="col-12">
                        <label for="inner_page_section_3_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_3_title_{{ $short_code }}" name="inner_page_section_3_title_{{ $short_code }}" value="{{ $contents->{'inner_page_section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Inner Page Section 5</p>

                <div class="row">
                    <div class="col-12">
                        <label for="inner_page_section_5_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_5_title_{{ $short_code }}" name="inner_page_section_5_title_{{ $short_code }}" value="{{ $contents->{'inner_page_section_5_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Inner Page Section 6</p>

                <div class="row">
                    <div class="col-12">
                        <label for="inner_page_section_6_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_6_title_{{ $short_code }}" name="inner_page_section_6_title_{{ $short_code }}" value="{{ $contents->{'inner_page_section_6_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Inner Page Section 7</p>

                <div class="row">
                    <div class="col-12 mb-3 mb-md-4">
                        <label for="inner_page_section_7_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_7_title_{{ $short_code }}" name="inner_page_section_7_title_{{ $short_code }}" value="{{ $contents->{'inner_page_section_7_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12">
                        <label for="inner_page_section_7_unlock_{{ $short_code }}" class="form-label label">Unlock</label>
                        <input type="text" class="form-control input-field" id="inner_page_section_7_unlock_{{ $short_code }}" name="inner_page_section_7_unlock_{{ $short_code }}" value="{{ $contents->{'inner_page_section_7_unlock_' . $short_code} ?? '' }}" placeholder="Unlock">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Inner Page Booking Modal</p>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_title_{{ $short_code }}" name="inner_page_modal_title_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_description_{{ $short_code }}" name="inner_page_modal_description_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_reviews_{{ $short_code }}" class="form-label label">Reviews</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_reviews_{{ $short_code }}" name="inner_page_modal_reviews_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_reviews_' . $short_code} ?? '' }}" placeholder="Reviews">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_details_{{ $short_code }}" class="form-label label">Details</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_details_{{ $short_code }}" name="inner_page_modal_details_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_details_' . $short_code} ?? '' }}" placeholder="Details">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_tenure_start_date_{{ $short_code }}" class="form-label label">Tenure Start Date</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_tenure_start_date_{{ $short_code }}" name="inner_page_modal_tenure_start_date_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_tenure_start_date_' . $short_code} ?? '' }}" placeholder="Tenure Start Date">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_tenure_end_date_{{ $short_code }}" class="form-label label">Tenure End Date</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_tenure_end_date_{{ $short_code }}" name="inner_page_modal_tenure_end_date_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_tenure_end_date_' . $short_code} ?? '' }}" placeholder="Tenure End Date">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_warehouse_type_{{ $short_code }}" class="form-label label">Warehouse Type</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_warehouse_type_{{ $short_code }}" name="inner_page_modal_warehouse_type_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_warehouse_type_' . $short_code} ?? '' }}" placeholder="Warehouse Type">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_pallets_{{ $short_code }}" class="form-label label">Pallets</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_pallets_{{ $short_code }}" name="inner_page_modal_pallets_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_pallets_' . $short_code} ?? '' }}" placeholder="Pallets">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_square_meters_{{ $short_code }}" class="form-label label">Square Meters</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_square_meters_{{ $short_code }}" name="inner_page_modal_square_meters_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_square_meters_' . $short_code} ?? '' }}" placeholder="Square Meters">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_no_of_pallets_{{ $short_code }}" class="form-label label">No of Pallets</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_no_of_pallets_{{ $short_code }}" name="inner_page_modal_no_of_pallets_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_no_of_pallets_' . $short_code} ?? '' }}" placeholder="No of Pallets">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_modal_no_of_square_meters_{{ $short_code }}" class="form-label label">No of Square Meters</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_no_of_square_meters_{{ $short_code }}" name="inner_page_modal_no_of_square_meters_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_no_of_square_meters_' . $short_code} ?? '' }}" placeholder="No of Square Meters">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="inner_page_modal_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="inner_page_modal_button_{{ $short_code }}" name="inner_page_modal_button_{{ $short_code }}" value="{{ $contents->{'inner_page_modal_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Inner Page Expert Modal</p>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_expert_modal_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="inner_page_expert_modal_title_{{ $short_code }}" name="inner_page_expert_modal_title_{{ $short_code }}" value="{{ $contents->{'inner_page_expert_modal_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_expert_modal_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="inner_page_expert_modal_description_{{ $short_code }}" name="inner_page_expert_modal_description_{{ $short_code }}" value="{{ $contents->{'inner_page_expert_modal_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_expert_modal_subject_{{ $short_code }}" class="form-label label">Subject</label>
                        <input type="text" class="form-control input-field" id="inner_page_expert_modal_subject_{{ $short_code }}" name="inner_page_expert_modal_subject_{{ $short_code }}" value="{{ $contents->{'inner_page_expert_modal_subject_' . $short_code} ?? '' }}" placeholder="Subject">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_expert_modal_subject_placeholder_{{ $short_code }}" class="form-label label">Subject Placeholder</label>
                        <input type="text" class="form-control input-field" id="inner_page_expert_modal_subject_placeholder_{{ $short_code }}" name="inner_page_expert_modal_subject_placeholder_{{ $short_code }}" value="{{ $contents->{'inner_page_expert_modal_subject_placeholder_' . $short_code} ?? '' }}" placeholder="Subject Placeholder">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_expert_modal_message_{{ $short_code }}" class="form-label label">Message</label>
                        <input type="text" class="form-control input-field" id="inner_page_expert_modal_message_{{ $short_code }}" name="inner_page_expert_modal_message_{{ $short_code }}" value="{{ $contents->{'inner_page_expert_modal_message_' . $short_code} ?? '' }}" placeholder="Message">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_expert_modal_message_placeholder_{{ $short_code }}" class="form-label label">Message Placeholder</label>
                        <input type="text" class="form-control input-field" id="inner_page_expert_modal_message_placeholder_{{ $short_code }}" name="inner_page_expert_modal_message_placeholder_{{ $short_code }}" value="{{ $contents->{'inner_page_expert_modal_message_placeholder_' . $short_code} ?? '' }}" placeholder="Message Placeholder">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="inner_page_expert_modal_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="inner_page_expert_modal_button_{{ $short_code }}" name="inner_page_expert_modal_button_{{ $short_code }}" value="{{ $contents->{'inner_page_expert_modal_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <div class="section mb-3 mb-md-4">
                <p class="inner-page-title">Inner Page Report Modal</p>

                <div class="row">
                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_report_modal_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="inner_page_report_modal_title_{{ $short_code }}" name="inner_page_report_modal_title_{{ $short_code }}" value="{{ $contents->{'inner_page_report_modal_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_report_modal_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="inner_page_report_modal_description_{{ $short_code }}" name="inner_page_report_modal_description_{{ $short_code }}" value="{{ $contents->{'inner_page_report_modal_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_report_modal_reason_{{ $short_code }}" class="form-label label">Reason</label>
                        <input type="text" class="form-control input-field" id="inner_page_report_modal_reason_{{ $short_code }}" name="inner_page_report_modal_reason_{{ $short_code }}" value="{{ $contents->{'inner_page_report_modal_reason_' . $short_code} ?? '' }}" placeholder="Reason">
                    </div>

                    <div class="col-12 col-md-6 mb-3 mb-md-4">
                        <label for="inner_page_report_modal_reason_placeholder_{{ $short_code }}" class="form-label label">Reason Placeholder</label>
                        <input type="text" class="form-control input-field" id="inner_page_report_modal_reason_placeholder_{{ $short_code }}" name="inner_page_report_modal_reason_placeholder_{{ $short_code }}" value="{{ $contents->{'inner_page_report_modal_reason_placeholder_' . $short_code} ?? '' }}" placeholder="Reason Placeholder">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="inner_page_report_modal_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="inner_page_report_modal_button_{{ $short_code }}" name="inner_page_report_modal_button_{{ $short_code }}" value="{{ $contents->{'inner_page_report_modal_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-button">Save Changes</button>

            <x-backend.notification></x-backend.notification>
        </form>
    </div>

@endsection