@extends('backend.layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="inner-page">
        <form action="{{ route('admin.pages.homepage.update', $language) }}" method="POST" enctype="multipart/form-data" class="form">
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

                    <div class="col-12 mb-4">
                        <label for="section_1_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="section_1_description_{{ $short_code }}" name="section_1_description_{{ $short_code }}" value="{{ $contents->{'section_1_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_label_1_{{ $short_code }}" class="form-label label">Label 1</label>
                        <input type="text" class="form-control input-field" id="section_1_label_1_{{ $short_code }}" name="section_1_label_1_{{ $short_code }}" value="{{ $contents->{'section_1_label_1_' . $short_code} ?? '' }}" placeholder="Label 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_placeholder_1_{{ $short_code }}" class="form-label label">Placeholder 1</label>
                        <input type="text" class="form-control input-field" id="section_1_placeholder_1_{{ $short_code }}" name="section_1_placeholder_1_{{ $short_code }}" value="{{ $contents->{'section_1_placeholder_1_' . $short_code} ?? '' }}" placeholder="Placeholder 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_label_2_{{ $short_code }}" class="form-label label">Label 2</label>
                        <input type="text" class="form-control input-field" id="section_1_label_2_{{ $short_code }}" name="section_1_label_2_{{ $short_code }}" value="{{ $contents->{'section_1_label_2_' . $short_code} ?? '' }}" placeholder="Label 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_placeholder_2_{{ $short_code }}" class="form-label label">Placeholder 2</label>
                        <input type="text" class="form-control input-field" id="section_1_placeholder_2_{{ $short_code }}" name="section_1_placeholder_2_{{ $short_code }}" value="{{ $contents->{'section_1_placeholder_2_' . $short_code} ?? '' }}" placeholder="Placeholder 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_label_3_{{ $short_code }}" class="form-label label">Label 3</label>
                        <input type="text" class="form-control input-field" id="section_1_label_3_{{ $short_code }}" name="section_1_label_3_{{ $short_code }}" value="{{ $contents->{'section_1_label_3_' . $short_code} ?? '' }}" placeholder="Label 3">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_placeholder_3_{{ $short_code }}" class="form-label label">Placeholder 3</label>
                        <input type="text" class="form-control input-field" id="section_1_placeholder_3_{{ $short_code }}" name="section_1_placeholder_3_{{ $short_code }}" value="{{ $contents->{'section_1_placeholder_3_' . $short_code} ?? '' }}" placeholder="Placeholder 3">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_label_4_{{ $short_code }}" class="form-label label">Label 4</label>
                        <input type="text" class="form-control input-field" id="section_1_label_4_{{ $short_code }}" name="section_1_label_4_{{ $short_code }}" value="{{ $contents->{'section_1_label_4_' . $short_code} ?? '' }}" placeholder="Label 4">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_placeholder_4_{{ $short_code }}" class="form-label label">Placeholder 4</label>
                        <input type="text" class="form-control input-field" id="section_1_placeholder_4_{{ $short_code }}" name="section_1_placeholder_4_{{ $short_code }}" value="{{ $contents->{'section_1_placeholder_4_' . $short_code} ?? '' }}" placeholder="Placeholder 4">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="section_1_button_{{ $short_code }}" name="section_1_button_{{ $short_code }}" value="{{ $contents->{'section_1_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_size_{{ $short_code }}" class="form-label label">Size</label>
                        <input type="text" class="form-control input-field" id="section_1_size_{{ $short_code }}" name="section_1_size_{{ $short_code }}" value="{{ $contents->{'section_1_size_' . $short_code} ?? '' }}" placeholder="Size">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_size_1_{{ $short_code }}" class="form-label label">Size 1</label>
                        <input type="text" class="form-control input-field" id="section_1_size_1_{{ $short_code }}" name="section_1_size_1_{{ $short_code }}" value="{{ $contents->{'section_1_size_1_' . $short_code} ?? '' }}" placeholder="Size 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_size_2_{{ $short_code }}" class="form-label label">Size 2</label>
                        <input type="text" class="form-control input-field" id="section_1_size_2_{{ $short_code }}" name="section_1_size_2_{{ $short_code }}" value="{{ $contents->{'section_1_size_2_' . $short_code} ?? '' }}" placeholder="Size 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_size_3_{{ $short_code }}" class="form-label label">Size 3</label>
                        <input type="text" class="form-control input-field" id="section_1_size_3_{{ $short_code }}" name="section_1_size_3_{{ $short_code }}" value="{{ $contents->{'section_1_size_3_' . $short_code} ?? '' }}" placeholder="Size 3">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_1_size_4_{{ $short_code }}" class="form-label label">Size 4</label>
                        <input type="text" class="form-control input-field" id="section_1_size_4_{{ $short_code }}" name="section_1_size_4_{{ $short_code }}" value="{{ $contents->{'section_1_size_4_' . $short_code} ?? '' }}" placeholder="Size 4">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="section_1_type_{{ $short_code }}" class="form-label label">Type</label>
                        <input type="text" class="form-control input-field" id="section_1_type_{{ $short_code }}" name="section_1_type_{{ $short_code }}" value="{{ $contents->{'section_1_type_' . $short_code} ?? '' }}" placeholder="Type">
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_section_1_image" old_value="{{ $contents->{'section_1_image_' . $short_code} ?? '' }}" new_name="new_section_1_image" path="pages"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_1_image"></x-backend.input-error>
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

                    <div class="col-12 mb-4">
                        <label for="section_2_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="section_2_description_{{ $short_code }}" name="section_2_description_{{ $short_code }}" value="{{ $contents->{'section_2_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_city_1_{{ $short_code }}" class="form-label label">Riyadh</label>
                        <input type="text" class="form-control input-field" id="section_2_city_1_{{ $short_code }}" name="section_2_city_1_{{ $short_code }}" value="{{ $contents->{'section_2_city_1_' . $short_code} ?? '' }}" placeholder="Riyadh">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_city_2_{{ $short_code }}" class="form-label label">Jeddah</label>
                        <input type="text" class="form-control input-field" id="section_2_city_2_{{ $short_code }}" name="section_2_city_2_{{ $short_code }}" value="{{ $contents->{'section_2_city_2_' . $short_code} ?? '' }}" placeholder="Jeddah">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_city_3_{{ $short_code }}" class="form-label label">Mecca</label>
                        <input type="text" class="form-control input-field" id="section_2_city_3_{{ $short_code }}" name="section_2_city_3_{{ $short_code }}" value="{{ $contents->{'section_2_city_3_' . $short_code} ?? '' }}" placeholder="Mecca">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_city_4_{{ $short_code }}" class="form-label label">Medina</label>
                        <input type="text" class="form-control input-field" id="section_2_city_4_{{ $short_code }}" name="section_2_city_4_{{ $short_code }}" value="{{ $contents->{'section_2_city_4_' . $short_code} ?? '' }}" placeholder="Medina">
                    </div>

                    <!-- <div class="col-6 mb-4">
                        <label for="section_2_listed_{{ $short_code }}" class="form-label label">Listed</label>
                        <input type="text" class="form-control input-field" id="section_2_listed_{{ $short_code }}" name="section_2_listed_{{ $short_code }}" value="{{ $contents->{'section_2_listed_' . $short_code} ?? '' }}" placeholder="Listed">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_day_ago_{{ $short_code }}" class="form-label label">Day Ago</label>
                        <input type="text" class="form-control input-field" id="section_2_day_ago_{{ $short_code }}" name="section_2_day_ago_{{ $short_code }}" value="{{ $contents->{'section_2_day_ago_' . $short_code} ?? '' }}" placeholder="Day Ago">
                    </div> -->

                    <div class="col-12">
                        <label for="section_2_share_{{ $short_code }}" class="form-label label">Share</label>
                        <input type="text" class="form-control input-field" id="section_2_share_{{ $short_code }}" name="section_2_share_{{ $short_code }}" value="{{ $contents->{'section_2_share_' . $short_code} ?? '' }}" placeholder="Share">
                    </div>

                    <!-- <div class="col-6">
                        <label for="section_2_report_{{ $short_code }}" class="form-label label">Report</label>
                        <input type="text" class="form-control input-field" id="section_2_report_{{ $short_code }}" name="section_2_report_{{ $short_code }}" value="{{ $contents->{'section_2_report_' . $short_code} ?? '' }}" placeholder="Report">
                    </div> -->
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 3</p>

                <div class="row mb-4">
                    <div class="col-12 mb-4">
                        <label for="section_3_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="section_3_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="section_3_description_{{ $short_code }}" name="section_3_description_{{ $short_code }}" value="{{ $contents->{'section_3_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_checkout_{{ $short_code }}" class="form-label label">Checkout</label>
                        <input type="text" class="form-control input-field" id="section_3_checkout_{{ $short_code }}" name="section_3_checkout_{{ $short_code }}" value="{{ $contents->{'section_3_checkout_' . $short_code} ?? '' }}" placeholder="Checkout">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_advertisement_title_{{ $short_code }}" class="form-label label">Advertisement Title</label>
                        <input type="text" class="form-control input-field" id="section_3_advertisement_title_{{ $short_code }}" name="section_3_advertisement_title_{{ $short_code }}" value="{{ $contents->{'section_3_advertisement_title_' . $short_code} ?? '' }}" placeholder="Advertisement Title">
                    </div>

                    <div class="col-6">
                        <label for="section_3_advertisement_sub_title_{{ $short_code }}" class="form-label label">Advertisement Sub Title</label>
                        <input type="text" class="form-control input-field" id="section_3_advertisement_sub_title_{{ $short_code }}" name="section_3_advertisement_sub_title_{{ $short_code }}" value="{{ $contents->{'section_3_advertisement_sub_title_' . $short_code} ?? '' }}" placeholder="Advertisement Sub Title">
                    </div>

                    <div class="col-6">
                        <label for="section_3_advertisement_button_{{ $short_code }}" class="form-label label">Advertisement Button</label>
                        <input type="text" class="form-control input-field" id="section_3_advertisement_button_{{ $short_code }}" name="section_3_advertisement_button_{{ $short_code }}" value="{{ $contents->{'section_3_advertisement_button_' . $short_code} ?? '' }}" placeholder="Advertisement Button">
                    </div>
                </div>

                <div class="sub-page mb-4">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <label for="section_3_page_1_title_{{ $short_code }}" class="form-label label">Page 1 Title</label>
                            <input type="text" class="form-control input-field" id="section_3_page_1_title_{{ $short_code }}" name="section_3_page_1_title_{{ $short_code }}" value="{{ $contents->{'section_3_page_1_title_' . $short_code} ?? '' }}" placeholder="Page 1 Title">
                        </div>

                        <div class="col-6 mb-4">
                            <label for="section_3_page_1_description_{{ $short_code }}" class="form-label label">Page 1 Description</label>
                            <input type="text" class="form-control input-field" id="section_3_page_1_description_{{ $short_code }}" name="section_3_page_1_description_{{ $short_code }}" value="{{ $contents->{'section_3_page_1_description_' . $short_code} ?? '' }}" placeholder="Page 1 Description">
                        </div>

                        <div class="col-12 mb-4">
                            <label for="section_3_page_1_content_{{ $short_code }}" class="form-label label">Page 1 Content</label>
                            <textarea class="editor" id="section_3_page_1_content_{{ $short_code }}" name="section_3_page_1_content_{{ $short_code }}" value="{{ $contents->{'section_3_page_1_content_' . $short_code} ?? '' }}">{{ $contents->{'section_3_page_1_content_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div class="col-12">
                            <x-backend.upload-image old_name="old_section_3_page_1_thumbnail" old_value="{{ $contents->{'section_3_page_1_thumbnail_' . $short_code} ?? '' }}" new_name="new_section_3_page_1_thumbnail" label="Page 1" path="pages"></x-backend.upload-image>
                            <x-backend.input-error field="new_section_3_page_1_thumbnail"></x-backend.input-error>
                        </div>
                    </div>
                </div>

                <div class="sub-page mb-4">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <label for="section_3_page_2_title_{{ $short_code }}" class="form-label label">Page 2 Title</label>
                            <input type="text" class="form-control input-field" id="section_3_page_2_title_{{ $short_code }}" name="section_3_page_2_title_{{ $short_code }}" value="{{ $contents->{'section_3_page_2_title_' . $short_code} ?? '' }}" placeholder="Page 2 Title">
                        </div>

                        <div class="col-6 mb-4">
                            <label for="section_3_page_2_description_{{ $short_code }}" class="form-label label">Page 2 Description</label>
                            <input type="text" class="form-control input-field" id="section_3_page_2_description_{{ $short_code }}" name="section_3_page_2_description_{{ $short_code }}" value="{{ $contents->{'section_3_page_2_description_' . $short_code} ?? '' }}" placeholder="Page 2 Description">
                        </div>

                        <div class="col-12 mb-4">
                            <label for="section_3_page_2_content_{{ $short_code }}" class="form-label label">Page 2 Content</label>
                            <textarea class="editor" id="section_3_page_2_content_{{ $short_code }}" name="section_3_page_2_content_{{ $short_code }}" value="{{ $contents->{'section_3_page_2_content_' . $short_code} ?? '' }}">{{ $contents->{'section_3_page_2_content_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div class="col-12">
                            <x-backend.upload-image old_name="old_section_3_page_2_thumbnail" old_value="{{ $contents->{'section_3_page_2_thumbnail_' . $short_code} ?? '' }}" new_name="new_section_3_page_2_thumbnail" label="Page 2" path="pages"></x-backend.upload-image>
                            <x-backend.input-error field="new_section_3_page_2_thumbnail"></x-backend.input-error>
                        </div>
                    </div>
                </div>

                <div class="sub-page mb-4">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <label for="section_3_page_3_title_{{ $short_code }}" class="form-label label">Page 3 Title</label>
                            <input type="text" class="form-control input-field" id="section_3_page_3_title_{{ $short_code }}" name="section_3_page_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_page_3_title_' . $short_code} ?? '' }}" placeholder="Page 3 Title">
                        </div>

                        <div class="col-6 mb-4">
                            <label for="section_3_page_3_description_{{ $short_code }}" class="form-label label">Page 3 Description</label>
                            <input type="text" class="form-control input-field" id="section_3_page_3_description_{{ $short_code }}" name="section_3_page_3_description_{{ $short_code }}" value="{{ $contents->{'section_3_page_3_description_' . $short_code} ?? '' }}" placeholder="Page 3 Description">
                        </div>

                        <div class="col-12 mb-4">
                            <label for="section_3_page_3_content_{{ $short_code }}" class="form-label label">Page 3 Content</label>
                            <textarea class="editor" id="section_3_page_3_content_{{ $short_code }}" name="section_3_page_3_content_{{ $short_code }}" value="{{ $contents->{'section_3_page_3_content_' . $short_code} ?? '' }}">{{ $contents->{'section_3_page_3_content_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div class="col-12">
                            <x-backend.upload-image old_name="old_section_3_page_3_thumbnail" old_value="{{ $contents->{'section_3_page_3_thumbnail_' . $short_code} ?? '' }}" new_name="new_section_3_page_3_thumbnail" label="Page 3" path="pages"></x-backend.upload-image>
                            <x-backend.input-error field="new_section_3_page_3_thumbnail"></x-backend.input-error>
                        </div>
                    </div>
                </div>

                <div class="sub-page">
                    <div class="row">
                        <div class="col-6 mb-4">
                            <label for="section_3_page_4_title_{{ $short_code }}" class="form-label label">Page 4 Title</label>
                            <input type="text" class="form-control input-field" id="section_3_page_4_title_{{ $short_code }}" name="section_3_page_4_title_{{ $short_code }}" value="{{ $contents->{'section_3_page_4_title_' . $short_code} ?? '' }}" placeholder="Page 4 Title">
                        </div>

                        <div class="col-6 mb-4">
                            <label for="section_3_page_4_description_{{ $short_code }}" class="form-label label">Page 4 Description</label>
                            <input type="text" class="form-control input-field" id="section_3_page_4_description_{{ $short_code }}" name="section_3_page_4_description_{{ $short_code }}" value="{{ $contents->{'section_3_page_4_description_' . $short_code} ?? '' }}" placeholder="Page 4 Description">
                        </div>

                        <div class="col-12 mb-4">
                            <label for="section_3_page_4_content_{{ $short_code }}" class="form-label label">Page 4 Content</label>
                            <textarea class="editor" id="section_3_page_4_content_{{ $short_code }}" name="section_3_page_4_content_{{ $short_code }}" value="{{ $contents->{'section_3_page_4_content_' . $short_code} ?? '' }}">{{ $contents->{'section_3_page_4_content_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div class="col-12">
                            <x-backend.upload-image old_name="old_section_3_page_4_thumbnail" old_value="{{ $contents->{'section_3_page_4_thumbnail_' . $short_code} ?? '' }}" new_name="new_section_3_page_4_thumbnail" label="Page 4" path="pages"></x-backend.upload-image>
                            <x-backend.input-error field="new_section_3_page_4_thumbnail"></x-backend.input-error>
                        </div>
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

                    <div class="col-12 mb-4">
                        <label for="section_4_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="section_4_description_{{ $short_code }}" name="section_4_description_{{ $short_code }}" value="{{ $contents->{'section_4_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_4_placeholder_{{ $short_code }}" class="form-label label">Placeholder</label>
                        <input type="text" class="form-control input-field" id="section_4_placeholder_{{ $short_code }}" name="section_4_placeholder_{{ $short_code }}" value="{{ $contents->{'section_4_placeholder_' . $short_code} ?? '' }}" placeholder="Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_4_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="section_4_button_{{ $short_code }}" name="section_4_button_{{ $short_code }}" value="{{ $contents->{'section_4_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_section_4_image" old_value="{{ $contents->{'section_4_image_' . $short_code} ?? '' }}" new_name="new_section_4_image" path="pages"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_4_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 5</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_5_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_5_title_{{ $short_code }}" name="section_5_title_{{ $short_code }}" value="{{ $contents->{'section_5_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="section_5_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="section_5_description_{{ $short_code }}" name="section_5_description_{{ $short_code }}" value="{{ $contents->{'section_5_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6">
                        <label for="section_5_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="section_5_button_{{ $short_code }}" name="section_5_button_{{ $short_code }}" value="{{ $contents->{'section_5_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-6">
                        <label for="section_5_read_more_{{ $short_code }}" class="form-label label">Read More</label>
                        <input type="text" class="form-control input-field" id="section_5_read_more_{{ $short_code }}" name="section_5_read_more_{{ $short_code }}" value="{{ $contents->{'section_5_read_more_' . $short_code} ?? '' }}" placeholder="Read More">
                    </div>
                </div>
            </div>

            <div class="section mb-5">
                <p class="inner-page-title">Section 6</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_6_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_6_title_{{ $short_code }}" name="section_6_title_{{ $short_code }}" value="{{ $contents->{'section_6_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="section_6_sub_title_{{ $short_code }}" class="form-label label">Sub Title</label>
                        <input type="text" class="form-control input-field" id="section_6_sub_title_{{ $short_code }}" name="section_6_sub_title_{{ $short_code }}" value="{{ $contents->{'section_6_sub_title_' . $short_code} ?? '' }}" placeholder="Sub Title">
                    </div>

                    <div class="col-12">
                        <label for="section_6_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="section_6_button_{{ $short_code }}" name="section_6_button_{{ $short_code }}" value="{{ $contents->{'section_6_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                </div>
            </div>

            <button type="submit" class="submit-button">Save Changes</button>

            <x-backend.notification></x-backend.notification>
        </form>
    </div>

    <x-backend.modal-image-preview></x-backend.modal-image-preview>
@endsection


@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>

    <!-- <script type="module">
        var editor = new FroalaEditor('#example');
    </script> -->
@endpush