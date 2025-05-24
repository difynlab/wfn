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


// Prevent too many clicks
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if(form.checkValidity()) {
                form.querySelectorAll('.submit-button, .delete-button').forEach(function(button) {
                    button.disabled = true;
                });
            }
            else {
                form.reportValidity();
                event.preventDefault();
            }
        });
    });
// Prevent too many clicks


// Status update
    function updateStatusToggle(routeTemplate, csrfToken, user) {
        $('.status-toggle').on('change', function() {
            let isChecked = $(this).prop('checked');
            let status = isChecked ? '1' : '2';
            let id = $(this).attr('id');
            let url = routeTemplate.replace(':user', user).replace(':id', id);

            let spinner = $(this).next('.spinner');
            spinner.show();

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                    status: status,
                    _token: csrfToken
                },
                success: function(response) {
                    spinner.hide();
                    location.reload();
                },
                error: function(xhr) {
                    console.log('An error occurred:', xhr.responseText);
                }
            });
        });
    }
// Status update