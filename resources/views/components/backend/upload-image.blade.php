@props(['old_name', 'old_value', 'new_name', 'path', 'label'])

@if(isset($label))
    <label for="image" class="form-label label">Upload {{ $label }} Image</label>
@else
    <label for="image" class="form-label label">Upload Image</label>
@endif

<div class="drop-area image-drop-area">
    <i class="bi bi-cloud-arrow-up"></i>
    <p class="drag-drop">Drag and drop files here</p>

    <div class="row line-or">
        <div class="col">
            <hr>
        </div>
        <div class="col-2 text-center">
            <p>or</p>
        </div>
        <div class="col">
            <hr>
        </div>
    </div>

    <label for="{{ $new_name }}" class="button">Browse File</label>
    <p class="condition">Maximum file size is 30 MB</p>
    <input type="file" id="{{ $new_name }}" class="image-file-element" name="{{ $new_name }}" accept="image/*" style="display:none">
    <input type="hidden" name="{{ $old_name }}" value="{{ $old_value }}">

    <div class="image-preview">
        @if($old_value)
            <img src="{{ asset('storage/backend/' . $path . '/' . $old_value) }}">

            <a href="{{ asset('storage/backend/' . $path . '/' . $old_value) }}" class="download-icon" title="download" download>
                <i class="bi bi-arrow-bar-down"></i>
            </a>

            <button type="button" class="close-icon image-close-icon" title="Remove">
                <i class="bi bi-x small"></i>
            </button>
        @endif
    </div>
</div>

@push('after-scripts')
    <script>
        $('.image-close-icon').on('click', function() {
            $(this).parent('.image-preview').prev().val('');
            $(this).parent('.image-preview').remove();
        })

        $('.image-preview img').on('click', function() {
            let src = $(this).attr('src');

            $(".modal-image-preview").find('img').attr('src', src);
            $(".modal-image-preview").find('a').attr('href', src);
            $(".modal-image-preview").modal('show');
        });
    </script>
@endpush