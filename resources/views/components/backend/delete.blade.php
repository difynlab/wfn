@props(['data'])

<div class="modal fade notification-modal" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <i class="bi bi-exclamation-triangle-fill triangle-icon"></i>
                <p class="title">Are you sure?</p>
                <p class="description">Deleting this {{ $data }} will erase all their data from the system permanently. This action cannot be reserved.</p>

                <div class="buttons">
                    <button type="button" class="btn cancel-button" data-bs-dismiss="modal" title="Cancel">Cancel</button>
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn modal-delete-button" title="Delete"><i class="bi bi-trash delete-icon"></i>Confirm Deletion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>