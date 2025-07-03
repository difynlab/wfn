$(document).ready(function() {
    let dropAreas = document.querySelectorAll('.image-drop-area');
    let fileInputs = document.querySelectorAll('.image-file-element');
    let imagePreviews = document.querySelectorAll('.image-preview');

    dropAreas.forEach((dropArea, index) => {
        let fileInput = fileInputs[index];
        let imagePreview = imagePreviews[index];

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
            if(!file.type.startsWith('image/')) {
                alert('Please upload an image file.');
                return;
            }
    
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                let img = document.createElement('img');
                img.src = reader.result;
                imagePreview.innerHTML = '';
                imagePreview.appendChild(img);
            }
        }
    });
});