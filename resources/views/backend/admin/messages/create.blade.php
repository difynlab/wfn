@extends('backend.layouts.app')

@section('title', 'Write a Message')

@section('content')
    <div class="inner-page">
        <div class="page-details">
            <p class="title">Write Message</p>
            <p class="description">Send a message to any user in here.</p>
        </div>
        
        <div class="row">
            <div class="col-4">
                <x-backend.admin-message-sidebar
                    :all_count="$all_count" 
                    :general_count="$general_count" 
                    :landlord_count="$landlord_count" 
                    :tenant_count="$tenant_count" 
                    :starred_count="$starred_count" 
                    :bin_count="$bin_count"
                />
            </div>

            <div class="col-8">
                <div class="message-form">
                    <form action="{{ route('admin.messages.store') }}" method="POST" enctype="multipart/form-data" class="form">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-4">
                                <label for="user_id" class="form-label label">User<span class="asterisk">*</span></label>
                                <select class="form-select input-field js-single" id="user_id" name="user_id" required>
                                    <option value="">Select user</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->first_name }} {{ $user->last_name }}</option>
                                    @endforeach
                                </select>
                                <x-backend.input-error field="user_id"></x-backend.input-error>
                            </div>

                            <div class="col-6 mb-4">
                                <label for="category" class="form-label label">Category<span class="asterisk">*</span></label>
                                <select class="form-select input-field js-single" id="category" name="category" required>
                                    <option value="">Select category</option>
                                    <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                                    <option value="landlord" {{ old('category') == 'landlord' ? 'selected' : '' }}>Landlord Inquiry</option>
                                    <option value="tenant" {{ old('category') == 'tenant' ? 'selected' : '' }}>Tenant Inquiry</option>
                                </select>
                                <x-backend.input-error field="category"></x-backend.input-error>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="subject" class="form-label label">Subject<span class="asterisk">*</span></label>
                                <input type="text" class="form-control input-field" id="subject" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                <x-backend.input-error field="subject"></x-backend.input-error>
                            </div>

                            <div class="col-12 mb-5">
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