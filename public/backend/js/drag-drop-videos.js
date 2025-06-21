$(document).ready(function() {
    let dropAreas = document.querySelectorAll('.videos-drop-area');
    let buttons = document.querySelectorAll('.videos-drop-area .button');
    let fileInputs = document.querySelectorAll('.video-file-elements');
    let videosPreviews = document.querySelectorAll('.videos-preview');
    let videoCounts = document.querySelectorAll('.video-counts');

    dropAreas.forEach((dropArea, index) => {
        let fileInput = fileInputs[index];
        let button = buttons[index];
        let videoPreview = videosPreviews[index];
        let videoCount = videoCounts[index];
        let filesArray = [];
        let maxFiles = parseInt(videoCount.getAttribute('value'));

        // Prevent default behaviors for drag & drop events
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
        button.addEventListener('click', () => fileInput.click());

        // Fix: Handle file selection properly
        fileInput.addEventListener('change', (e) => {
            let files = Array.from(e.target.files);
            handleFiles(files);
        });

        function handleDrop(e) {
            let dt = e.dataTransfer;
            let files = Array.from(dt.files);
            handleFiles(files);
        }

        function handleFiles(files) {
            let newFiles = files.slice(0, maxFiles - filesArray.length);
            filesArray = filesArray.concat(newFiles).slice(0, maxFiles);

            updateFileInput();
            updatePreview();
        }

        function updateFileInput() {
            let dataTransfer = new DataTransfer();
            filesArray.forEach(file => {
                dataTransfer.items.add(file);
            });
            fileInput.files = dataTransfer.files;
        }

        function updatePreview() {
            videoPreview.innerHTML = '';
            filesArray.forEach(previewFile);
        }

        function previewFile(file) {
            if(!file.type.startsWith('video/')) {
                alert('Please upload an video file.');
                return;
            }

            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                let video = document.createElement('video');
                video.src = reader.result;
                video.controls = true;
                videoPreview.appendChild(video);
            };
        }
    });
});
