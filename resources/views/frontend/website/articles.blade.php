@extends('frontend.layouts.app')

@section('title', 'Articles')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/articles.css') }}">
@endpush
 
@section('content')

    <div class="articles container">
        <div class="section-1 container">
            <p class="section-title">Warehouse Insights & Articles</p>
            <p class="section-description">
                Stay informed with the latest articles and insights on warehouse solutions, 
                industry trends, and best practices. Explore expert advice and tips to optimize storage, 
                logistics, and supply chain management for your business.
            </p>
            <div class="row">
                <div class="col-10">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">Recent Articles</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-trends-tab" data-bs-toggle="pill" data-bs-target="#pills-trends" type="button" role="tab" aria-controls="pills-trends" aria-selected="false">Market Trends</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-technology-tab" data-bs-toggle="pill" data-bs-target="#pills-technology" type="button" role="tab" aria-controls="pills-technology" aria-selected="false">Technology</button>
                        </li>
                    </ul>
                </div>
                <div class="col-2">
                    <div class="row">
                        <div class="col list-btn">
                            <i class="bi bi-list-ul"></i>
                        </div>
                        <div class="col grid-btn">
                            <i class="bi bi-grid"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-recent" role="tabpanel" aria-labelledby="pills-recent-tab" tabindex="0">
                    <div class="card-list">
                        <div class="card mb-3 border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/frontend/article-1.png') }}" class="img-fluid rounded-start" alt="article-image">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">April 4th 2025</p>
                                        <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore labore</h5>
                                        <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                        <p class="card-text text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p class="card-text mb-0">
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/frontend/article-2.png') }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">April 4th 2025</p>
                                        <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore labore</h5>
                                        <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                        <p class="card-text text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p class="card-text mb-0">
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/frontend/article-3.png') }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">April 4th 2025</p>
                                        <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore labore</h5>
                                        <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                        <p class="card-text text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p class="card-text mb-0">
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/frontend/article-4.png') }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">April 4th 2025</p>
                                        <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore labore</h5>
                                        <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                        <p class="card-text text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p class="card-text mb-0">
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-grid d-none row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ asset('storage/frontend/article-1.png') }}" class="card-img-top" alt="article-image">
                                <div class="card-body">
                                    <p class="text-muted mb-1">April 4th 2025</p>
                                    <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                                    <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                    <p class="card-text text-secondary">Lorem ipsum dolor sit amet...</p>
                                    <p class="card-text mb-0">
                                        <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ asset('storage/frontend/article-2.png') }}" class="card-img-top" alt="article-image">
                                <div class="card-body">
                                    <p class="text-muted mb-1">April 4th 2025</p>
                                    <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                                    <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                    <p class="card-text text-secondary">Lorem ipsum dolor sit amet...</p>
                                    <p class="card-text mb-0">
                                        <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ asset('storage/frontend/article-3.png') }}" class="card-img-top" alt="article-image">
                                <div class="card-body">
                                    <p class="text-muted mb-1">April 4th 2025</p>
                                    <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                                    <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                    <p class="card-text text-secondary">Lorem ipsum dolor sit amet...</p>
                                    <p class="card-text mb-0">
                                        <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" class="card-img-top" alt="article-image">
                                <div class="card-body">
                                    <p class="text-muted mb-1">April 4th 2025</p>
                                    <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                                    <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                    <p class="card-text text-secondary">Lorem ipsum dolor sit amet...</p>
                                    <p class="card-text mb-0">
                                        <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-trends" role="tabpanel" aria-labelledby="pills-trends-tab" tabindex="0">
                    <div class="card-list">
                        <div class="card mb-3 border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/frontend/article-2.png') }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">April 4th 2025</p>
                                        <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore labore</h5>
                                        <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                        <p class="card-text text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p class="card-text mb-0">
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/frontend/article-3.png') }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">April 4th 2025</p>
                                        <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore labore</h5>
                                        <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                        <p class="card-text text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p class="card-text mb-0">
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/frontend/article-4.png') }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">April 4th 2025</p>
                                        <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore labore</h5>
                                        <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                        <p class="card-text text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p class="card-text mb-0">
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-grid d-none row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ asset('storage/frontend/article-2.png') }}" class="card-img-top" alt="article-image">
                                <div class="card-body">
                                    <p class="text-muted mb-1">April 4th 2025</p>
                                    <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                                    <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                    <p class="card-text text-secondary">Lorem ipsum dolor sit amet...</p>
                                    <p class="card-text mb-0">
                                        <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ asset('storage/frontend/article-3.png') }}" class="card-img-top" alt="article-image">
                                <div class="card-body">
                                    <p class="text-muted mb-1">April 4th 2025</p>
                                    <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                                    <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                    <p class="card-text text-secondary">Lorem ipsum dolor sit amet...</p>
                                    <p class="card-text mb-0">
                                        <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" class="card-img-top" alt="article-image">
                                <div class="card-body">
                                    <p class="text-muted mb-1">April 4th 2025</p>
                                    <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                                    <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                    <p class="card-text text-secondary">Lorem ipsum dolor sit amet...</p>
                                    <p class="card-text mb-0">
                                        <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-technology" role="tabpanel" aria-labelledby="pills-technology-tab" tabindex="0">
                    <div class="card-list">
                        <div class="card mb-3 border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/frontend/article-4.png') }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">April 4th 2025</p>
                                        <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore labore</h5>
                                        <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                        <p class="card-text text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p class="card-text mb-0">
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/frontend/article-2.png') }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">April 4th 2025</p>
                                        <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore labore</h5>
                                        <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                        <p class="card-text text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p class="card-text mb-0">
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3 border-0">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/frontend/article-3.png') }}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">April 4th 2025</p>
                                        <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore labore</h5>
                                        <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                        <p class="card-text text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        </p>
                                        <p class="card-text mb-0">
                                            <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-grid d-none row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ asset('storage/frontend/article-4.png') }}" class="card-img-top" alt="article-image">
                                <div class="card-body">
                                    <p class="text-muted mb-1">April 4th 2025</p>
                                    <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                                    <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                    <p class="card-text text-secondary">Lorem ipsum dolor sit amet...</p>
                                    <p class="card-text mb-0">
                                        <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ asset('storage/frontend/article-2.png') }}" class="card-img-top" alt="article-image">
                                <div class="card-body">
                                    <p class="text-muted mb-1">April 4th 2025</p>
                                    <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                                    <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                    <p class="card-text text-secondary">Lorem ipsum dolor sit amet...</p>
                                    <p class="card-text mb-0">
                                        <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 border-0">
                                <img src="{{ asset('storage/frontend/article-3.png') }}" class="card-img-top" alt="article-image">
                                <div class="card-body">
                                    <p class="text-muted mb-1">April 4th 2025</p>
                                    <h5 class="card-title mb-2">Sed do eiusmod tempor incididun ut labore et dolore</h5>
                                    <span class="badge rounded-pill text-secondary border border-secondary-subtle mb-2">Technology</span>
                                    <p class="card-text text-secondary">Lorem ipsum dolor sit amet...</p>
                                    <p class="card-text mb-0">
                                        <a href="#" class="text-decoration-none text-dark fw-semibold">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const listBtn = document.querySelector(".bi-list-ul");
        const gridBtn = document.querySelector(".bi-grid");

        listBtn.addEventListener("click", function () {
            const activeTab = document.querySelector(".tab-pane.active");
            if (activeTab) {
                activeTab.querySelector(".card-list")?.classList.remove("d-none");
                activeTab.querySelector(".card-grid")?.classList.add("d-none");
            }
        });

        gridBtn.addEventListener("click", function () {
            const activeTab = document.querySelector(".tab-pane.active");
            if (activeTab) {
                activeTab.querySelector(".card-grid")?.classList.remove("d-none");
                activeTab.querySelector(".card-list")?.classList.add("d-none");
            }
        });
    });
</script>
