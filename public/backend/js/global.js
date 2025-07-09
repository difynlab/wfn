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
    document.querySelectorAll('.editor').forEach(element => {
        ClassicEditor
            .create(element, {
                ckfinder: {
                    uploadUrl: uploadUrl,
                },
                heading: {
                    options: [
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    ]
                }
            })
            .then(newEditor => {})
            .catch(error => {
                console.error(error);
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