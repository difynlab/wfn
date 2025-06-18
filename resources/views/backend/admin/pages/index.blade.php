@extends('backend.layouts.app')

@section('title', 'Pages')

@section('content')
    <div class="page">
        <div class="row align-items-center mb-4">
            <div class="col-12">
                <p class="title">Pages</p>
                <p class="description">Manage page contents here.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="single-page">
                    <p class="page-name">Homepage</p>
                    <div class="links">
                        <a href="{{ route('admin.pages.homepage.index', 'english') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            English
                        </a>

                        <a href="{{ route('admin.pages.homepage.index', 'arabic') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            Arabic
                        </a>
                    </div>
                </div>

                <div class="single-page">
                    <p class="page-name">Homepage</p>
                    <div class="links">
                        <a href="{{ route('admin.pages.homepage.index', 'english') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            English
                        </a>

                        <a href="{{ route('admin.pages.homepage.index', 'arabic') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            Arabic
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection