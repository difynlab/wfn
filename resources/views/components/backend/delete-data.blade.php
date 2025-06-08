@props(['title'])

<div class="modal fade delete-modal" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete {{ $title }}</h5>
            </div>
            <div class="modal-body">
                <p class="modal-message">Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn close-button" data-bs-dismiss="modal" title="Cancel">Cancel</button>
                <form action="" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn delete-button" title="Delete">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>