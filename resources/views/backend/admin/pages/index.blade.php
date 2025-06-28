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
                    <p class="page-name">About</p>
                    <div class="links">
                        <a href="{{ route('admin.pages.about.index', 'english') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            English
                        </a>

                        <a href="{{ route('admin.pages.about.index', 'arabic') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            Arabic
                        </a>
                    </div>
                </div>

                <div class="single-page">
                    <p class="page-name">Warehouses</p>
                    <div class="links">
                        <a href="#" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            English
                        </a>

                        <a href="#" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            Arabic
                        </a>
                    </div>
                </div>

                <div class="single-page">
                    <p class="page-name">Support</p>
                    <div class="links">
                        <a href="{{ route('admin.pages.support.index', 'english') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            English
                        </a>

                        <a href="{{ route('admin.pages.support.index', 'arabic') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            Arabic
                        </a>
                    </div>
                </div>

                <div class="single-page">
                    <p class="page-name">Articles</p>
                    <div class="links">
                        <a href="{{ route('admin.pages.articles.index', 'english') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            English
                        </a>

                        <a href="{{ route('admin.pages.articles.index', 'arabic') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            Arabic
                        </a>
                    </div>
                </div>

                <div class="single-page">
                    <p class="page-name">Authentications</p>
                    <div class="links">
                        <a href="{{ route('admin.pages.authentications.index', 'english') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            English
                        </a>

                        <a href="{{ route('admin.pages.authentications.index', 'arabic') }}" title="Edit" class="link">
                            <i class="bi bi-pencil-square"></i>
                            Arabic
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection