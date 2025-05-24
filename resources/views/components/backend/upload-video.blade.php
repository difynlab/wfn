@props(['old_name', 'old_value', 'new_name', 'path', 'class'])

<label for="video" class="form-label">Upload Video</label>

<div class="drop-area video-drop-area {{ isset($class) ? $class : '' }}">
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
    <p class="condition">Maximum file size is 100 MB</p>
    <input type="file" id="{{ $new_name }}" class="video-file-element" name="{{ $new_name }}" accept="video/*" style="display:none">
    <input type="hidden" name="{{ $old_name }}" value="{{ $old_value }}">

    <div class="video-preview">
        @if($old_value)
             <video src="{{ asset('storage/backend/' . $path . '/' . $old_value) }}" controls></video>
        @endif
    </div>
</div>