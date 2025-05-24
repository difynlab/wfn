// Captcha validation
    $(document).ready(function() {
        function getRandomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        var randomNum1 = getRandomNumber(1, 98);
        var randomNum2 = getRandomNumber(1, 98 - randomNum1 + 1);
        $('.captcha .number-1').text(randomNum1);
        $('.captcha .number-2').text(randomNum2);

        
        $('.captcha .verify-button').click(function() {
            var number1 = parseInt($('.number-1').text().trim());
            var number2 = parseInt($('.number-2').text().trim());
            var expectedSum = number1 + number2;
            var sumValue = $('.sum-value');

            if(sumValue.val().trim() === '') {
                sumValue[0].setCustomValidity('Please enter a value');
                sumValue[0].reportValidity();
                $('.submit-button').attr('disabled', true);
                $('.submit-button').removeClass('active');
            }
            else if(parseInt(sumValue.val().trim()) !== expectedSum) {
                sumValue[0].setCustomValidity('Incorrect value. Please try again');
                sumValue[0].reportValidity();
                $('.submit-button').attr('disabled', true);
                $('.submit-button').removeClass('active');
            }
            else {
                sumValue[0].setCustomValidity('');
                
                $(this).removeClass('verify-button');
                $(this).addClass('verified-button');
                $(this).html('Verified');

                $('.submit-button').attr('disabled', false);
                $('.submit-button').addClass('active');
            }
        });

        $('.captcha .sum-value').on('input', function() {
            this.setCustomValidity('');
            $('.submit-button').attr('disabled', true);
            $('.submit-button').removeClass('active');
        });
    });
// Captcha validation