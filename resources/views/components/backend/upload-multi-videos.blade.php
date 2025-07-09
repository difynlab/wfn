@props(['video_count', 'old_name', 'old_value', 'new_name', 'path', 'label'])

@if(isset($label))
    <label for="video" class="form-label">Upload {{ $label }} Videos</label>
@else
    <label for="video" class="form-label">Upload Videos</label>
@endif

<div class="drop-area videos-drop-area">
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
    <p class="condition">Maximum of {{ $video_count }} videos should be uploaded</p>
    <input type="file" class="video-file-elements" name="{{ $new_name }}" accept="video/*" style="display:none" multiple>
    <input type="hidden" name="{{ $old_name }}" value="{{ $old_value }}">
    <input type="hidden" class="video-counts" value="{{ $video_count }}">

    <div class="videos-preview">
        @if($old_value)
            @foreach(json_decode(htmlspecialchars_decode($old_value)) as $value)
                <div class="single-video position-relative">
                    <video src="{{ asset('storage/backend/' . $path . '/' . $value) }}"></video>

                    <a href="{{ asset('storage/backend/' . $path . '/' . $value) }}" class="download-icon" title="download" download>
                        <i class="bi bi-arrow-bar-down"></i>
                    </a>

                    <button type="button" class="close-icon close-{{ $old_name }}">
                        <i class="bi bi-x small"></i>
                    </button>
                </div>
            @endforeach
        @endif
    </div>
</div>

@push('after-scripts')
    <script>
        $('.close-{{ $old_name }}').on('click', function() {
            let videoDiv = $(this).closest('.single-video');
            let videoSrc = videoDiv.find('video').attr('src');
            let videoName = videoSrc.split('/').pop();
            let oldValueInput = $('input[name="{{ $old_name }}"]');
            let oldValue = JSON.parse($('<textarea/>').html(oldValueInput.val()).text());

            let updatedValue = oldValue.filter(function (name) {
                return name !== videoName;
            });

            oldValueInput.val(JSON.stringify(updatedValue));
            videoDiv.remove();
        })

        $('.videos-preview video').on('click', function() {
            let src = $(this).attr('src');

            $(".modal-video-preview").find('video').attr('src', src);
            $(".modal-video-preview").find('a').attr('href', src);
            $(".modal-video-preview").modal('show');
        });
    </script>
@endpush