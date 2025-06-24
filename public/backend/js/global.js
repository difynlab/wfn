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