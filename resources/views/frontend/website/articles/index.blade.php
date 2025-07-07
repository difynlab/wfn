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

        <div class="section-2 container">
            <div class="row nav-row">
                <div class="col-10 left">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">{{ $contents->{'recent_' . $middleware_language} ?? $contents->recent_en }}</button>
                        </li>
                        @if($categories->count() > 0)
                            @foreach($categories as $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-{{ $category->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $category->id }}" type="button" role="tab" aria-controls="pills-{{ $category->id }}" aria-selected="false">{{ $category->name }}</button>
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
                    @if($articles->count() > 0)
                        <div class="list-view">
                            @foreach($articles->take(4) as $article)
                                <div class="row single-article">
                                    <div class="col-5">
                                        @if($article->thumbnail)
                                            <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="image">
                                        @else
                                            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="image">
                                        @endif
                                    </div>

                                    <div class="col-7">
                                        <p class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('F jS Y') }}</p>
                                        <p class="title">{{ $article->title }}</p>

                                        <p class="category">{{ $article->articleCategory ? $article->articleCategory->name : 'Uncategorized' }}</p>

                                        <div class="content">
                                            {{ Str::limit(strip_tags($article->content), 200) }}
                                        </div>

                                        <a href="{{ route('frontend.articles.show', $article->id) }}" class="read-more">{{ $contents->{'read_more_' . $middleware_language} ?? $contents->read_more_en }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="grid-view d-none">
                            <div class="row">
                                @foreach($articles->take(5) as $article)
                                    <div class="col-4 single-article">
                                        @if($article->thumbnail)
                                            <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="image">
                                        @else
                                            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="image">
                                        @endif

                                        <p class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }}</p>

                                        <p class="title">{{ Str::limit($article->title, 50) }}</p>

                                        <p class="category">{{ $article->articleCategory ? $article->articleCategory->name : 'Uncategorized' }}</p>

                                        <div class="content">{{ Str::limit(strip_tags($article->content), 100) }}</div>

                                        <a href="{{ route('frontend.articles.show', $article->id) }}" class="read-more">{{ $contents->{'read_more_' . $middleware_language} ?? $contents->read_more_en }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p>No articles found.</p>
                        </div>
                    @endif
                </div>

                @if($categories->count() > 0)
                    @foreach($categories as $category)
                        <div class="tab-pane fade" id="pills-{{ $category->id }}" role="tabpanel" aria-labelledby="pills-{{ $category->id }}-tab" tabindex="0">
                            @php
                                $categoryArticles = $articles->where('article_category_id', $category->id);
                            @endphp
                            
                            @if($categoryArticles->count() > 0)
                                <div class="list-view">
                                    @foreach($categoryArticles->take(4) as $article)
                                        <div class="row single-article">
                                            <div class="col-5">
                                                @if($article->thumbnail)
                                                    <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="image">
                                                @else
                                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="image">
                                                @endif
                                            </div>

                                            <div class="col-7">
                                                <p class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }}</p>
                                                <p class="title">{{ $article->title }}</p>

                                                <p class="category">{{ $article->articleCategory ? $article->articleCategory->name : 'categorized' }}</p>

                                                <div class="content">
                                                    {{ Str::limit(strip_tags($article->content), 200) }}
                                                </div>

                                                <a href="{{ route('frontend.articles.show', $article->id) }}" class="read-more">{{ $contents->{'read_more_' . $middleware_language} ?? $contents->read_more_en }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="grid-view d-none">
                                    <div class="row">
                                        @foreach($categoryArticles->take(5) as $article)
                                            <div class="col-4 single-article">
                                                @if($article->thumbnail)
                                                    <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="image">
                                                @else
                                                    <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="image">
                                                @endif

                                                <p class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('M d, Y') }}</p>

                                                <p class="title">{{ Str::limit($article->title, 50) }}</p>

                                                <p class="category">{{ $article->articleCategory ? $article->articleCategory->name : 'Uncategorized' }}</p>

                                                <div class="content">{{ Str::limit(strip_tags($article->content), 100) }}</div>

                                                <a href="{{ route('frontend.articles.show', $article->id) }}" class="read-more">{{ $contents->{'read_more_' . $middleware_language} ?? $contents->read_more_en }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <p>No articles found in this category.</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
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
@endpush