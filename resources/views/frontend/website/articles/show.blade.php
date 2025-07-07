@extends('frontend.layouts.app')

@section('title', 'Article')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/article.css') }}">
@endpush

@section('content')
    <div class="article page-global">
        <div class="section-1 container section-margin">
            <div class="row title-row">
                <div class="col-10 left">
                    <h1 class="section-title">{{ $article->title }}</h1>

                    <p class="details">
                        <span class="author">{{ $contents->{'written_by_' . $middleware_language} ?? $contents->written_by_en }} {{ $article->author_name }}</span>
                        <span class="line">|</span>
                        <span class="date">{{ \Carbon\Carbon::parse($article->created_at)->format('F d, Y') }}</span>
                    </p>
                </div>

                <div class="col-2 right">
                    <!-- In future -->
                        <i class="bi bi-share icon"></i>
                    <!-- In future -->
                </div>
            </div>

            @if($article->thumbnail)
                <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="thumbnail-image">
            @else
                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="thumbnail-image">
            @endif

            <div class="section-description">{!! $article->content !!}</div>
        </div>
        
        <div class="section-2 container">
            <p class="section-title">{{ $contents->{'related_articles_' . $middleware_language} ?? $contents->related_articles_en }}</p>

            <div class="row">
                @foreach($recent_articles as $recent_article)
                    <div class="col-4 single-article">
                        @if($recent_article->thumbnail)
                            <img src="{{ asset('storage/backend/articles/' . $recent_article->thumbnail) }}" alt="article-image" class="image">
                        @else
                            <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="image">
                        @endif

                        <p class="date">{{ \Carbon\Carbon::parse($recent_article->created_at)->format('F d, Y') }}</p>

                        <p class="title line-clamp-1">{{ $recent_article->title }}</p>

                        <div class="content line-clamp-2">{!! $recent_article->content !!}</div>

                        <a href="{{ route('frontend.articles.show', $recent_article) }}" class="read-more">Read more</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection