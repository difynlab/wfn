document.getElementById('form').addEventListener('submit', function (e) {
    e.preventDefault();

    grecaptcha.ready(function () {
        grecaptcha.execute(window.siteKey, { action: window.recaptchaAction })
        .then(function (token) {
            document.getElementById('recaptcha_token').value = token;
            e.target.submit();
        })
        .catch(() => {
            alert('reCAPTCHA failed to load. Please disable blockers or try again.');
        });
    });
});