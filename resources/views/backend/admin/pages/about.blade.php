@extends('backend.layouts.app')

@section('title', 'About')

@section('content')

    <div class="inner-page">
        <form action="{{ route('admin.pages.about.update', $language) }}" method="POST" enctype="multipart/form-data" class="form">
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

                    <div class="col-12 mb-4">
                        <label for="section_2_description_{{ $short_code }}" class="form-label label">Description</label>
                        <textarea class="editor" id="section_2_description_{{ $short_code }}" name="section_2_description_{{ $short_code }}" value="{{ $contents->{'section_2_description_' . $short_code} ?? '' }}">{{ $contents->{'section_2_description_' . $short_code} ?? '' }}</textarea>
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_number_1_{{ $short_code }}" class="form-label label">Number 1</label>
                        <input type="text" class="form-control input-field" id="section_2_number_1_{{ $short_code }}" name="section_2_number_1_{{ $short_code }}" value="{{ $contents->{'section_2_number_1_' . $short_code} ?? '' }}" placeholder="Number 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_text_1_{{ $short_code }}" class="form-label label">Text 1</label>
                        <input type="text" class="form-control input-field" id="section_2_text_1_{{ $short_code }}" name="section_2_text_1_{{ $short_code }}" value="{{ $contents->{'section_2_text_1_' . $short_code} ?? '' }}" placeholder="Text 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_number_2_{{ $short_code }}" class="form-label label">Number 2</label>
                        <input type="text" class="form-control input-field" id="section_2_number_2_{{ $short_code }}" name="section_2_number_2_{{ $short_code }}" value="{{ $contents->{'section_2_number_2_' . $short_code} ?? '' }}" placeholder="Number 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_text_2_{{ $short_code }}" class="form-label label">Text 2</label>
                        <input type="text" class="form-control input-field" id="section_2_text_2_{{ $short_code }}" name="section_2_text_2_{{ $short_code }}" value="{{ $contents->{'section_2_text_2_' . $short_code} ?? '' }}" placeholder="Text 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_number_3_{{ $short_code }}" class="form-label label">Number 3</label>
                        <input type="text" class="form-control input-field" id="section_2_number_3_{{ $short_code }}" name="section_2_number_3_{{ $short_code }}" value="{{ $contents->{'section_2_number_3_' . $short_code} ?? '' }}" placeholder="Number 3">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_2_text_3_{{ $short_code }}" class="form-label label">Text 3</label>
                        <input type="text" class="form-control input-field" id="section_2_text_3_{{ $short_code }}" name="section_2_text_3_{{ $short_code }}" value="{{ $contents->{'section_2_text_3_' . $short_code} ?? '' }}" placeholder="Text 3">
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_section_2_image" old_value="{{ $contents->{'section_2_image_' . $short_code} ?? '' }}" new_name="new_section_2_image" path="pages"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_2_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 3</p>

                <div class="row">
                    <div class="col-6 mb-4">
                        <label for="section_3_left_title_1_{{ $short_code }}" class="form-label label">Left Title 1</label>
                        <input type="text" class="form-control input-field" id="section_3_left_title_1_{{ $short_code }}" name="section_3_left_title_1_{{ $short_code }}" value="{{ $contents->{'section_3_left_title_1_' . $short_code} ?? '' }}" placeholder="Left Title 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_right_title_1_{{ $short_code }}" class="form-label label">Right Title 1</label>
                        <input type="text" class="form-control input-field" id="section_3_right_title_1_{{ $short_code }}" name="section_3_right_title_1_{{ $short_code }}" value="{{ $contents->{'section_3_right_title_1_' . $short_code} ?? '' }}" placeholder="Right Title 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_left_description_1_{{ $short_code }}" class="form-label label">Left Description 1</label>
                        <input type="text" class="form-control input-field" id="section_3_left_description_1_{{ $short_code }}" name="section_3_left_description_1_{{ $short_code }}" value="{{ $contents->{'section_3_left_description_1_' . $short_code} ?? '' }}" placeholder="Left Description 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_right_description_1_{{ $short_code }}" class="form-label label">Right Description 1</label>
                        <input type="text" class="form-control input-field" id="section_3_right_description_1_{{ $short_code }}" name="section_3_right_description_1_{{ $short_code }}" value="{{ $contents->{'section_3_right_description_1_' . $short_code} ?? '' }}" placeholder="Right Description 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_left_title_2_{{ $short_code }}" class="form-label label">Left Title 2</label>
                        <input type="text" class="form-control input-field" id="section_3_left_title_2_{{ $short_code }}" name="section_3_left_title_2_{{ $short_code }}" value="{{ $contents->{'section_3_left_title_2_' . $short_code} ?? '' }}" placeholder="Left Title 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_right_title_2_{{ $short_code }}" class="form-label label">Right Title 2</label>
                        <input type="text" class="form-control input-field" id="section_3_right_title_2_{{ $short_code }}" name="section_3_right_title_2_{{ $short_code }}" value="{{ $contents->{'section_3_right_title_2_' . $short_code} ?? '' }}" placeholder="Right Title 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_left_description_2_{{ $short_code }}" class="form-label label">Left Description 2</label>
                        <input type="text" class="form-control input-field" id="section_3_left_description_2_{{ $short_code }}" name="section_3_left_description_2_{{ $short_code }}" value="{{ $contents->{'section_3_left_description_2_' . $short_code} ?? '' }}" placeholder="Left Description 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_right_description_2_{{ $short_code }}" class="form-label label">Right Description 2</label>
                        <input type="text" class="form-control input-field" id="section_3_right_description_2_{{ $short_code }}" name="section_3_right_description_2_{{ $short_code }}" value="{{ $contents->{'section_3_right_description_2_' . $short_code} ?? '' }}" placeholder="Right Description 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_left_title_3_{{ $short_code }}" class="form-label label">Left Title 3</label>
                        <input type="text" class="form-control input-field" id="section_3_left_title_3_{{ $short_code }}" name="section_3_left_title_3_{{ $short_code }}" value="{{ $contents->{'section_3_left_title_3_' . $short_code} ?? '' }}" placeholder="Left Title 3">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_3_right_title_3_{{ $short_code }}" class="form-label label">Right Title 3</label>
                        <input type="text" class="form-control input-field" id="section_3_right_title_3_{{ $short_code }}" name="section_3_right_title_3_{{ $short_code }}" value="{{ $contents->{'section_3_right_title_3_' . $short_code} ?? '' }}" placeholder="Right Title 3">
                    </div>

                    <div class="col-6">
                        <label for="section_3_left_description_3_{{ $short_code }}" class="form-label label">Left Description 3</label>
                        <input type="text" class="form-control input-field" id="section_3_left_description_3_{{ $short_code }}" name="section_3_left_description_3_{{ $short_code }}" value="{{ $contents->{'section_3_left_description_3_' . $short_code} ?? '' }}" placeholder="Left Description 3">
                    </div>

                    <div class="col-6">
                        <label for="section_3_right_description_3_{{ $short_code }}" class="form-label label">Right Description 3</label>
                        <input type="text" class="form-control input-field" id="section_3_right_description_3_{{ $short_code }}" name="section_3_right_description_3_{{ $short_code }}" value="{{ $contents->{'section_3_right_description_3_' . $short_code} ?? '' }}" placeholder="Right Description 3">
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
                        <textarea class="editor" id="section_4_description_{{ $short_code }}" name="section_4_description_{{ $short_code }}" value="{{ $contents->{'section_4_description_' . $short_code} ?? '' }}">{{ $contents->{'section_4_description_' . $short_code} ?? '' }}</textarea>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="section_4_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="section_4_button_{{ $short_code }}" name="section_4_button_{{ $short_code }}" value="{{ $contents->{'section_4_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_4_image_1_title_{{ $short_code }}" class="form-label label">Image 1 Title</label>
                        <input type="text" class="form-control input-field" id="section_4_image_1_title_{{ $short_code }}" name="section_4_image_1_title_{{ $short_code }}" value="{{ $contents->{'section_4_image_1_title_' . $short_code} ?? '' }}" placeholder="Image 1 Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_4_image_2_title_{{ $short_code }}" class="form-label label">Image 2 Title</label>
                        <input type="text" class="form-control input-field" id="section_4_image_2_title_{{ $short_code }}" name="section_4_image_2_title_{{ $short_code }}" value="{{ $contents->{'section_4_image_2_title_' . $short_code} ?? '' }}" placeholder="Image 2 Title">
                    </div>

                    <div class="col-6">
                        <x-backend.upload-image old_name="old_section_4_image_1" old_value="{{ $contents->{'section_4_image_1_' . $short_code} ?? '' }}" new_name="new_section_4_image_1" path="pages" label="First"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_4_image_1"></x-backend.input-error>
                    </div>

                    <div class="col-6">
                        <x-backend.upload-image old_name="old_section_4_image_2" old_value="{{ $contents->{'section_4_image_2_' . $short_code} ?? '' }}" new_name="new_section_4_image_2" path="pages" label="Second"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_4_image_2"></x-backend.input-error>
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

                    <div class="col-6 mb-4">
                        <label for="section_5_point_1_{{ $short_code }}" class="form-label label">Point 1</label>
                        <input type="text" class="form-control input-field" id="section_5_point_1_{{ $short_code }}" name="section_5_point_1_{{ $short_code }}" value="{{ $contents->{'section_5_point_1_' . $short_code} ?? '' }}" placeholder="Point 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_5_point_1_description_{{ $short_code }}" class="form-label label">Point 1 Description</label>
                        <input type="text" class="form-control input-field" id="section_5_point_1_description_{{ $short_code }}" name="section_5_point_1_description_{{ $short_code }}" value="{{ $contents->{'section_5_point_1_description_' . $short_code} ?? '' }}" placeholder="Point 1 Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_5_point_2_{{ $short_code }}" class="form-label label">Point 2</label>
                        <input type="text" class="form-control input-field" id="section_5_point_2_{{ $short_code }}" name="section_5_point_2_{{ $short_code }}" value="{{ $contents->{'section_5_point_2_' . $short_code} ?? '' }}" placeholder="Point 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_5_point_2_description_{{ $short_code }}" class="form-label label">Point 2 Description</label>
                        <input type="text" class="form-control input-field" id="section_5_point_2_description_{{ $short_code }}" name="section_5_point_2_description_{{ $short_code }}" value="{{ $contents->{'section_5_point_2_description_' . $short_code} ?? '' }}" placeholder="Point 2 Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_5_point_3_{{ $short_code }}" class="form-label label">Point 3</label>
                        <input type="text" class="form-control input-field" id="section_5_point_3_{{ $short_code }}" name="section_5_point_3_{{ $short_code }}" value="{{ $contents->{'section_5_point_3_' . $short_code} ?? '' }}" placeholder="Point 3">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_5_point_3_description_{{ $short_code }}" class="form-label label">Point 3 Description</label>
                        <input type="text" class="form-control input-field" id="section_5_point_3_description_{{ $short_code }}" name="section_5_point_3_description_{{ $short_code }}" value="{{ $contents->{'section_5_point_3_description_' . $short_code} ?? '' }}" placeholder="Point 3 Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_5_point_4_{{ $short_code }}" class="form-label label">Point 4</label>
                        <input type="text" class="form-control input-field" id="section_5_point_4_{{ $short_code }}" name="section_5_point_4_{{ $short_code }}" value="{{ $contents->{'section_5_point_4_' . $short_code} ?? '' }}" placeholder="Point 4">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_5_point_4_description_{{ $short_code }}" class="form-label label">Point 4 Description</label>
                        <input type="text" class="form-control input-field" id="section_5_point_4_description_{{ $short_code }}" name="section_5_point_4_description_{{ $short_code }}" value="{{ $contents->{'section_5_point_4_description_' . $short_code} ?? '' }}" placeholder="Point 4 Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_5_point_5_{{ $short_code }}" class="form-label label">Point 5</label>
                        <input type="text" class="form-control input-field" id="section_5_point_5_{{ $short_code }}" name="section_5_point_5_{{ $short_code }}" value="{{ $contents->{'section_5_point_5_' . $short_code} ?? '' }}" placeholder="Point 5">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_5_point_5_description_{{ $short_code }}" class="form-label label">Point 5 Description</label>
                        <input type="text" class="form-control input-field" id="section_5_point_5_description_{{ $short_code }}" name="section_5_point_5_description_{{ $short_code }}" value="{{ $contents->{'section_5_point_5_description_' . $short_code} ?? '' }}" placeholder="Point 5 Description">
                    </div>

                    <div class="col-12">
                        <x-backend.upload-video old_name="old_section_5_video" old_value="{{ $contents->{'section_5_video_' . $short_code} ?? '' }}" new_name="new_section_5_video" path="pages"></x-backend.upload-video>
                        <x-backend.input-error field="new_section_5_video"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 6</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_6_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_6_title_{{ $short_code }}" name="section_6_title_{{ $short_code }}" value="{{ $contents->{'section_6_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_6_point_1_{{ $short_code }}" class="form-label label">Point 1</label>
                        <input type="text" class="form-control input-field" id="section_6_point_1_{{ $short_code }}" name="section_6_point_1_{{ $short_code }}" value="{{ $contents->{'section_6_point_1_' . $short_code} ?? '' }}" placeholder="Point 1">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_6_point_1_description_{{ $short_code }}" class="form-label label">Point 1 Description</label>
                        <input type="text" class="form-control input-field" id="section_6_point_1_description_{{ $short_code }}" name="section_6_point_1_description_{{ $short_code }}" value="{{ $contents->{'section_6_point_1_description_' . $short_code} ?? '' }}" placeholder="Point 1 Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_6_point_2_{{ $short_code }}" class="form-label label">Point 2</label>
                        <input type="text" class="form-control input-field" id="section_6_point_2_{{ $short_code }}" name="section_6_point_2_{{ $short_code }}" value="{{ $contents->{'section_6_point_2_' . $short_code} ?? '' }}" placeholder="Point 2">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_6_point_2_description_{{ $short_code }}" class="form-label label">Point 2 Description</label>
                        <input type="text" class="form-control input-field" id="section_6_point_2_description_{{ $short_code }}" name="section_6_point_2_description_{{ $short_code }}" value="{{ $contents->{'section_6_point_2_description_' . $short_code} ?? '' }}" placeholder="Point 2 Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_6_point_3_{{ $short_code }}" class="form-label label">Point 3</label>
                        <input type="text" class="form-control input-field" id="section_6_point_3_{{ $short_code }}" name="section_6_point_3_{{ $short_code }}" value="{{ $contents->{'section_6_point_3_' . $short_code} ?? '' }}" placeholder="Point 3">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_6_point_3_description_{{ $short_code }}" class="form-label label">Point 3 Description</label>
                        <input type="text" class="form-control input-field" id="section_6_point_3_description_{{ $short_code }}" name="section_6_point_3_description_{{ $short_code }}" value="{{ $contents->{'section_6_point_3_description_' . $short_code} ?? '' }}" placeholder="Point 3 Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_6_point_4_{{ $short_code }}" class="form-label label">Point 4</label>
                        <input type="text" class="form-control input-field" id="section_6_point_4_{{ $short_code }}" name="section_6_point_4_{{ $short_code }}" value="{{ $contents->{'section_6_point_4_' . $short_code} ?? '' }}" placeholder="Point 4">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_6_point_4_description_{{ $short_code }}" class="form-label label">Point 4 Description</label>
                        <input type="text" class="form-control input-field" id="section_6_point_4_description_{{ $short_code }}" name="section_6_point_4_description_{{ $short_code }}" value="{{ $contents->{'section_6_point_4_description_' . $short_code} ?? '' }}" placeholder="Point 4 Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_6_point_5_{{ $short_code }}" class="form-label label">Point 5</label>
                        <input type="text" class="form-control input-field" id="section_6_point_5_{{ $short_code }}" name="section_6_point_5_{{ $short_code }}" value="{{ $contents->{'section_6_point_5_' . $short_code} ?? '' }}" placeholder="Point 5">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_6_point_5_description_{{ $short_code }}" class="form-label label">Point 5 Description</label>
                        <input type="text" class="form-control input-field" id="section_6_point_5_description_{{ $short_code }}" name="section_6_point_5_description_{{ $short_code }}" value="{{ $contents->{'section_6_point_5_description_' . $short_code} ?? '' }}" placeholder="Point 5 Description">
                    </div>

                    <div class="col-6">
                        <label for="section_6_point_6_{{ $short_code }}" class="form-label label">Point 6</label>
                        <input type="text" class="form-control input-field" id="section_6_point_6_{{ $short_code }}" name="section_6_point_6_{{ $short_code }}" value="{{ $contents->{'section_6_point_6_' . $short_code} ?? '' }}" placeholder="Point 6">
                    </div>

                    <div class="col-6">
                        <label for="section_6_point_6_description_{{ $short_code }}" class="form-label label">Point 6 Description</label>
                        <input type="text" class="form-control input-field" id="section_6_point_6_description_{{ $short_code }}" name="section_6_point_6_description_{{ $short_code }}" value="{{ $contents->{'section_6_point_6_description_' . $short_code} ?? '' }}" placeholder="Point 6 Description">
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 7</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_7_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_7_title_{{ $short_code }}" name="section_7_title_{{ $short_code }}" value="{{ $contents->{'section_7_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="section_7_description_{{ $short_code }}" class="form-label label">Description</label>
                        <textarea class="editor" id="section_7_description_{{ $short_code }}" name="section_7_description_{{ $short_code }}" value="{{ $contents->{'section_7_description_' . $short_code} ?? '' }}">{{ $contents->{'section_7_description_' . $short_code} ?? '' }}</textarea>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="section_7_signature_{{ $short_code }}" class="form-label label">Signature</label>
                        <input type="text" class="form-control input-field" id="section_7_signature_{{ $short_code }}" name="section_7_signature_{{ $short_code }}" value="{{ $contents->{'section_7_signature_' . $short_code} ?? '' }}" placeholder="Signature">
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_section_7_image" old_value="{{ $contents->{'section_7_image_' . $short_code} ?? '' }}" new_name="new_section_7_image" path="pages"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_7_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 8</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_8_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_8_title_{{ $short_code }}" name="section_8_title_{{ $short_code }}" value="{{ $contents->{'section_8_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12 mb-4">
                        <label for="section_8_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="section_8_description_{{ $short_code }}" name="section_8_description_{{ $short_code }}" value="{{ $contents->{'section_8_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_8_name_{{ $short_code }}" class="form-label label">Name</label>
                        <input type="text" class="form-control input-field" id="section_8_name_{{ $short_code }}" name="section_8_name_{{ $short_code }}" value="{{ $contents->{'section_8_name_' . $short_code} ?? '' }}" placeholder="Name">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_8_name_placeholder_{{ $short_code }}" class="form-label label">Name Placeholder</label>
                        <input type="text" class="form-control input-field" id="section_8_name_placeholder_{{ $short_code }}" name="section_8_name_placeholder_{{ $short_code }}" value="{{ $contents->{'section_8_name_placeholder_' . $short_code} ?? '' }}" placeholder="Name Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_8_email_{{ $short_code }}" class="form-label label">Email</label>
                        <input type="text" class="form-control input-field" id="section_8_email_{{ $short_code }}" name="section_8_email_{{ $short_code }}" value="{{ $contents->{'section_8_email_' . $short_code} ?? '' }}" placeholder="Email">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_8_email_placeholder_{{ $short_code }}" class="form-label label">Email Placeholder</label>
                        <input type="text" class="form-control input-field" id="section_8_email_placeholder_{{ $short_code }}" name="section_8_email_placeholder_{{ $short_code }}" value="{{ $contents->{'section_8_email_placeholder_' . $short_code} ?? '' }}" placeholder="Email Placeholder">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_8_check_label_{{ $short_code }}" class="form-label label">Check Label</label>
                        <input type="text" class="form-control input-field" id="section_8_check_label_{{ $short_code }}" name="section_8_check_label_{{ $short_code }}" value="{{ $contents->{'section_8_check_label_' . $short_code} ?? '' }}" placeholder="Check Label">
                    </div>

                    <div class="col-6 mb-4">
                        <label for="section_8_button_{{ $short_code }}" class="form-label label">Button</label>
                        <input type="text" class="form-control input-field" id="section_8_button_{{ $short_code }}" name="section_8_button_{{ $short_code }}" value="{{ $contents->{'section_8_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>

                    <div class="col-12">
                        <x-backend.upload-video old_name="old_section_8_video" old_value="{{ $contents->{'section_8_video_' . $short_code} ?? '' }}" new_name="new_section_8_video" path="pages"></x-backend.upload-video>
                        <x-backend.input-error field="new_section_8_video"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 9</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_9_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_9_title_{{ $short_code }}" name="section_9_title_{{ $short_code }}" value="{{ $contents->{'section_9_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12">
                        <label for="section_9_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="section_9_description_{{ $short_code }}" name="section_9_description_{{ $short_code }}" value="{{ $contents->{'section_9_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>
                </div>
            </div>

            <div class="section mb-4">
                <p class="inner-page-title">Section 10</p>

                <div class="row">
                    <div class="col-12 mb-4">
                        <label for="section_10_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_10_title_{{ $short_code }}" name="section_10_title_{{ $short_code }}" value="{{ $contents->{'section_10_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12">
                        <x-backend.upload-image old_name="old_section_10_image" old_value="{{ $contents->{'section_10_image_' . $short_code} ?? '' }}" new_name="new_section_10_image" path="pages"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_10_image"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section mb-5">
                <p class="inner-page-title">Section 11</p>

                <div class="row mb-4">
                    <div class="col-12 mb-4">
                        <label for="section_11_title_{{ $short_code }}" class="form-label label">Title</label>
                        <input type="text" class="form-control input-field" id="section_11_title_{{ $short_code }}" name="section_11_title_{{ $short_code }}" value="{{ $contents->{'section_11_title_' . $short_code} ?? '' }}" placeholder="Title">
                    </div>

                    <div class="col-12">
                        <label for="section_11_description_{{ $short_code }}" class="form-label label">Description</label>
                        <input type="text" class="form-control input-field" id="section_11_description_{{ $short_code }}" name="section_11_description_{{ $short_code }}" value="{{ $contents->{'section_11_description_' . $short_code} ?? '' }}" placeholder="Description">
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-9">
                        <label class="form-label label">FAQs</label>
                    </div>

                    <div class="col-3 text-end">
                        <button type="button" class="add-row-button">
                            <i class="bi bi-plus-lg"></i>
                            Add FAQ
                        </button>
                    </div>
                </div>

                @if($contents->{'section_11_faqs_' . $short_code})
                    @foreach(json_decode($contents->{'section_11_faqs_' . $short_code}) as $faq)
                        <div class="row single-item mt-2">
                            <div class="col">
                                <input type="text" class="form-control input-field" name="questions[]" value="{{ $faq->question }}" placeholder="Question" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control input-field" name="answers[]" value="{{ $faq->answer }}" placeholder="Answer" required>
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <button type="submit" class="submit-button">Save Changes</button>

            <x-backend.notification></x-backend.notification>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>

    <script>
        $(document).on('click', '.delete-button', function() {
            $(this).closest('.single-item').remove();
        });

        $('.add-row-button').on('click', function() {
            let html = `<div class="row single-item mt-2">
                                <div class="col">
                                    <input type="text" class="form-control input-field" name="questions[]" placeholder="Question" required>
                                </div>

                                <div class="col">
                                    <input type="text" class="form-control input-field" name="answers[]" placeholder="Answer" required>
                                </div>

                                <div class="col-1 d-flex align-items-center">
                                    <a class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>
                                </div>
                            </div>`;

            $(this).closest('.row').parent().append(html);
        });
    </script>
@endpush