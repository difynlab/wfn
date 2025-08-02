@extends('frontend.layouts.app')

@section('title', 'Articles')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/articles.css') }}">
@endpush
 
@section('content')
    <div class="articles page-global">
        <div class="section-1 container section-margin">
            <h1 class="page-title">{{ $contents->{'title_' . $middleware_language} ?? $contents->title_en }}</h1>
            <p class="page-description">{{ $contents->{'description_' . $middleware_language} ?? $contents->description_en }}</p>
        </div>

        @if($article_categories->count() > 0)
            <div class="section-2 container">
                <div class="row nav-row">
                    <div class="col-12 col-md-10 left">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" onclick="redirectToTab('recent')" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">{{ $contents->{'recent_' . $middleware_language} ?? $contents->recent_en }}</button>
                            </li>
                            @if($article_categories->count() > 0)
                                @foreach($article_categories as $article_category)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" onclick="redirectToTab('{{ $article_category->id }}')" id="pills-{{ $article_category->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $article_category->id }}" type="button" role="tab" aria-controls="pills-{{ $article_category->id }}" aria-selected="false">{{ $article_category->name }}</button>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <div class="col-2 right">
                        <i class="bi bi-list-ul list-view-button active"></i>
                        <i class="bi bi-grid grid-view-button"></i>
                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-recent" role="tabpanel" aria-labelledby="pills-recent-tab" tabindex="0">
                        <div class="list-view">
                            @foreach($articles as $article)
                                <div class="row single-article">
                                    <div class="col-12 mb-2 mb-sm-4 mb-lg-0 col-lg-5">
                                        @if($article->thumbnail)
                                            <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="image">
                                        @else
                                            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="image">
                                        @endif
                                    </div>

                                    <div class="col-12 col-lg-7">
                                        <p class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('F jS Y') }}</p>
                                        <p class="title">{{ $article->title }}</p>

                                        <p class="category">{{ $article->articleCategory ? $article->articleCategory->name : 'Un Categorized' }}</p>

                                        <div class="content">
                                            {{ Str::limit(strip_tags($article->content), 200) }}
                                        </div>

                                        <a href="{{ route('articles.show', $article->id) }}" class="read-more">{{ $contents->{'read_more_' . $middleware_language} ?? $contents->read_more_en }}</a>
                                    </div>
                                </div>
                            @endforeach

                            {{ $articles->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                        </div>

                        <div class="grid-view d-none">
                            <div class="row">
                                @foreach($articles as $article)
                                    <div class="col-6 mb-2 mb-sm-4 mb-lg-0 col-lg-4 single-article">
                                        @if($article->thumbnail)
                                            <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="image">
                                        @else
                                            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="image">
                                        @endif

                                        <p class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }}</p>

                                        <p class="title">{{ Str::limit($article->title, 50) }}</p>

                                        <p class="category">{{ $article->articleCategory ? $article->articleCategory->name : 'Un Categorized' }}</p>

                                        <div class="content">{{ Str::limit(strip_tags($article->content), 100) }}</div>

                                        <a href="{{ route('articles.show', $article->id) }}" class="read-more">{{ $contents->{'read_more_' . $middleware_language} ?? $contents->read_more_en }}</a>
                                    </div>
                                @endforeach
                            </div>

                            {{ $articles->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                        </div>
                    </div>

                    @if($article_categories->count() > 0)
                        @foreach($article_categories as $article_category)
                            <div class="tab-pane fade" id="pills-{{ $article_category->id }}" role="tabpanel" aria-labelledby="pills-{{ $article_category->id }}-tab" tabindex="0">
                                @php
                                    $filtered_articles = \App\Models\Article::where('article_category_id', $article_category->id)->paginate(5);
                                @endphp

                                <div class="list-view">
                                    @foreach($filtered_articles as $article)
                                        <div class="row single-article">
                                            <div class="col-12 mb-2 mb-sm-4 mb-lg-0 col-lg-5">
                                                @if($article->thumbnail)
                                                    <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="image">
                                                @else
                                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="image">
                                                @endif
                                            </div>

                                            <div class="col-12 col-lg-7">
                                                <p class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }}</p>
                                                <p class="title">{{ $article->title }}</p>

                                                <p class="category">{{ $article->articleCategory ? $article->articleCategory->name : 'categorized' }}</p>

                                                <div class="content">
                                                    {{ Str::limit(strip_tags($article->content), 200) }}
                                                </div>

                                                <a href="{{ route('articles.show', $article->id) }}" class="read-more">{{ $contents->{'read_more_' . $middleware_language} ?? $contents->read_more_en }}</a>
                                            </div>
                                        </div>
                                    @endforeach

                                    {{ $filtered_articles->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                                </div>

                                <div class="grid-view d-none">
                                    <div class="row">
                                        @foreach($filtered_articles as $article)
                                            <div class="col-6 mb-2 mb-sm-4 mb-lg-0 col-lg-4 single-article">
                                                @if($article->thumbnail)
                                                    <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="image">
                                                @else
                                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="image">
                                                @endif

                                                <p class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }}</p>

                                                <p class="title">{{ Str::limit($article->title, 50) }}</p>

                                                <p class="category">{{ $article->articleCategory ? $article->articleCategory->name : 'Un Categorized' }}</p>

                                                <div class="content">{{ Str::limit(strip_tags($article->content), 100) }}</div>

                                                <a href="{{ route('articles.show', $article->id) }}" class="read-more">{{ $contents->{'read_more_' . $middleware_language} ?? $contents->read_more_en }}</a>
                                            </div>
                                        @endforeach
                                    </div>

                                    {{ $filtered_articles->appends(request()->except('page'))->links("pagination::bootstrap-5") }}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection

@push('after-scripts')
    <script>
        $('.list-view-button').on('click', function() {
            $('.list-view').removeClass('d-none');
            $('.grid-view').addClass('d-none');

            $(this).addClass('active');
            $('.grid-view-button').removeClass('active');
        });

        $('.grid-view-button').on('click', function() {
            $('.grid-view').removeClass('d-none');
            $('.list-view').addClass('d-none');

            $(this).addClass('active');
            $('.list-view-button').removeClass('active');
        });
    </script>

    <script>
        function redirectToTab(tabId) {
            window.location.href = `/articles?tab=${tabId}`;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const params = new URLSearchParams(window.location.search);
            const tabId = params.get('tab');

            if(tabId) {
                const triggerEl = document.querySelector(`#pills-${tabId}-tab`);
                if(triggerEl) {
                    const tab = new bootstrap.Tab(triggerEl);
                    tab.show();
                }
            }
        });
    </script>
@endpush