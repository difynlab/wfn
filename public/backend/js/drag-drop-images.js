$(document).ready(function() {
    let dropAreas = document.querySelectorAll('.images-drop-area');
    let buttons = document.querySelectorAll('.images-drop-area .button');
    let fileInputs = document.querySelectorAll('.image-file-elements');
    let imagesPreviews = document.querySelectorAll('.images-preview');
    let imageCounts = document.querySelectorAll('.image-counts');

    dropAreas.forEach((dropArea, index) => {
        let fileInput = fileInputs[index];
        let button = buttons[index];
        let imagePreview = imagesPreviews[index];
        let imageCount = imageCounts[index];
        let filesArray = [];
        let maxFiles = parseInt(imageCount.getAttribute('value'));

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
            imagePreview.innerHTML = '';
            filesArray.forEach(previewFile);
        }

        function previewFile(file) {
            if(!file.type.startsWith('image/')) {
                alert('Please upload an image file.');
                return;
            }

            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                let img = document.createElement('img');
                img.src = reader.result;
                imagePreview.appendChild(img);
            };
        }
    });
});
