@extends('backend.layouts.app')

@section('title', 'Write a Message')

@section('content')
    <div class="inner-page">
        <div class="page-details">
            <p class="title">Write Message</p>
            <p class="description">Send a message to any user in here.</p>
        </div>
        
        <div class="row">
            <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <x-backend.common-message-sidebar
                    :all_count="$all_count"
                    :starred_count="$starred_count"
                    :bin_count="$bin_count"
                />
            </div>

            <div class="col-12 col-lg-8">
                <div class="message-form">
                    <form action="{{ route('landlord.messages.store') }}" method="POST" enctype="multipart/form-data" class="form">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3 mb-lg-4">
                                <label for="subject" class="form-label label">Subject<span class="asterisk">*</span></label>
                                <input type="text" class="form-control input-field" id="subject" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                <x-backend.input-error field="subject"></x-backend.input-error>
                            </div>

                            <div class="col-12 mb-3 mb-lg-4">
                                <label for="initial_message" class="form-label label">Message<span class="asterisk">*</span></label>
                                <textarea class="form-control input-field textarea" rows="5" id="initial_message" name="initial_message" placeholder="Message" value="{{ old('initial_message') }}" required>{{ old('initial_message') }}</textarea>
                                <x-backend.input-error field="initial_message"></x-backend.input-error>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="submit-button">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection