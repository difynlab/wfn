@props(['image_count', 'old_name', 'old_value', 'new_name', 'path', 'label'])

@if(isset($label))
    <label for="image" class="form-label">Upload {{ $label }} Images</label>
@else
    <label for="image" class="form-label">Upload Images</label>
@endif

<div class="drop-area images-drop-area">
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
    <p class="condition">Maximum of {{ $image_count }} images should be uploaded</p>
    <input type="file" class="image-file-elements" name="{{ $new_name }}" accept="image/*" style="display:none" multiple>
    <input type="hidden" name="{{ $old_name }}" value="{{ $old_value }}">
    <input type="hidden" class="image-counts" value="{{ $image_count }}">

    <div class="images-preview">
        @if($old_value)
            @foreach(json_decode(htmlspecialchars_decode($old_value)) as $value)
                <div class="single-image position-relative">
                    <img src="{{ asset('storage/backend/' . $path . '/' . $value) }}">

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
            let imageDiv = $(this).closest('.single-image');
            let imageSrc = imageDiv.find('img').attr('src');
            let imageName = String(imageSrc).split('/').pop();
            let oldValueInput = $('input[name="{{ $old_name }}"]');
            let oldValue = JSON.parse($('<textarea/>').html(oldValueInput.val()).text());

            let updatedValue = oldValue.filter(function (name) {
                return name !== imageName;
            });

            oldValueInput.val(JSON.stringify(updatedValue));
            imageDiv.remove();
        })

        $('.images-preview img').on('click', function() {
            let src = $(this).attr('src');

            $(".modal-image-preview").find('img').attr('src', src);
            $(".modal-image-preview").find('a').attr('href', src);
            $(".modal-image-preview").modal('show');
        });
    </script>
@endpush