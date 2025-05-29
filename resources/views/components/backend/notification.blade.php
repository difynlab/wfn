@if(session('success'))
    <div class="notification-box">
        <p class="success">{{ session('success') }}</p>
    </div>
@endif

@if(session('error'))
    <div class="notification-box">
        <p class="error">{{ session('error') }}</p>
    </div>
@endif