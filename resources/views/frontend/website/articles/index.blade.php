@extends('frontend.layouts.app')

@section('title', 'Articles')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/articles.css') }}">
@endpush
 
@section('content')

    <div class="articles page-global">
        <div class="section-1 container section-margin">
            <h1 class="page-title">Warehouse Insights & Articles</h1>
            <p class="page-description">
                Stay informed with the latest articles and insights on warehouse solutions, 
                industry trends, and best practices. Explore expert advice and tips to optimize storage, 
                logistics, and supply chain management for your business.
            </p>
        </div>

        <div class="section-2 container">
            <div class="row nav-row">
                <div class="col-10 left">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">Recent</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-trends-tab" data-bs-toggle="pill" data-bs-target="#pills-trends" type="button" role="tab" aria-controls="pills-trends" aria-selected="false">Market Trends</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-technology-tab" data-bs-toggle="pill" data-bs-target="#pills-technology" type="button" role="tab" aria-controls="pills-technology" aria-selected="false">Technology</button>
                        </li>
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
                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-1.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>

                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-2.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>

                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-3.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>

                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="grid-view d-none">
                        <div class="row">
                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-1.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-2.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-3.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscin  elit, exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-trends" role="tabpanel" aria-labelledby="pills-trends-tab" tabindex="0">
                    <div class="list-view">
                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-1.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>

                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-2.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>

                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-3.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>

                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="grid-view d-none">
                        <div class="row">
                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-1.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet...</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-2.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet...</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-3.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet...</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet...</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet...</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-technology" role="tabpanel" aria-labelledby="pills-technology-tab" tabindex="0">
                    <div class="list-view">
                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-1.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>

                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-2.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>

                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-3.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>

                        <div class="row single-article">
                            <div class="col-5">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" alt="article-image" class="image">
                            </div>

                            <div class="col-7">
                                <p class="date">April 4th 2025</p>
                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore labore</p>

                                <p class="category">Technology</p>

                                <div class="content">
                                    Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="grid-view d-none">
                        <div class="row">
                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-1.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet...</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-2.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet...</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-3.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet...</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet...</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>

                            <div class="col-4 single-article">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" alt="article-image" class="image">

                                <p class="date">April 4th 2025</p>

                                <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>

                                <p class="category">Technology</p>

                                <div class="content">Lorem ipsum dolor sit amet...</div>

                                <a href="{{ route('frontend.articles.show', 1) }}" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
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