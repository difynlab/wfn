@extends('backend.layouts.app')

@section('title', 'Home Page')

@section('content')

    <x-backend.breadcrumb page_name="Home Page"></x-backend.breadcrumb>

    <div class="static-pages">
        
        <p class="page-language">{{ ucfirst($language) }} Language</p>

        <form action="{{ route('backend.pages.homepage.update', $language) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="section">
                <p class="inner-page-title">Page Details</p>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="page_name_{{ $short_code }}" class="form-label">Page Name<span class="asterisk">*</span></label>
                        <input type="text" class="form-control" id="page_name_{{ $short_code }}" name="page_name_{{ $short_code }}" value="{{ $contents->{'page_name_' . $short_code} ?? '' }}" placeholder="Page Name" required>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 1 <span>(Hero section)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_1_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_1_title_{{ $short_code }}" name="section_1_title_{{ $short_code }}" value="{{ $contents->{'section_1_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_1_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="editor" id="section_1_description_{{ $short_code }}" name="section_1_description_{{ $short_code }}" value="{{ $contents->{'section_1_description_' . $short_code} ?? '' }}">{{ $contents->{'section_1_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-6 right-column">
                        <x-backend.upload-image old_name="old_section_1_image" old_value="{{ $contents->{'section_1_image_' . $short_code} ?? '' }}" new_name="new_section_1_image" path="pages" class="side-box-uploader"></x-backend.upload-image>
                        <x-backend.input-error field="new_section_1_image"></x-backend.input-error>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="section_1_label_{{ $short_code }}" class="form-label">Label</label>
                        <input type="text" class="form-control" id="section_1_label_{{ $short_code }}" name="section_1_label_{{ $short_code }}" value="{{ $contents->{'section_1_label_' . $short_code} ?? '' }}" placeholder="Label">
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input class="form-control" type="text" name="section_1_button_label" value="{{ json_decode($contents->{'section_1_label_link_' . $short_code})->label ?? '' }}" placeholder="Label">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input class="form-control" type="text" name="section_1_button_link" value="{{ json_decode($contents->{'section_1_label_link_' . $short_code})->link ?? '' }}" placeholder="Link">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 2 <span>(Objectives)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_2_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_2_title_{{ $short_code }}" name="section_2_title_{{ $short_code }}" value="{{ $contents->{'section_2_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <x-backend.upload-video old_name="old_section_2_video" old_value="{{ $contents->{'section_2_video_' . $short_code} ?? '' }}" new_name="new_section_2_video" path="pages"></x-backend.upload-video>
                        <x-backend.input-error field="new_section_2_video"></x-backend.input-error>
                    </div>
                    <div class="col-6 right-column">
                        <label for="section_2_points_{{ $short_code }}" class="form-label">Points</label>
                        <div class="all-points">
                            <input class="single-point form-control" type="text" name="section_2_points_{{ $short_code }}[]" value="{{ json_decode($contents->{'section_2_points_' . $short_code})[0] ?? '' }}">
                            <input class="single-point form-control" type="text" name="section_2_points_{{ $short_code }}[]" value="{{ json_decode($contents->{'section_2_points_' . $short_code})[1] ?? '' }}">
                            <input class="single-point form-control" type="text" name="section_2_points_{{ $short_code }}[]" value="{{ json_decode($contents->{'section_2_points_' . $short_code})[2] ?? '' }}">
                            <input class="single-point form-control" type="text" name="section_2_points_{{ $short_code }}[]" value="{{ json_decode($contents->{'section_2_points_' . $short_code})[3] ?? '' }}">
                            <input class="single-point form-control" type="text" name="section_2_points_{{ $short_code }}[]" value="{{ json_decode($contents->{'section_2_points_' . $short_code})[4] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 3 <span>(List of courses)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_3_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_3_title_{{ $short_code }}" name="section_3_title_{{ $short_code }}" value="{{ $contents->{'section_3_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_3_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_3_description_{{ $short_code }}" value="{{ $contents->{'section_3_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_3_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-6">
                        <div class="mb-4">
                            <label for="section_3_first_tab_{{ $short_code }}" class="form-label">First Tab</label>
                            <input type="text" class="form-control" id="section_3_first_tab_{{ $short_code }}" name="section_3_first_tab_{{ $short_code }}" value="{{ $contents->{'section_3_first_tab_' . $short_code} ?? '' }}" placeholder="First Tab">
                        </div>

                        <div>
                            <label for="section_3_third_tab_{{ $short_code }}" class="form-label">Third Tab</label>
                            <input type="text" class="form-control" id="section_3_third_tab_{{ $short_code }}" name="section_3_third_tab_{{ $short_code }}" value="{{ $contents->{'section_3_third_tab_' . $short_code} ?? '' }}" placeholder="Third Tab">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-4">
                            <label for="section_3_second_tab_{{ $short_code }}" class="form-label">Second Tab</label>
                            <input type="text" class="form-control" id="section_3_second_tab_{{ $short_code }}" name="section_3_second_tab_{{ $short_code }}" value="{{ $contents->{'section_3_second_tab_' . $short_code} ?? '' }}" placeholder="Second Tab">
                        </div>

                        <div>
                            <label for="section_3_apply_{{ $short_code }}" class="form-label">Apply</label>
                            <input type="text" class="form-control" id="section_3_apply_{{ $short_code }}" name="section_3_apply_{{ $short_code }}" value="{{ $contents->{'section_3_apply_' . $short_code} ?? '' }}" placeholder="Apply">
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="section_3_label_{{ $short_code }}" class="form-label">Label</label>
                        <input type="text" class="form-control" id="section_3_label_{{ $short_code }}" name="section_3_label_{{ $short_code }}" value="{{ $contents->{'section_3_label_' . $short_code} ?? '' }}" placeholder="Label">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 4 <span>(Testimonials)</span></p>

                <div class="row form-input">
                    <div class="col-6 left-column">
                        <div class="mb-4">
                            <label for="section_4_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_4_title_{{ $short_code }}" name="section_4_title_{{ $short_code }}" value="{{ $contents->{'section_4_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_4_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="10" name="section_4_description_{{ $short_code }}" value="{{ $contents->{'section_4_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_4_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="col-6 right-column">
                        <x-backend.upload-video old_name="old_section_4_video" old_value="{{ $contents->{'section_4_video_' . $short_code} ?? '' }}" new_name="new_section_4_video" class="side-box-uploader" path="pages"></x-backend.upload-video>
                        <x-backend.input-error field="new_section_4_video"></x-backend.input-error>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 5 <span>(Partners)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_5_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_5_title_{{ $short_code }}" name="section_5_title_{{ $short_code }}" value="{{ $contents->{'section_5_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_5_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_5_description_{{ $short_code }}" value="{{ $contents->{'section_5_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_5_description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <x-backend.upload-multi-images image_count="8" old_name="old_section_5_images" old_value="{{ $contents->{'section_5_images_' . $short_code} ?? '' }}" new_name="new_section_5_images[]" path="pages"></x-backend.upload-multi-images>
                            <x-backend.input-error field="new_section_5_images.*"></x-backend.input-error>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 6 <span>(Sign up - CTA)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_6_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_6_title_{{ $short_code }}" name="section_6_title_{{ $short_code }}" value="{{ $contents->{'section_6_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_6_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_6_description_{{ $short_code }}" value="{{ $contents->{'section_6_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_6_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-12">
                        <label for="section_6_label_{{ $short_code }}" class="form-label">Label</label>
                        <input type="text" class="form-control" id="section_6_label_{{ $short_code }}" name="section_6_label_{{ $short_code }}" value="{{ $contents->{'section_6_label_' . $short_code} ?? '' }}" placeholder="Label">
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input class="form-control" type="text" name="section_6_button_label" value="{{ json_decode($contents->{'section_6_label_link_' . $short_code})->label ?? '' }}" placeholder="Label">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input class="form-control" type="text" name="section_6_button_link" value="{{ json_decode($contents->{'section_6_label_link_' . $short_code})->link ?? '' }}" placeholder="Link">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 7 <span>(Our team)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_7_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_7_title_{{ $short_code }}" name="section_7_title_{{ $short_code }}" value="{{ $contents->{'section_7_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div>
                            <label for="section_7_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_7_description_{{ $short_code }}" value="{{ $contents->{'section_7_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_7_description_' . $short_code} ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input class="form-control" type="text" name="section_7_button_label" value="{{ json_decode($contents->{'section_7_label_link_' . $short_code})->label ?? '' }}" placeholder="Label">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input class="form-control" type="text" name="section_7_button_link" value="{{ json_decode($contents->{'section_7_label_link_' . $short_code})->link ?? '' }}" placeholder="Link">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 8 <span>(Sport nutrition selection - CTA)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_8_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_8_title_{{ $short_code }}" name="section_8_title_{{ $short_code }}" value="{{ $contents->{'section_8_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_8_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_8_description_{{ $short_code }}" value="{{ $contents->{'section_8_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_8_description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <label for="section_8_sub_description_{{ $short_code }}" class="form-label">Sub Description</label>
                            <input type="text" class="form-control" id="section_8_sub_description_{{ $short_code }}" name="section_8_sub_description_{{ $short_code }}" value="{{ $contents->{'section_8_sub_description_' . $short_code} ?? '' }}" placeholder="Sub Description">
                        </div>
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-6">
                        <label for="section_8_placeholder_{{ $short_code }}" class="form-label">Placeholder</label>
                        <input type="text" class="form-control" id="section_8_placeholder_{{ $short_code }}" name="section_8_placeholder_{{ $short_code }}" value="{{ $contents->{'section_8_placeholder_' . $short_code} ?? '' }}" placeholder="Placeholder">
                    </div>

                    <div class="col-6">
                        <label for="section_8_button_{{ $short_code }}" class="form-label">Button</label>
                        <input type="text" class="form-control" id="section_8_button_{{ $short_code }}" name="section_8_button_{{ $short_code }}" value="{{ $contents->{'section_8_button_' . $short_code} ?? '' }}" placeholder="Button">
                    </div>
                </div>

                <div class="row form-input">
                    <div class="col-3">
                        <label class="form-label">Button Label</label>

                        <input type="text" class="form-control mb-3" name="section_8_button_labels[]" placeholder="Label" value="{{ json_decode($contents->{'section_8_labels_links_' . $short_code})[0]->label ?? '' }}">

                        <input type="text" class="form-control mb-3" name="section_8_button_labels[]" placeholder="Label" value="{{ json_decode($contents->{'section_8_labels_links_' . $short_code})[1]->label ?? '' }}">

                        <input type="text" class="form-control mb-3" name="section_8_button_labels[]" placeholder="Label" value="{{ json_decode($contents->{'section_8_labels_links_' . $short_code})[2]->label ?? '' }}">

                        <input type="text" class="form-control" name="section_8_button_labels[]" placeholder="Label" value="{{ json_decode($contents->{'section_8_labels_links_' . $short_code})[3]->label ?? '' }}">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Link</label>

                        <input type="url" class="form-control mb-3" name="section_8_button_links[]" placeholder="Link" value="{{ json_decode($contents->{'section_8_labels_links_' . $short_code})[0]->link ?? '' }}">

                        <input type="url" class="form-control mb-3" name="section_8_button_links[]" placeholder="Link" value="{{ json_decode($contents->{'section_8_labels_links_' . $short_code})[1]->link ?? '' }}">

                        <input type="url" class="form-control mb-3" name="section_8_button_links[]" placeholder="Link" value="{{ json_decode($contents->{'section_8_labels_links_' . $short_code})[2]->link ?? '' }}">

                        <input type="url" class="form-control" name="section_8_button_links[]" placeholder="Link" value="{{ json_decode($contents->{'section_8_labels_links_' . $short_code})[3]->link ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="section">
                <p class="inner-page-title">Section 9 <span>(FAQ)</span></p>

                <div class="row form-input">
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="section_9_title_{{ $short_code }}" class="form-label">Title</label>
                            <input type="text" class="form-control" id="section_9_title_{{ $short_code }}" name="section_9_title_{{ $short_code }}" value="{{ $contents->{'section_9_title_' . $short_code} ?? '' }}" placeholder="Title">
                        </div>

                        <div class="mb-4">
                            <label for="section_9_description_{{ $short_code }}" class="form-label">Description</label>
                            <textarea class="form-control" rows="5" name="section_9_description_{{ $short_code }}" value="{{ $contents->{'section_9_description_' . $short_code} ?? '' }}" placeholder="Description">{{ $contents->{'section_9_description_' . $short_code} ?? '' }}</textarea>
                        </div>

                        <div>
                            <label for="section_9_button_{{ $short_code }}" class="form-label">Button</label>
                            <input type="text" class="form-control" id="section_9_button_{{ $short_code }}" name="section_9_button_{{ $short_code }}" value="{{ $contents->{'section_9_button_' . $short_code} ?? '' }}" placeholder="Button">
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="form-input">
                    <button type="submit" class="submit-button">Save Updates</button>
                </div>
            </div>
        </form>
    </div>

@endsection


@push('after-scripts')
    <script src="{{ asset('backend/js/drag-drop-image.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-video.js') }}"></script>
    <script src="{{ asset('backend/js/drag-drop-images.js') }}"></script>
@endpush