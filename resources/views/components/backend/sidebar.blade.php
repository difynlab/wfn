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
            <a href="#">
                <div class="box"></div>
                <div class="actual-link">
                    <i class="bi bi-houses"></i>
                    Warehouses
                </div>
            </a>
        </li>

        <li class="link">
            <a href="#">
                <div class="box"></div>
                <div class="actual-link">
                    <i class="bi bi-ui-checks"></i>
                    Bookings
                </div>
            </a>
        </li>

        <li class="link">
            <a href="#">
                <div class="box"></div>
                <div class="actual-link">
                    <i class="bi bi-paperclip"></i>
                    Documents
                </div>
            </a>
        </li>

        <li class="link">
            <a href="#">
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
            <a href="#">
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
            <a href="#">
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