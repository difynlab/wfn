@extends('frontend.layouts.app')

@section('title', $contents->{'section_3_page_' . $area . '_title_' . $middleware_language} ?? $contents->{'section_3_page_' . $area . '_title_en'})

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/area.css') }}">
@endpush

@section('content')
    <div class="area page-global">
        <div class="section-1 container section-margin">
            <div class="content">{!! $contents->{'section_3_page_' . $area . '_content_' . $middleware_language} ?? $contents->{'section_3_page_' . $area . '_content_en'} !!}</div>
        </div>

        <div class="section-2">
            <div class="container">
                <div class="row advertise">
                    <div class="col-9">
                        <p class="text">{{ $contents->{'section_3_advertisement_title_' . $middleware_language} ?? $contents->section_3_advertisement_title_en }}</p>
                        <p class="text">{{ $contents->{'section_3_advertisement_sub_title_' . $middleware_language} ?? $contents->section_3_advertisement_sub_title_en }}</p>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('supports.index') }}" class="advertise-button">{{ $contents->{'section_3_advertisement_button_' . $middleware_language} ?? $contents->section_3_advertisement_button_en }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection