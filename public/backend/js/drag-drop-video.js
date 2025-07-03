$(document).ready(function() {
    let dropAreas = document.querySelectorAll('.video-drop-area');
    let fileInputs = document.querySelectorAll('.video-file-element');
    let videoPreviews = document.querySelectorAll('.video-preview');

    dropAreas.forEach((dropArea, index) => {
        let fileInput = fileInputs[index];
        let videoPreview = videoPreviews[index];

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.add('highlight'), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, () => dropArea.classList.remove('highlight'), false);
        });

        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            let dt = e.dataTransfer;
            let files = dt.files;
            handleFiles(files);
        }

        fileInput.addEventListener('change', (e) => {
            let files = fileInput.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            if(files.length > 0) {
                const file = files[0];
                fileInput.files = files;
                previewFile(file);
            }
        }

        function previewFile(file) {
            if(!file.type.startsWith('video/')) {
                alert('Please upload a video file.');
                return;
            }
        
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                let video = document.createElement('video');
                video.src = reader.result;
                video.controls = true;
                videoPreview.innerHTML = '';
                videoPreview.appendChild(video);
            }
        }
    });
});