@if(auth()->user()->role == 'admin')
    <div class="sidebar">
        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('admin.dashboard') }}" class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-ui-checks-grid"></i>
                        Dashboard
                    </div>
                </a>
            </li>
        </ul>

        <hr>

        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('admin.users.index') }}" class="{{ Request::segment(2) == 'users' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-people"></i>
                        Users
                    </div>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.warehouses.index') }}" class="{{ Request::segment(2) == 'warehouses' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-houses"></i>
                        Warehouses
                    </div>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.bookings.index') }}" class="{{ Request::segment(2) == 'bookings' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-ui-checks"></i>
                        Bookings
                    </div>
                </a>
            </li>

            <!-- <li class="link">
                <a href="#">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-paperclip"></i>
                        Documents
                    </div>
                </a>
            </li> -->

            <li class="link">
                <a href="{{ route('admin.messages.index', 'all') }}" class="{{ Request::segment(2) == 'messages' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-chat-dots"></i>
                        Inbox
                    </div>
                </a>
            </li>
        </ul>

        <hr>

        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('admin.todos.index') }}" class="{{ Request::segment(2) == 'todos' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-list-check"></i>
                        To-Do
                    </div>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.pages.index') }}" class="{{ Request::segment(2) == 'pages' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-file-break"></i>
                        Pages
                    </div>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('admin.storage-types.index') }}" class="{{ Request::segment(2) == 'storage-types' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-house-gear"></i>
                        Storage Types
                    </div>
                </a>
            </li>
        </ul>

        <hr>

        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('admin.settings.index') }}" class="{{ Request::segment(2) == 'settings' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-gear"></i>
                        Settings
                    </div>
                </a>
            </li>

            <li class="link">
                <a href="#">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-power"></i>
                        <form action="{{ route('backend-auth.portal.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="log-out">Log Out</button>
                        </form>
                    </div>
                </a>
            </li>
        </ul>
    </div>
@elseif(auth()->user()->role == 'landlord')
    <div class="sidebar">
        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('landlord.dashboard') }}" class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-ui-checks-grid"></i>
                        Dashboard
                    </div>
                </a>
            </li>
        </ul>

        <hr>

        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('landlord.warehouses.index') }}" class="{{ Request::segment(2) == 'warehouses' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-houses"></i>
                        Warehouses
                    </div>
                </a>
            </li>

            <li class="link">
                <a href="{{ route('landlord.bookings.index') }}" class="{{ Request::segment(2) == 'bookings' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-ui-checks"></i>
                        Bookings
                    </div>
                </a>
            </li>

            <!-- <li class="link">
                <a href="#">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-paperclip"></i>
                        Documents
                    </div>
                </a>
            </li> -->

            <li class="link">
                <a href="{{ route('landlord.messages.index', 'all') }}" class="{{ Request::segment(2) == 'messages' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-chat-dots"></i>
                        Inbox
                    </div>
                </a>
            </li>
        </ul>

        <hr>

        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('landlord.todos.index') }}" class="{{ Request::segment(2) == 'todos' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-list-check"></i>
                        To-Do
                    </div>
                </a>
            </li>
        </ul>

        <hr>

        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('landlord.settings.index') }}" class="{{ Request::segment(2) == 'settings' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-gear"></i>
                        Settings
                    </div>
                </a>
            </li>

            <li class="link">
                <a href="#">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-power"></i>
                        <form action="{{ route('backend-auth.portal.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="log-out">Log Out</button>
                        </form>
                    </div>
                </a>
            </li>
        </ul>
    </div>
@else
    <div class="sidebar">
        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('tenant.dashboard') }}" class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-ui-checks-grid"></i>
                        Dashboard
                    </div>
                </a>
            </li>
        </ul>

        <hr>

        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('tenant.bookings.index') }}" class="{{ Request::segment(2) == 'bookings' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-ui-checks"></i>
                        Bookings
                    </div>
                </a>
            </li>

            <!-- <li class="link">
                <a href="#">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-paperclip"></i>
                        Documents
                    </div>
                </a>
            </li> -->

            <li class="link">
                <a href="{{ route('tenant.messages.index', 'all') }}" class="{{ Request::segment(2) == 'messages' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-chat-dots"></i>
                        Inbox
                    </div>
                </a>
            </li>
        </ul>

        <hr>

        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('tenant.todos.index') }}" class="{{ Request::segment(2) == 'todos' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-list-check"></i>
                        To-Do
                    </div>
                </a>
            </li>
        </ul>

        <hr>

        <ul class="main-menu">
            <li class="link">
                <a href="{{ route('tenant.settings.index') }}" class="{{ Request::segment(2) == 'settings' ? 'active' : '' }}">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-gear"></i>
                        Settings
                    </div>
                </a>
            </li>

            <li class="link">
                <a href="#">
                    <div class="box"></div>
                    <div class="actual-link">
                        <i class="bi bi-power"></i>
                        <form action="{{ route('frontend-auth.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="log-out">Log Out</button>
                        </form>
                    </div>
                </a>
            </li>
        </ul>
    </div>
@endif