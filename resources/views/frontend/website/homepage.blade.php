@extends('frontend.layouts.app')

@section('title', 'Homepage')

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/homepage.css') }}">
@endpush
 
@section('content')
    <div class="homepage">
        <div class="section-1">
            <img src="{{ asset('storage/frontend/homepage-banner.png') }}" alt="Banner" class="banner">

            <div class="overlay">
                <p class="title">Find Your Perfect Warehouse, Anytime, Anywhere</p>

                <p class="description">Discover the warehouse that works for you. Whether you're growing a business or need personal storage, our global network lets you search and book flexible spaces that meet your needs, anytime, anywhere.</p>

                <div class="search-bar" id="searchBar">
                    <div class="search-inputs">
                        <div class="search-item">
                            <p class="search-label">Location</p>
                            <input type="text" class="search-input" placeholder="Search warehouses">
                        </div>
                        <div class="divider"></div>

                        <div class="search-item">
                            <p class="search-label">Start Date</p>
                            <input type="text" class="search-input" placeholder="Add dates">
                        </div>
                        <div class="divider"></div>

                        <div class="search-item">
                            <p class="search-label">End Date</p>
                            <input type="text" class="search-input" placeholder="Add dates">
                        </div>
                        <div class="divider"></div>

                        <div class="search-item">
                            <p class="search-label">Storage Type</p>

                            <div class="dropdown">
                                <a class="btn search-input dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Choose
                                </a>

                                <ul class="dropdown-menu">
                                    <div class="filter">
                                        <p class="title">Warehouse Size</p>
                                        <div class="radio-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="size" id="radio1">
                                                <label class="form-check-label" for="radio1">Up to 50 Pallets</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="size" id="radio2">
                                                <label class="form-check-label" for="radio2">Up to 100 Pallets</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="size" id="radio3">
                                                <label class="form-check-label" for="radio3">Up to 200 Pallets</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="size" id="radio4">
                                                <label class="form-check-label" for="radio4">200+ Pallets</label>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    
                                    <div class="filter">
                                        <p class="title">Warehouse Storage Type</p>
                                        <div class="checkbox-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="storage_type[]" value="dry_storage" id="check1">
                                                <label class="form-check-label" for="check1">
                                                    Dry Storage
                                                </label>
                                            </div>

                                            <label><input type="checkbox"> Chilled Storage (2°C - 8°C)</label>
                                            <label><input type="checkbox"> Frozen Storage (-18°C or below)</label>
                                            <label><input type="checkbox"> Humidity Controlled</label>
                                            <label><input type="checkbox"> Hazardous Materials Storage</label>
                                            <label><input type="checkbox"> Climate-Controlled Storage</label>
                                        </div>
                                    </div>

                                    <button class="clear-filter-button">Clear All Filters</button>
                                </ul>
                            </div>
                        </div>

                        <button type="submit" class="search-btn"><i class="bi bi-search"></i>Search</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section-2 container">
            <p class="section-title">Explore New Warehouses In Saudi Arabia</p>
            <p class="section-description">Keep up with the newest warehouse updates.</p>

            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-riyadh-tab" data-bs-toggle="pill" data-bs-target="#pills-riyadh" type="button" role="tab" aria-controls="pills-riyadh" aria-selected="true">Riyadh</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-jeddah-tab" data-bs-toggle="pill" data-bs-target="#pills-jeddah" type="button" role="tab" aria-controls="pills-jeddah" aria-selected="false">Jeddah</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-mecca-tab" data-bs-toggle="pill" data-bs-target="#pills-mecca" type="button" role="tab" aria-controls="pills-mecca" aria-selected="false">Mecca</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-medina-tab" data-bs-toggle="pill" data-bs-target="#pills-medina" type="button" role="tab" aria-controls="pills-medina" aria-selected="false">Medina</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-riyadh" role="tabpanel" aria-labelledby="pills-riyadh-tab" tabindex="0">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-1.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Olaya, Riyadh 12211</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-2.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Hamra, Riyadh 11493</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-3.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>, Riyadh</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-jeddah" role="tabpanel" aria-labelledby="pills-jeddah-tab" tabindex="0">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-1.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Olaya, Riyadh 12211</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-2.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Hamra, Riyadh 11493</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-3.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>, Riyadh</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-mecca" role="tabpanel" aria-labelledby="pills-mecca-tab" tabindex="0">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-1.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Olaya, Riyadh 12211</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-2.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Hamra, Riyadh 11493</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-3.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>, Riyadh</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-pane fade" id="pills-medina" role="tabpanel" aria-labelledby="pills-medina-tab" tabindex="0">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-1.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Olaya, Riyadh 12211</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-2.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>Al Hamra, Riyadh 11493</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <img src="{{ asset('storage/frontend/riyadh-3.png') }}" class="card-image" alt="Warehouse">

                                <div class="card-body">
                                    <p class="type">Warehouse Type</p>
                                    <p class="title">Lorem ipsum dolor</p>
                                    <p class="description">Sample text describing the warehouse in  area of Riyadh.</p>
                                    <p class="location"><i class="bi bi-geo-alt"></i>, Riyadh</p>
                                    <div class="bottom-box">
                                        <div class="row">
                                            <div class="col-5">
                                                <p class="text">Listed 1 day ago</p>
                                            </div>
                                            <div class="col-7 text-end">
                                                <span class="span-text"><i class="bi bi-share"></i>Share</span>
                                                <span class="span-text"><i class="bi bi-flag"></i>Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-3 container">
            <p class="section-title">Optimize Your Warehouse Search</p>
            <p class="section-description">Discover the best warehouse spaces in the UAE with the most trusted information for your business needs.</p>

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="row card-row">
                            <div class="col-3">
                                <img src="{{ asset('storage/frontend/feature-1.png') }}" class="image" alt="Image">
                            </div>
                            <div class="col-9">
                                <p class="title">Prime Location and Accessibility</p>
                                <p class="description">Warehouses with easy access to major transport routes for efficient logistics.</p>
                                <a href="#" class="checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="row card-row">
                            <div class="col-3">
                                <img src="{{ asset('storage/frontend/feature-2.png') }}" class="image" alt="Image">
                            </div>
                            <div class="col-9">
                                <p class="title">Prime Location and Accessibility</p>
                                <p class="description">Warehouses with easy access to major transport routes for efficient logistics.</p>
                                <a href="#" class="checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="row card-row">
                            <div class="col-3">
                                <img src="{{ asset('storage/frontend/feature-3.png') }}" class="image" alt="Image">
                            </div>
                            <div class="col-9">
                                <p class="title">Prime Location and Accessibility</p>
                                <p class="description">Warehouses with easy access to major transport routes for efficient logistics.</p>
                                <a href="#" class="checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="row card-row">
                            <div class="col-3">
                                <img src="{{ asset('storage/frontend/feature-4.png') }}" class="image" alt="Image">
                            </div>
                            <div class="col-9">
                                <p class="title">Prime Location and Accessibility</p>
                                <p class="description">Warehouses with easy access to major transport routes for efficient logistics.</p>
                                <a href="#" class="checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-4">
            <div class="container">
                <div class="row section-4-row">
                    <div class="col-6">
                        <p class="title">Coming Soon: App Version of <br>Warehouse Finder Network</p>
                        <p class="description">Bringing you an even faster and more convenient way to discover and rent warehouses across Saudi Arabia. With user-friendly features and real-time listings, you’ll be able to find the perfect warehouse anytime, anywhere, right from your mobile device. Stay tuned for a seamless rental experience at your fingertips!</p>

                        <form class="form">
                            <div class="row form-row">
                                <div class="col-9">
                                    <input type="email" class="input" placeholder="Enter email address" required>
                                </div>

                                <div class="col-3">
                                    <button type="submit" class="submit-button">Notify Me</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-6">
                        <img src="{{ asset('storage/frontend/coming-soon.png') }}" class="image" alt="Coming Soon App">
                    </div>
                </div>
            </div>
        </div>

        <div class="section-5 container">
            <div class="row">
                <div class="col-8">
                    <p class="section-title">Insights & Articles</p>
                    <p class="section-description">Stay informed with the latest industry trends, expert insights, and actionable articles.</p>
                </div>

                <div class="col-4 text-end">
                    <a href="#" class="view-more-button">View More Articles</a>
                </div>
            </div>

            <div class="row bottom-row">
                <div class="col-8">
                    <img src="{{ asset('storage/frontend/article-main.png') }}" class="left-image" alt="Image">

                    <div class="content">
                        <p class="date">April 4th 2025</p>
                        <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <a href="#" class="read-more-button">Read more</a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="single-article">
                        <img src="{{ asset('storage/frontend/article-side.png') }}" class="right-image" alt="Image">
                        <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>
                        <a href="#" class="read-more-button">Read more</a>
                    </div>

                    <div class="single-article">
                        <img src="{{ asset('storage/frontend/article-side.png') }}" class="right-image" alt="Image">
                        <p class="title">Sed do eiusmod tempor incididun ut labore et dolore</p>
                        <a href="#" class="read-more-button">Read more</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-6">
            <div class="container">
                <div class="row advertise">
                    <div class="col-9">
                        <p class="text">Ready to advertise your warehouse?</p>
                        <p class="text">We’ve got you covered.</p>
                    </div>

                    <div class="col-3">
                        <a href="#" class="advertise-button">Advertise Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection