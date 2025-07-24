// Prevent too many clicks
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(event) {
            form.querySelectorAll('button, input[type="submit"]').forEach(function(button) {
                button.disabled = true;
            });
        });
    });
// Prevent too many clicks


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

            // input.addEventListener('click', function () {
            //     setTimeout(() => {
            //         const picker = document.querySelector('.date-picker-x.active');
            //         if(picker) {
            //             picker.classList.remove('to-top');
            //             picker.classList.add('to-bottom');
            //         }
            //     }, 0);
            // });
        });
    });
// Date picker X