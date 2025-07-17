// Prevent too many clicks
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            form.querySelectorAll('button').forEach(function(button) {
                button.disabled = true;
            });
        });
    });

    $(document).ready(function() {
        $('.js-single').select2();
    });
// Prevent too many clicks

// html editor
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    document.querySelectorAll('.editor').forEach(element => {
        new FroalaEditor(element, {
            imageUploadURL: '/admin/froala/upload',
            imageUploadParam: 'upload',
            imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif'],
            imageMaxSize: 2 * 1024 * 1024,
            requestHeaders: {
                'X-CSRF-TOKEN': csrfToken
            },
            events: {
                'image.uploaded': function (response) {
                    console.log('Uploaded:', response);
                },
                'image.error': function (error, response) {
                    console.error('Upload failed:', error);
                },
                'image.removed': function ($img) {
                    const imageSrc = $img.attr('src');
                    if(imageSrc) {
                        fetch('/admin/froala/delete', {
                            method: 'POST',
                            headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                            },
                            body: JSON.stringify({ src: imageSrc })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Image deleted:', data);
                        })
                        .catch(err => {
                            console.error('Failed to delete image:', err);
                        });
                    }
                }
            }
        });
    });
// html editor


// Date picker X
    $(document).ready(function () {
        const dateInputs = document.querySelectorAll('.date-picker-field');

        dateInputs.forEach(input => {
            input.DatePickerX.init({
                format: 'yyyy-mm-dd' // Ensure correct display and parsing format
            });

            if(input.value) {
                const dateParts = input.value.split('-');
                if(dateParts.length === 3) {
                    const year = parseInt(dateParts[0], 10);
                    const month = parseInt(dateParts[1], 10) - 1;
                    const day = parseInt(dateParts[2], 10);
                    const dateObj = new Date(year, month, day);

                    input.DatePickerX.setValue(dateObj);
                }
            }

            input.addEventListener('click', function () {
                setTimeout(() => {
                    const picker = document.querySelector('.date-picker-x.active');
                    if(picker) {
                        picker.classList.remove('to-top');
                        picker.classList.add('to-bottom');
                    }
                }, 0);
            });
        });
    });
// Date picker X