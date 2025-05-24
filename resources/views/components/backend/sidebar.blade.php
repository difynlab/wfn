<div class="sidebar">
    <ul class="main-menu">
        <li class="main-menu-link">
            <a href="{{ route('backend.dashboard.index') }}">
                <img src="{{ asset('storage/backend/sidebar/dashboard.png') }}" alt="Icon">
                <span>Dashboard</span>
            </a>
        </li>

        @if(auth()->user()->admin_language == null)
            <li class="main-menu-link">
                <a href="#">
                    <img src="{{ asset('storage/backend/sidebar/page.png') }}" alt="Icon">
                    <span class="align-middle">Pages</span>
                </a>
            
                <ul class="sub-menu">
                    <li class="sub-menu-link">
                        <a href="{{ route('backend.pages.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/page.png') }}" alt="Icon">
                            <span>Pages</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="#">
                            <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                            <span>Articles</span>
                        </a>

                        <ul class="sub-sub-menu">
                            <li class="sub-sub-menu-link">
                                <a href="{{ route('backend.article-categories.index') }}">
                                    <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                                    <span>Article Categories</span>
                                </a>
                            </li>

                            <li class="sub-sub-menu-link">
                                <a href="{{ route('backend.articles.index') }}">
                                    <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                                    <span>Articles</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.conferences.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/conference.png') }}" alt="Icon">
                            <span>Conferences</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.faqs.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/faq.png') }}" alt="Icon">
                            <span>FAQs</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.podcasts.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/podcast.png') }}" alt="Icon">
                            <span>Podcasts</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="#">
                            <img src="{{ asset('storage/backend/sidebar/policy.png') }}" alt="Icon">
                            <span>Policies</span>
                        </a>

                        <ul class="sub-sub-menu">
                            <li class="sub-sub-menu-link">
                                <a href="{{ route('backend.policy-categories.index') }}">
                                    <img src="{{ asset('storage/backend/sidebar/policy.png') }}" alt="Icon">
                                    <span>Policy Categories</span>
                                </a>
                            </li>

                            <li class="sub-sub-menu-link">
                                <a href="{{ route('backend.policies.index') }}">
                                    <img src="{{ asset('storage/backend/sidebar/policy.png') }}" alt="Icon">
                                    <span>Policies</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.testimonials.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/testimonial.png') }}" alt="Icon">
                            <span>Testimonials</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.webinars.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/webinar.png') }}" alt="Icon">
                            <span>Webinars</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="main-menu-link">
                <a href="#">
                    <img src="{{ asset('storage/backend/sidebar/course.png') }}" alt="Icon">
                    <span>Courses</span>
                </a>

                <ul class="sub-menu">
                    <li class="sub-menu-link">
                        <a href="{{ route('backend.courses.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/course.png') }}" alt="Icon">
                            <span>Courses</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="#">
                            <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                            <span>Results</span>
                        </a>

                        <ul class="sub-sub-menu">
                            <li class="sub-sub-menu-link">
                                <a href="{{ route('backend.exam-results.module-exams') }}">
                                    <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                                    <span>Module Exams</span>
                                </a>
                            </li>

                            <li class="sub-sub-menu-link">
                                <a href="{{ route('backend.exam-results.final-exams') }}">
                                    <img src="{{ asset('storage/backend/sidebar/article.png') }}" alt="Icon">
                                    <span>Final Exams</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        
            <li class="main-menu-link">
                <a href="#">
                    <img src="{{ asset('storage/backend/sidebar/product.png') }}" alt="Icon">
                    <span>Products</span>
                </a>
            
                <ul class="sub-menu">
                    <li class="sub-menu-link">
                        <a href="{{ route('backend.product-categories.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/product.png') }}" alt="Icon">
                            <span>Product Categories</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.products.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/product.png') }}" alt="Icon">
                            <span>Products</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="main-menu-link">
                <a href="{{ route('backend.medias.index') }}">
                    <img src="{{ asset('storage/backend/sidebar/media.png') }}" alt="Icon">
                    <span>Media</span>
                </a>
            </li>
        @endif

        <li class="main-menu-link">
            <a href="#">
                <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                <span>Purchases</span>
            </a>
        
            <ul class="sub-menu">
                @if(auth()->user()->admin_language == null)
                    <li class="sub-menu-link">
                        <a href="{{ route('backend.purchases.gift-card-purchases.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                            <span>Gift Card Purchases</span>
                        </a>
                    </li>
                @endif

                <li class="sub-menu-link">
                    <a href="{{ route('backend.purchases.course-purchases.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                        <span>Course Purchases</span>
                    </a>
                </li>

                @if(auth()->user()->admin_language == null)
                    <li class="sub-menu-link">
                        <a href="{{ route('backend.purchases.product-purchases.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                            <span>Product Purchases</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.purchases.material-purchases.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                            <span>Material Purchases</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.purchases.membership-purchases.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/order.png') }}" alt="Icon">
                            <span>Membership Purchases</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

        <li class="main-menu-link">
            <a href="#">
                <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                <span>Persons</span>
            </a>
        
            <ul class="sub-menu">
                @if(auth()->user()->admin_language == null)
                    <li class="sub-menu-link">
                        <a href="{{ route('backend.persons.admins.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                            <span>Admins</span>
                        </a>
                    </li>
                @endif

                <li class="sub-menu-link">
                    <a href="{{ route('backend.persons.users.index') }}">
                        <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                        <span>Users</span>
                        @php
                            $new_users = App\Models\User::where('role', 'student')->where('status', '!=', '0')->where('is_new', '1')->count();
                        @endphp

                        @if($new_users > 0)
                            <p class="new-count-badge">{{ $new_users }}</p>
                        @endif
                    </a>
                </li>

                @if(auth()->user()->admin_language == null)
                    <li class="sub-menu-link">
                        <a href="{{ route('backend.persons.advisory-boards.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                            <span>Advisory Boards</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.persons.our-founders.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                            <span>Our Founders</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.persons.issn-partners.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                            <span>ISSN Partners</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.persons.global-education-partners.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/user.png') }}" alt="Icon">
                            <span>Global Education Partners</span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

        @if(auth()->user()->admin_language == null)
            <li class="main-menu-link">
                <a href="#">
                    <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                    <span>Communications</span>
                </a>
            
                <ul class="sub-menu">
                    <li class="sub-menu-link">
                        <a href="{{ route('backend.communications.contact-coaches.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                            <span>Contact Coaches</span>
                            @php
                                $new_count = App\Models\ContactCoach::where('status', '1')->where('is_new', '1')->count();
                            @endphp

                            @if($new_count > 0)
                                <p class="new-count-badge">{{ $new_count }}</p>
                            @endif
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.communications.ask-questions.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                            <span>Ask Questions</span>

                            @php

                                $new_initial_question_ids = App\Models\AskQuestion::where('status', '1')
                                    ->where('admin_viewed', '0')
                                    ->pluck('id')
                                    ->toArray();

                                $new_initial_questions = count($new_initial_question_ids);

                                $new_replied_questions = App\Models\AskQuestionReply::where('status', '1')
                                    ->where('admin_viewed', '0')
                                    ->whereNotIn('ask_question_id', $new_initial_question_ids)
                                    ->groupBy('ask_question_id')
                                    ->selectRaw('count(*) as count')
                                    ->get()
                                    ->count();

                                $total_count = $new_initial_questions + $new_replied_questions;

                            @endphp

                            @if($total_count > 0)
                                <p class="new-count-badge">{{ $total_count }}</p>
                            @endif
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.communications.connections.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                            <span>Inquiries from Users</span>
                            @php
                                $new_count = App\Models\Connection::where('status', '1')->where('is_new', '1')->count();
                            @endphp

                            @if($new_count > 0)
                                <p class="new-count-badge">{{ $new_count }}</p>
                            @endif
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.communications.refer-friends.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                            <span>Refer Friends</span>
                            @php
                                $new_count = App\Models\ReferFriend::where('status', '1')->where('is_new', '1')->count();
                            @endphp

                            @if($new_count > 0)
                                <p class="new-count-badge">{{ $new_count }}</p>
                            @endif
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.communications.technical-supports.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                            <span>Technical Supports</span>
                            @php
                                $new_count = App\Models\TechnicalSupport::where('status', '1')->where('is_new', '1')->count();
                            @endphp

                            @if($new_count > 0)
                                <p class="new-count-badge">{{ $new_count }}</p>
                            @endif
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.communications.subscriptions.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/communication.png') }}" alt="Icon">
                            <span>Subscriptions</span>
                            @php
                                $new_count = App\Models\Subscription::where('status', '1')->where('is_new', '1')->count();
                            @endphp

                            @if($new_count > 0)
                                <p class="new-count-badge">{{ $new_count }}</p>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>

            <li class="main-menu-link">
                <a href="#">
                    <img src="{{ asset('storage/backend/sidebar/settings.png') }}" alt="Icon">
                    <span>Administrations</span>
                </a>
            
                <ul class="sub-menu">
                    <li class="sub-menu-link">
                        <a href="{{ route('backend.settings.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/settings.png') }}" alt="Icon">
                            <span>Settings</span>
                        </a>
                    </li>

                    <li class="sub-menu-link">
                        <a href="{{ route('backend.my-profile.index') }}">
                            <img src="{{ asset('storage/backend/sidebar/settings.png') }}" alt="Icon">
                            <span>My Profile</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</div>