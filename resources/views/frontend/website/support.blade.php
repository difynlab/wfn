@extends('frontend.layouts.app')

@section('title', 'Support')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/support.css') }}">
@endpush
 
@section('content')
    <div class="support page-global">
         @if($contents->title_en)
            <div class="section-1 container section-margin">
                <h1 class="page-title">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h1>
                <p class="page-description">{{ $contents->{'description_' . $middleware_language} ?? $contents->description_en }}</p>
            </div>
        @endif
        
        @if($contents->title_en)
            <div class="section-2 container">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-4">
                                <label for="name" class="form-label label">{{ $contents->{'name_' . $middleware_language} ?? $contents->name_en }}<span class="asterisk">*</span></label>
                                <input type="text" id="name" class="form-control input-field" name="name" placeholder="{{ $contents->{'name_placeholder_' . $middleware_language} ?? $contents->name_placeholder_en }}" required>
                            </div>

                            <div class="mb-4">
                                <div class="row contact-row">
                                    <div class="col-6 col-md-6 contact-field">
                                        <label for="contact-number" class="form-label label">{{ $contents->{'phone_' . $middleware_language} ?? $contents->phone_en }}</label>
                                        <input type="text" id="contact-number" class="form-control input-field" name="contact_number" placeholder="{{ $contents->{'phone_placeholder_' . $middleware_language} ?? $contents->phone_placeholder_en }}">
                                    </div>
                                    <div class="col-6 col-md-6 contact-field">
                                        <label for="email" class="form-label label">{{ $contents->{'email_' . $middleware_language} ?? $contents->email_en }}<span class="asterisk">*</span></label>
                                        <input type="email" id="email" class="form-control input-field" name="email" placeholder="{{ $contents->{'email_placeholder_' . $middleware_language} ?? $contents->email_placeholder_en }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="category-type" class="form-label label">{{ $contents->{'category_' . $middleware_language} ?? $contents->category_en }}<span class="asterisk">*</span></label>
                                <select class="form-select input-field" id="category-type" name="category_type" required>
                                    <option value="">{{ $contents->{'category_placeholder_' . $middleware_language} ?? $contents->category_placeholder_en }}</option>
                                    <option value="general">{{ $contents->{'category_1_' . $middleware_language} ?? $contents->category_1_en }}</option>
                                    <option value="accounts">{{ $contents->{'category_2_' . $middleware_language} ?? $contents->category_2_en }}</option>
                                    <option value="billings">{{ $contents->{'category_3_' . $middleware_language} ?? $contents->category_3_en }}</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="subject" class="form-label label">{{ $contents->{'subject_' . $middleware_language} ?? $contents->subject_en }}<span class="asterisk">*</span></label>
                                <select class="form-select input-field" id="subject" name="subject" required>
                                    <option value="">{{ $contents->{'subject_placeholder_' . $middleware_language} ?? $contents->subject_placeholder_en }}</option>
                                </select>
                            </div>

                            {{-- <div class="mb-5">
                                <label for="message" class="form-label label">{{ $contents->{'message_' . $middleware_language} ?? $contents->message_en }}<span class="asterisk">*</span></label>
                                <textarea id="message" class="form-control" name="message" rows="5" placeholder="{{ $contents->{'message_placeholder_' . $middleware_language} ?? $contents->message_placeholder_en }}" required></textarea>
                            </div> --}}

                            <button type="submit" class="submit-button">{{ $contents->{'button_' . $middleware_language} ?? $contents->button_en }}</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection