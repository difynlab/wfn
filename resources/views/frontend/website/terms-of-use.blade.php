@extends('frontend.layouts.app')

@section('title', 'Terms of Use')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/terms-of-use.css') }}">
@endpush

@section('content')
    <div class="terms-of-use page-global">
        <div class="section-1 container section-margin">
            <h1 class="page-title">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h1>
            <p class="page-description">{{ $contents->{'description_' . $middleware_language} ?? $contents->description_en }}</p>
        </div>

        @if($contents->content_en)
            <div class="section-2 container">
                <div class="row nav-row">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        @foreach(json_decode($contents->{'content_' . $middleware_language} ?? $contents->content_en) as $key => $content)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $key == 0 ? 'active' : '' }}" id="pills-{{ $key }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $key }}" type="button" role="tab" aria-controls="pills-{{ $key }}" aria-selected="true">
                                    {{ $content->title }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    @foreach(json_decode($contents->{'content_' . $middleware_language} ?? $contents->content_en) as $key => $content)
                        <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}" id="pills-{{ $key }}" role="tabpanel" aria-labelledby="pills-{{ $key }}-tab" tabindex="0"> 
                            <div class="content">{!! $content->content !!}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection