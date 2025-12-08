@if(auth()->user()->role == 'admin')
    <div class="sidebar active">
        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('admin.dashboard') }}" class="single-link">
                    <i class="bi bi-ui-checks-grid"></i>
                    <p class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">Dashboard</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.users.index') }}" class="single-link">
                    <i class="bi bi-people"></i>
                    <p class="{{ Request::segment(2) == 'users' ? 'active' : '' }}">
                        Users
                        <span class="new-count">
                            {{ App\Models\User::where('is_new', 1)->count() != 0 ? App\Models\User::where('is_new', 1)->count() : ''; }}
                        </span>
                    </p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.warehouses.index') }}" class="single-link">
                    <i class="bi bi-houses"></i>
                    <p class="{{ Request::segment(2) == 'warehouses' ? 'active' : '' }}">
                        Warehouses
                        <span class="new-count">
                            {{ App\Models\Warehouse::where('is_new', 1)->count() != 0 ? App\Models\Warehouse::where('is_new', 1)->count() : ''; }}
                        </span>
                    </p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.bookings.index') }}" class="single-link">
                    <i class="bi bi-ui-checks"></i>
                    <p class="{{ Request::segment(2) == 'bookings' ? 'active' : '' }}">
                        Bookings
                        <span class="new-count">
                            {{ App\Models\Booking::where('is_admin_new', 1)->count() != 0 ? App\Models\Booking::where('is_admin_new', 1)->count() : ''; }}
                        </span>
                    </p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.messages.index', 'all') }}" class="single-link">
                    <i class="bi bi-chat-dots"></i>
                
                    @php
                        $messages = App\Models\Message::where('admin_view', 0)->get();
                        $message_replies = App\Models\MessageReply::where('admin_view', 0)->get();

                        $message_ids = $messages->pluck('id')->toArray();

                        $filtered_replies = $message_replies->reject(function ($reply) use ($message_ids) {
                            return in_array($reply->message_id, $message_ids);
                        });

                        $unique_reply_message_ids = $filtered_replies->pluck('message_id')->unique()->count();

                        $total_new_messages = $messages->count() + $unique_reply_message_ids;
                    @endphp

                    <p class="{{ Request::segment(2) == 'messages' ? 'active' : '' }}">
                        Inbox
                        <span class="new-count">
                            {{ $total_new_messages != 0 ? $total_new_messages : ''; }}
                        </span>
                    </p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.supports.index') }}" class="single-link">
                    <i class="bi bi-question-square"></i>
                    <p class="{{ Request::segment(2) == 'supports' ? 'active' : '' }}">
                        Supports
                        <span class="new-count">
                            {{ App\Models\Support::where('is_new', 1)->count() != 0 ? App\Models\Support::where('is_new', 1)->count() : ''; }}
                        </span>
                    </p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.subscriptions.index') }}" class="single-link">
                    <i class="bi bi-card-text"></i>
                    <p class="{{ Request::segment(2) == 'subscriptions' ? 'active' : '' }}">
                        Subscriptions
                        <span class="new-count">
                            {{ App\Models\Subscription::where('is_new', 1)->count() != 0 ? App\Models\Subscription::where('is_new', 1)->count() : ''; }}
                        </span>
                    </p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.reports.index') }}" class="single-link">
                    <i class="bi bi-flag"></i>
                    <p class="{{ Request::segment(2) == 'reports' ? 'active' : '' }}">
                        Reports
                        <span class="new-count">
                            {{ App\Models\Report::where('is_new', 1)->count() != 0 ? App\Models\Report::where('is_new', 1)->count() : ''; }}
                        </span>
                    </p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.todos.index') }}" class="single-link">
                    <i class="bi bi-list-check"></i>
                    <p class="{{ Request::segment(2) == 'todos' ? 'active' : '' }}">To-Do</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.pages.index') }}" class="single-link">
                    <i class="bi bi-file-break"></i>
                    <p class="{{ Request::segment(2) == 'pages' ? 'active' : '' }}">Pages</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.storage-types.index') }}" class="single-link">
                    <i class="bi bi-house-gear"></i>
                    <p class="{{ Request::segment(2) == 'storage-types' ? 'active' : '' }}">Storage Types</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.licenses.index') }}" class="single-link">
                    <i class="bi bi-window-fullscreen"></i>
                    <p class="{{ Request::segment(2) == 'licenses' ? 'active' : '' }}">Licenses</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.movement-services.index') }}" class="single-link">
                    <i class="bi bi-arrows-move"></i>
                    <p class="{{ Request::segment(2) == 'movement-services' ? 'active' : '' }}">Movement Services</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.pallet-services.index') }}" class="single-link">
                    <i class="bi bi-view-stacked"></i>
                    <p class="{{ Request::segment(2) == 'pallet-services' ? 'active' : '' }}">Pallet Services</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.article-categories.index') }}" class="single-link">
                    <i class="bi bi-bookmarks"></i>
                    <p class="{{ Request::segment(2) == 'article-categories' ? 'active' : '' }}">Article Categories</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.articles.index') }}" class="single-link">
                    <i class="bi bi-newspaper"></i>
                    <p class="{{ Request::segment(2) == 'articles' ? 'active' : '' }}">Articles</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.reviews.index') }}" class="single-link">
                    <i class="bi bi-calendar2-week"></i>
                    <p class="{{ Request::segment(2) == 'reviews' ? 'active' : '' }}">Reviews</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.settings.index') }}" class="single-link">
                    <i class="bi bi-gear"></i>
                    <p class="{{ Request::segment(2) == 'settings' ? 'active' : '' }}">Settings</p>
                </a>
            </li>

            <li class="link">
                <a href="#" class="single-link">
                    <i class="bi bi-power"></i>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="log-out">Log Out</button>
                    </form>
                </a>
            </li>
        </ul>
    </div>
@elseif(auth()->user()->role == 'landlord')
    <div class="sidebar active">
        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('landlord.dashboard') }}" class="single-link">
                    <i class="bi bi-ui-checks-grid"></i>
                    <p class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">Dashboard</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('landlord.warehouses.index') }}" class="single-link">
                    <i class="bi bi-houses"></i>
                    <p class="{{ Request::segment(2) == 'warehouses' ? 'active' : '' }}">Warehouses</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('landlord.bookings.index') }}" class="single-link">
                    <i class="bi bi-ui-checks"></i>
                    <p class="{{ Request::segment(2) == 'bookings' ? 'active' : '' }}">
                        Bookings
                        <span class="new-count">
                            {{ App\Models\Booking::where('is_landlord_new', 1)->count() != 0 ? App\Models\Booking::where('is_landlord_new', 1)->count() : ''; }}
                        </span>
                    </p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('landlord.messages.index', 'all') }}" class="single-link">
                    <i class="bi bi-chat-dots"></i>

                    @php
                        $messages = App\Models\Message::where('user_id', auth()->user()->id)->get();
                        $message_ids = $messages->pluck('id')->toArray();

                        $unseen_messages = $messages->where('user_view', 0);
                        $unseen_message_ids = $unseen_messages->pluck('id')->toArray();

                        $message_replies = App\Models\MessageReply::whereIn('message_id', $message_ids)->where('user_view', 0)->get();

                        $filtered_replies = $message_replies->reject(function ($reply) use ($unseen_message_ids) {
                            return in_array($reply->message_id, $unseen_message_ids);
                        });

                        $unique_reply_message_ids = $filtered_replies->pluck('message_id')->unique()->count();

                        $total_new_messages = $unseen_messages->count() + $unique_reply_message_ids;
                    @endphp

                    <p class="{{ Request::segment(2) == 'messages' ? 'active' : '' }}">
                        Inbox
                        <span class="new-count">
                            {{ $total_new_messages != 0 ? $total_new_messages : ''; }}
                        </span>
                    </p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('landlord.todos.index') }}" class="single-link">
                    <i class="bi bi-list-check"></i>
                    <p class="{{ Request::segment(2) == 'todos' ? 'active' : '' }}">To-Do</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('landlord.favorites.index') }}" class="single-link">
                    <i class="bi bi-heart"></i>
                    <p class="{{ Request::segment(2) == 'favorites' ? 'active' : '' }}">Favorites</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('landlord.settings.index') }}" class="single-link">
                    <i class="bi bi-gear"></i>
                    <p class="{{ Request::segment(2) == 'settings' ? 'active' : '' }}">Settings</p>
                </a>
            </li>

            <li class="link">
                <a href="#" class="single-link">
                    <i class="bi bi-power"></i>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="log-out">Log Out</button>
                    </form>
                </a>
            </li>
        </ul>
    </div>
@else
    <div class="sidebar active">
        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('tenant.dashboard') }}" class="single-link">
                    <i class="bi bi-ui-checks-grid"></i>
                    <p class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">Dashboard</p>
                </a>
            </li>
        
            <li class="link">
                <a href="{{ route('warehouses.index') }}" class="single-link">
                    <i class="bi bi-houses"></i>
                    <p class="{{ Request::segment(2) == 'warehouses' ? 'active' : '' }}">Warehouses</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('tenant.bookings.index') }}" class="single-link">
                    <i class="bi bi-ui-checks"></i>
                    <p class="{{ Request::segment(2) == 'bookings' ? 'active' : '' }}">My Quotations</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('tenant.messages.index', 'all') }}" class="single-link">
                    <i class="bi bi-chat-dots"></i>
                    
                    @php
                        $messages = App\Models\Message::where('user_id', auth()->user()->id)->get();
                        $message_ids = $messages->pluck('id')->toArray();

                        $unseen_messages = $messages->where('user_view', 0);
                        $unseen_message_ids = $unseen_messages->pluck('id')->toArray();

                        $message_replies = App\Models\MessageReply::whereIn('message_id', $message_ids)->where('user_view', 0)->get();

                        $filtered_replies = $message_replies->reject(function ($reply) use ($unseen_message_ids) {
                            return in_array($reply->message_id, $unseen_message_ids);
                        });

                        $unique_reply_message_ids = $filtered_replies->pluck('message_id')->unique()->count();

                        $total_new_messages = $unseen_messages->count() + $unique_reply_message_ids;
                    @endphp

                    <p class="{{ Request::segment(2) == 'messages' ? 'active' : '' }}">
                        Inbox
                        <span class="new-count">
                            {{ $total_new_messages != 0 ? $total_new_messages : ''; }}
                        </span>
                    </p>
                </a>
            </li>
        
            <li class="link">
                <a href="{{ route('tenant.todos.index') }}" class="single-link">
                    <i class="bi bi-list-check"></i>
                    <p class="{{ Request::segment(2) == 'todos' ? 'active' : '' }}">To-Do</p>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('tenant.favorites.index') }}" class="single-link">
                    <i class="bi bi-heart"></i>
                    <p class="{{ Request::segment(2) == 'favorites' ? 'active' : '' }}">Favorites</p>
                </a>
            </li>
        
            <li class="link">
                <a href="{{ route('tenant.settings.index') }}" class="single-link">
                    <i class="bi bi-gear"></i>
                    <p class="{{ Request::segment(2) == 'settings' ? 'active' : '' }}">Settings</p>
                </a>
            </li>

            <li class="link">
                <a href="#" class="single-link">
                    <i class="bi bi-power"></i>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="log-out">Log Out</button>
                    </form>
                </a>
            </li>
        </ul>
    </div>
@endif