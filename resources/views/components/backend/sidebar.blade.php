<div class="sidebar">
    <ul class="main-menu">
        <li class="link">
            <a href="{{ route('backend.dashboard') }}" class="{{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
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
            <a href="{{ route('backend.users.index') }}" class="{{ Request::segment(2) == 'users' ? 'active' : '' }}">
                <div class="box"></div>
                <div class="actual-link">
                    <i class="bi bi-people"></i>
                    Users
                </div>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('backend.warehouses.index') }}" class="{{ Request::segment(2) == 'warehouses' ? 'active' : '' }}">
                <div class="box"></div>
                <div class="actual-link">
                    <i class="bi bi-houses"></i>
                    Warehouses
                </div>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('backend.bookings.index') }}" class="{{ Request::segment(2) == 'bookings' ? 'active' : '' }}">
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
            <a href="{{ route('backend.messages.index', 'all') }}" class="{{ Request::segment(2) == 'messages' ? 'active' : '' }}">
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
            <a href="{{ route('backend.todos.index') }}" class="{{ Request::segment(2) == 'todos' ? 'active' : '' }}">
                <div class="box"></div>
                <div class="actual-link">
                    <i class="bi bi-list-check"></i>
                    To-Do
                </div>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('backend.pages.index') }}" class="{{ Request::segment(2) == 'pages' ? 'active' : '' }}">
                <div class="box"></div>
                <div class="actual-link">
                    <i class="bi bi-file-break"></i>
                    Pages
                </div>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('backend.storage-types.index') }}" class="{{ Request::segment(2) == 'storage-types' ? 'active' : '' }}">
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
            <a href="{{ route('backend.article-categories.index') }}" class="{{ Request::segment(2) == 'article-categories' ? 'active' : '' }}">
                <div class="box"></div>
                <div class="actual-link">
                    <i class="bi bi-bookmarks"></i>
                    Article Categories
                </div>
            </a>
        </li>

        <li class="link">
            <a href="{{ route('backend.articles.index') }}" class="{{ Request::segment(2) == 'articles' ? 'active' : '' }}">
                <div class="box"></div>
                <div class="actual-link">
                    <i class="bi bi-newspaper"></i>
                    Articles
                </div>
            </a>
        </li>
    </ul>

    <hr>

    <ul class="main-menu">
        <li class="link">
            <a href="{{ route('backend.settings.index') }}" class="{{ Request::segment(2) == 'settings' ? 'active' : '' }}">
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
                    <form action="{{ route('backend.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="log-out">Log Out</button>
                    </form>
                </div>
            </a>
        </li>
    </ul>
</div>