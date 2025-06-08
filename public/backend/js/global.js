// Prevent too many clicks
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            form.querySelectorAll('button').forEach(function(button) {
                button.disabled = true;
            });
        });
    });
// Prevent too many clicks