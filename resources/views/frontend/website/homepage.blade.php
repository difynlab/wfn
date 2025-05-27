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


                <!-- Search Bar -->
                <div class="search-bar" id="searchBar">
                    <div class="search-inputs">
                        <div class="search-item">
                            <p class="label">Location</p>
                            <input type="text" placeholder="Search warehouses">
                        </div>
                        <div class="divider"></div>

                        <div class="search-item">
                            <p class="label">Start Date</p>
                            <input type="text" placeholder="Add dates">
                        </div>
                        <div class="divider"></div>

                        <div class="search-item">
                            <p class="label">End Date</p>
                            <input type="text" placeholder="Add dates">
                        </div>
                        <div class="divider"></div>

                        <div class="search-item">
                            <p class="label">Storage Type</p>
                            <div id="storageType" class="custom-select">Choose</div>
                        </div>

                        <button class="search-btn"><i class="fas fa-search"></i> Search</button>
                    </div>
                    <!-- Filter Panel (initially hidden) -->
                    <div class="filter-panel">
                        <div class="filter-section">
                            <p class="filter-title">Warehouse Size</p>
                            <div class="radio-group">
                                <label><input type="radio" name="size"> Up to 50 Pallets</label>
                                <label><input type="radio" name="size"> Up to 100 Pallets</label>
                                <label><input type="radio" name="size"> Up to 200 Pallets</label>
                                <label><input type="radio" name="size"> 200+ Pallets</label>
                            </div>
                        </div>
                        <hr>
                        <div class="filter-section">
                            <p class="filter-title">Warehouse Storage Type</p>
                            <div class="checkbox-group">
                                <label><input type="checkbox"> Dry Storage</label>
                                <label><input type="checkbox"> Chilled Storage (2°C - 8°C)</label>
                                <label><input type="checkbox"> Frozen Storage (-18°C or below)</label>
                                <label><input type="checkbox"> Humidity Controlled</label>
                                <label><input type="checkbox"> Hazardous Materials Storage</label>
                                <label><input type="checkbox"> Climate-Controlled Storage</label>
                            </div>
                        </div>
                        <p class="clear-filters">Clear All Filters</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Warehouse section -->
        <div class="section-2 container">
            <p class="section-title">Explore New Warehouses In Saudi Arabia</p>
            <p class="section-description">Keep up with the newest warehouse updates.</p>

            <!-- City Tabs -->
            <ul class="city-tabs">
                <li class="tab active" data-city="riyadh">Riyadh</li>
                <li class="tab" data-city="jeddah">Jeddah</li>
                <li class="tab" data-city="mecca">Mecca</li>
                <li class="tab" data-city="medina">Medina</li>
            </ul>

            <!-- City Content Wrapper -->
            <div class="warehouse-grid-wrapper">
                <!-- Riyadh Warehouses -->
                <div class="warehouse-grid city-content active" data-city="riyadh">
                    @foreach (['Al Claya', 'Al Hamra', 'Al Morouj'] as $index => $area)
                        <div class="warehouse-card">
                            <img src="{{ asset('storage/frontend/riyadh-' . ($index + 1) . '.png') }}" class="card-image" alt="Warehouse">
                            <div class="card-body">
                                <p class="type">Warehouse Type</p>
                                <p class="title">Lorem ipsum dolor</p>
                                <p class="description">Sample text describing the warehouse in {{ ucfirst($area) }} area of Riyadh.</p>
                                <p class="location"><i class="fas fa-map-marker-alt"></i> {{ ucfirst($area) }}, Riyadh</p>
                                <div class="meta">
                                    <span>Listed 1 day ago</span>
                                    <span><i class="fas fa-share-alt"></i> Share</span>
                                    <span><i class="fas fa-flag"></i> Report</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Jeddah Warehouses -->
                <div class="warehouse-grid city-content" data-city="jeddah">
                    @foreach (['Al Shati', 'Al Balad', 'Al Rawdah'] as $index => $area)
                        <div class="warehouse-card">
                            <img src="{{ asset('storage/frontend/jeddah-' . ($index + 1) . '.png') }}" class="card-image" alt="Warehouse">
                            <div class="card-body">
                                <p class="type">Warehouse Type</p>
                                <p class="title">Lorem ipsum dolor</p>
                                <p class="description">Warehouse located in {{ ucfirst($area) }} Jeddah. Great for storage needs.</p>
                                <p class="location"><i class="fas fa-map-marker-alt"></i> {{ ucfirst($area) }}, Jeddah</p>
                                <div class="meta">
                                    <span>Listed 2 days ago</span>
                                    <span><i class="fas fa-share-alt"></i> Share</span>
                                    <span><i class="fas fa-flag"></i> Report</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Mecca Warehouses -->
                <div class="warehouse-grid city-content" data-city="mecca">
                    @foreach (['Al Naseem', 'Al Azizah', 'Al Taneem'] as $index => $area)
                        <div class="warehouse-card">
                            <img src="{{ asset('storage/frontend/mecca-' . ($index + 1) . '.png') }}" class="card-image" alt="Warehouse">
                            <div class="card-body">
                                <p class="type">Warehouse Type</p>
                                <p class="title">Lorem ipsum dolor</p>
                                <p class="description">Storage near {{ ucfirst($area) }} in Mecca with flexible access options.</p>
                                <p class="location"><i class="fas fa-map-marker-alt"></i> {{ ucfirst($area) }}, Mecca</p>
                                <div class="meta">
                                    <span>Listed 3 days ago</span>
                                    <span><i class="fas fa-share-alt"></i> Share</span>
                                    <span><i class="fas fa-flag"></i> Report</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Medina Warehouses -->
                <div class="warehouse-grid city-content" data-city="medina">
                    @foreach (['Al Nozha', 'Al Qibla', 'Al Gharra'] as $index => $area)
                        <div class="warehouse-card">
                            <img src="{{ asset('storage/frontend/medina-' . ($index + 1) . '.png') }}" class="card-image" alt="Warehouse">
                            <div class="card-body">
                                <p class="type">Warehouse Type</p>
                                <p class="title">Lorem ipsum dolor</p>
                                <p class="description">Located in {{ ucfirst($area) }}, Medina. Ideal for business inventory.</p>
                                <p class="location"><i class="fas fa-map-marker-alt"></i> {{ ucfirst($area) }}, Medina</p>
                                <div class="meta">
                                    <span>Listed 4 days ago</span>
                                    <span><i class="fas fa-share-alt"></i> Share</span>
                                    <span><i class="fas fa-flag"></i> Report</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Optimize search section -->
        <div class="section-3 container">
            <p class="section-title">Optimize Your Warehouse Search</p>
            <p class="section-description">Discover the best warehouse spaces in the UAE with the most trusted information for your business needs.</p>

            <div class="features-grid">
                <!-- Card 1 -->
                <div class="feature-card">
                    <img src="{{ asset('storage/frontend/feature-1.png') }}" alt="Prime Location">
                    <div class="text">
                        <h4>Prime Location and Accessibility</h4>
                        <p>Warehouses with easy access to major transport routes for efficient logistics.</p>
                        <span class="cta">Checkout</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="feature-card">
                    <img src="{{ asset('storage/frontend/feature-2.png') }}" alt="Appropriate Size">
                    <div class="text">
                        <h4>Appropriate Size and Layout</h4>
                        <p>Warehouses with the right space and layout to fit your business needs.</p>
                        <span class="cta">Checkout</span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="feature-card">
                    <img src="{{ asset('storage/frontend/feature-3.png') }}" alt="Security Standards">
                    <div class="text">
                        <h4>Security and Safety Standards</h4>
                        <p>Warehouses with easy access to major transport routes for efficient logistics.</p>
                        <span class="cta">Checkout</span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="feature-card">
                    <img src="{{ asset('storage/frontend/feature-4.png') }}" alt="Cost Effectiveness">
                    <div class="text">
                        <h4>Cost-Effectiveness and Value</h4>
                        <p>Warehouses with competitive rates and strong long-term investment potential.</p>
                        <span class="cta">Checkout</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comming soon section -->
        <div class="section-4">
            <div class="coming-soon container">
                <div class="content">
                    <h2>Coming Soon: App Version of <br>Warehouse Finder Network</h2>
                    <p>Bringing you an even faster and more convenient way to discover and rent warehouses across Saudi Arabia. With user-friendly features and real-time listings, you’ll be able to find the perfect warehouse anytime, anywhere, right from your mobile device. Stay tuned for a seamless rental experience at your fingertips!</p>

                    <form class="notify-form">
                        <input type="email" placeholder="Enter email address" required>
                        <button type="submit">Notify Me</button>
                    </form>
                </div>

                <div class="phone-image">
                    <img src="{{ asset('storage/frontend/coming-soon.png') }}" alt="Coming Soon App">
                </div>
            </div>
        </div>

        <!-- Articles section -->
        <div class="section-5 container">
            <div class="articles-header">
                <div>
                    <p class="section-title">Insights & Articles</p>
                    <p class="section-description">Stay informed with the latest industry trends, expert insights, and actionable articles.</p>
                </div>
                <a href="#" class="view-more-btn">View More Articles</a>
            </div>

            <div class="articles-grid">
                <!-- Left: Main article -->
                <div class="left-column">
                    <img src="{{ asset('storage/frontend/article-main.png') }}" alt="Main Article">
                    <div class="content">
                        <p class="date">April 4th 2025</p>
                        <h4 class="title">Sed do eiusmod tempor incididun ut labore et dolore</h4>
                        <p class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                        <a href="#" class="read-more">Read more</a>
                    </div>
                </div>

                <!-- Right: Side articles + button -->
                <div class="right-column">
                    @for ($i = 1; $i <= 2; $i++)
                        <div class="side-article">
                            <img src="{{ asset('storage/frontend/article-side.png') }}" alt="Article Image">
                            <h5>Sed do eiusmod tempor incididun ut labore et dolore</h5>
                            <a href="#" class="read-more">Read more</a>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- CTA Banner section -->
        <div class="section-6">
            <div class="cta-banner container">
                <div class="text">
                    <h3>Ready to advertise your warehouse?</h3>
                    <p>We’ve got you covered.</p>
                </div>
                <a href="#" class="cta-button">Advertise Now</a>
            </div>
        </div>

        

    </div>
@endsection

<script>
    // search bar dropdown functionality
    document.addEventListener('DOMContentLoaded', function () {
        const storageSelect = document.getElementById('storageType');
        const searchBar = document.getElementById('searchBar');
        const section1 = document.querySelector('.homepage .section-1');

        storageSelect.addEventListener('click', function (e) {
            // Prevent default dropdown toggle
            e.preventDefault();

            searchBar.classList.toggle('expanded');
            section1.classList.toggle('expanded');
        });
    });


    //city tab functionality
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.section-2 .tab');
        const contents = document.querySelectorAll('.section-2 .city-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const selectedCity = tab.getAttribute('data-city');

                // Switch active tab
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                // Show only the selected city content
                contents.forEach(content => {
                    if (content.getAttribute('data-city') === selectedCity) {
                        content.classList.add('active');
                    } else {
                        content.classList.remove('active');
                    }
                });
            });
        });
    });
</script>

