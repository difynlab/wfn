$(document).ready(function() {
    grecaptcha.ready(function () {
        grecaptcha.execute(window.siteKey, { action: window.recaptchaAction })
        .then(function (token) {
            document.getElementById('recaptcha_token').value = token;
            console.log('Test GitHub Desktop');
        })
        .catch(() => {
            alert('reCAPTCHA failed to load. Please disable blockers or try again.');
        });
    });
});