<div class="modal fade notification-modal" id="success-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <i class="bi bi-check-circle-fill tick-icon"></i>
                <p class="title">{{ session('success') }}</p>
                <p class="description">All changes have been successfully updated and saved.</p>
                <p class="description">Your information is now fully updated.</p>

                <div class="buttons">
                    <button type="button" class="btn cancel-button" data-bs-dismiss="modal" title="Cancel">Close</button>

                    <a href="{{ session('route') }}" class="btn close-button"><i class="bi bi-arrow-left arrow-icon"></i>Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade notification-modal" id="error-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <i class="bi bi-x-circle-fill close-icon"></i>
                <p class="title">{{ session('error') }}</p>
                <p class="description">We couldn't apply the changes. Your information has not been updated.</p>

                <div class="buttons">
                    <button type="button" class="btn cancel-button" data-bs-dismiss="modal" title="Cancel">Cancel</button>

                    <a href="{{ session('route') }}" class="btn close-button"><i class="bi bi-arrow-left arrow-icon"></i>Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade notification-modal" id="delete-notification-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <i class="bi bi-check-circle-fill tick-icon"></i>
                <p class="title">{{ session('delete') }}</p>
                <p class="description">The deletion was successful. The record has been removed from the system.</p>

                <div class="buttons">
                    <button type="button" class="btn close-button" data-bs-dismiss="modal" title="Close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade notification-modal" id="forgot-password-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <i class="bi bi-check-circle-fill tick-icon"></i>
                <p class="title">{{ session('forgot-password') }}</p>
                <p class="description">Please check your inbox and follow the steps to reset your password.</p>

                <div class="buttons">
                    <button type="button" class="btn close-button" data-bs-dismiss="modal" title="Close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade notification-modal" id="unauthorized-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <i class="bi bi-x-circle-fill close-icon"></i>
                <p class="title">{{ session('unauthorized') }}</p>
                <p class="description">You cannot access the admin portal.</p>

                <div class="buttons">
                    <button type="button" class="btn close-button" data-bs-dismiss="modal" title="Close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade notification-modal" id="company-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <i class="bi bi-x-circle-fill close-icon"></i>
                <p class="title">{{ session('company') }}</p>
                <p class="description">Please update your company details before checking our warehouses.</p>

                <div class="buttons">
                    <button type="button" class="btn close-button" data-bs-dismiss="modal" title="Close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('after-scripts')
    @if(session('success'))
        <script>
            $(document).ready(function() {
                $('#success-modal').modal('show');
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            $(document).ready(function() {
                $('#error-modal').modal('show');
            });
        </script>
    @endif

    @if(session('delete'))
        <script>
            $(document).ready(function() {
                $('#delete-notification-modal').modal('show');
            });
        </script>
    @endif

    @if(session('forgot-password'))
        <script>
            $(document).ready(function() {
                $('#forgot-password-modal').modal('show');
            });
        </script>
    @endif

    @if(session('unauthorized'))
        <script>
            $(document).ready(function() {
                $('#unauthorized-modal').modal('show');
            });
        </script>
    @endif

    @if(session('company'))
        <script>
            $(document).ready(function() {
                $('#company-modal').modal('show');
            });
        </script>
    @endif
@endpush