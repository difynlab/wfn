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
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" title="Share on Facebook">
                        <i class="bi bi-facebook icon"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}" target="_blank" title="Share on Twitter">
                        <i class="bi bi-twitter icon"></i>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" title="Share on LinkedIn">
                        <i class="bi bi-linkedin icon"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . url()->current()) }}" target="_blank" title="Share on WhatsApp">
                        <i class="bi bi-whatsapp icon"></i>
                    </a>
                </div>
            </div>

            @if($article->thumbnail)
                <img src="{{ asset('storage/backend/articles/' . $article->thumbnail) }}" alt="article-image" class="thumbnail-image">
            @else
                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="thumbnail-image">
            @endif

            <div class="section-description">{!! $article->content !!}</div>
        </div>
        
        @if($related_articles->count() > 0)
            <div class="section-2 container">
                <p class="section-title">{{ $contents->{'related_articles_' . $middleware_language} ?? $contents->related_articles_en }}</p>

                <div class="row">
                    @foreach($related_articles as $related_article)
                        <div class="col-4 single-article">
                            @if($related_article->thumbnail)
                                <img src="{{ asset('storage/backend/articles/' . $related_article->thumbnail) }}" alt="article-image" class="image">
                            @else
                                <img src="{{ asset('storage/backend/global/' . App\Models\Setting::find(1)->no_image) }}" alt="article-image" class="image">
                            @endif

                            <p class="date">{{ \Carbon\Carbon::parse($related_article->created_at)->format('F d, Y') }}</p>

                            <p class="title line-clamp-1">{{ $related_article->title }}</p>

                            <div class="content line-clamp-2">{!! $related_article->content !!}</div>

                            <a href="{{ route('articles.show', $related_article) }}" class="read-more">{{ $contents->{'read_more_' . $middleware_language} ?? $contents->read_more_en }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection