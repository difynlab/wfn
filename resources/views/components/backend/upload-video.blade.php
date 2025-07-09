@props(['old_name', 'old_value', 'new_name', 'path', 'class'])

@if(isset($label))
    <label for="video" class="form-label label">Upload {{ $label }} Video</label>
@else
    <label for="video" class="form-label label">Upload Video</label>
@endif

<div class="drop-area video-drop-area">
    <i class="bi bi-cloud-arrow-up"></i>
    <p class="drag-drop">Drag and drop file here</p>

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
    <p class="condition">Maximum file size is 200 MB</p>
    <input type="file" id="{{ $new_name }}" class="video-file-element" name="{{ $new_name }}" accept="video/*" style="display:none">
    <input type="hidden" name="{{ $old_name }}" value="{{ $old_value }}">

    <div class="video-preview">
        @if($old_value)
            <video src="{{ asset('storage/backend/' . $path . '/' . $old_value) }}"></video>

            <a href="{{ asset('storage/backend/' . $path . '/' . $old_value) }}" class="download-icon" title="download" download>
                <i class="bi bi-arrow-bar-down"></i>
            </a>

            <button type="button" class="close-icon video-close-icon">
                <i class="bi bi-x small"></i>
            </button>
        @endif
    </div>
</div>

@push('after-scripts')
    <script>
        $('.video-close-icon').on('click', function() {
            $(this).parent('.video-preview').prev().val('');
            $(this).parent('.video-preview').remove();
        })

        $('.video-preview video').on('click', function() {
            let src = $(this).attr('src');

            $(".modal-video-preview").find('video').attr('src', src);
            $(".modal-video-preview").find('a').attr('href', src);
            $(".modal-video-preview").modal('show');
        });
    </script>
@endpush