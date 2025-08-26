@extends('backend.layouts.app')

@section('title', 'Edit a Message')

@section('content')
    <div class="inner-page">
        <div class="page-details">
            <p class="title">Message Details</p>
            <p class="description">View or send messages.</p>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <x-backend.admin-message-sidebar
                    :all_count="$all_count" 
                    :general_count="$general_count" 
                    :landlord_count="$landlord_count" 
                    :tenant_count="$tenant_count" 
                    :starred_count="$starred_count" 
                    :bin_count="$bin_count"
                />
            </div>

            <div class="col-12 col-lg-8">
                <div class="message-form">
                    <form action="{{ route('admin.messages.update', $message) }}" method="POST" enctype="multipart/form-data" class="form">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-4 mb-md-5">
                                <div class="chat-box">
                                    @if($message->creator == auth()->user()->id)
                                        <div class="single-message right-single-message mb-3">
                                            <div>
                                                <p class="right-message">{{ $message->initial_message }}</p>
                                                <p class="time">{{ $message->time_difference }}</p>
                                            </div>

                                            @if(App\Models\User::find($message->creator)->image)
                                                <img src="{{ asset('storage/backend/users/' . App\Models\User::find($message->creator)->image) }}" class="profile-image" alt="Profile Image">
                                            @else
                                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_profile_image) }}" class="profile-image" alt="Profile Image">
                                            @endif
                                        </div>
                                    @else
                                        <div class="single-message left-single-message mb-3">
                                            @if($user->image)
                                                <img src="{{ asset('storage/backend/users/' . $user->image) }}" class="profile-image" alt="Profile Image">
                                            @else
                                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_profile_image) }}" class="profile-image" alt="Profile Image">
                                            @endif

                                            <div>
                                                <p class="left-message">{{ $message->initial_message }}</p>
                                                <p class="time">{{ $message->time_difference }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    @foreach($message_replies as $message_reply)
                                        @if($user->id == $message_reply->replier)
                                            <div class="single-message left-single-message mb-3">
                                                @if($user->image)
                                                    <img src="{{ asset('storage/backend/users/' . $user->image) }}" class="profile-image" alt="Profile Image">
                                                @else
                                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_profile_image) }}" class="profile-image" alt="Profile Image">
                                                @endif
                                                
                                                <div>
                                                    <p class="left-message">{{ $message_reply->message }}</p>
                                                    <p class="time">{{ $message_reply->time_difference }}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="single-message right-single-message mb-3">
                                                <div>
                                                    <p class="right-message">{{ $message_reply->message }}</p>
                                                    <p class="time">{{ $message_reply->time_difference }}</p>
                                                </div>

                                                @if(App\Models\User::find($message_reply->replier)->image)
                                                    <img src="{{ asset('storage/backend/users/' . App\Models\User::find($message_reply->replier)->image) }}" class="profile-image" alt="Profile Image">
                                                @else
                                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_profile_image) }}" class="profile-image" alt="Profile Image">
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 mb-4 mb-md-5">
                                <label for="message" class="form-label label">Message<span class="asterisk">*</span></label>
                                <textarea class="form-control input-field textarea" rows="5" id="message" name="message" placeholder="Message" value="{{ old('message') }}" required>{{ old('message') }}</textarea>
                                <x-backend.input-error field="message"></x-backend.input-error>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="submit-button">Send Message</button>
                            </div>
                        </div>
                    </form>

                    <x-backend.notification></x-backend.notification>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        $(document).ready(function () {
            var chatBox = $(".chat-box");

            if(chatBox[0].scrollHeight > chatBox[0].clientHeight) {
                chatBox.scrollTop(chatBox[0].scrollHeight);
            }
        });
    </script>
@endpush