document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("#form");

    const inputFields = document.querySelectorAll('input.form-control');
    
    inputFields.forEach(inputField => {
        if (inputField.hasAttribute('required')) {
            inputField.placeholder = inputField.placeholder + ' *';
        }
    })

    form.addEventListener("submit", (event) => {
        event.preventDefault();

        clearErrors();
        const formData = new FormData(form);

        // Collect form field values
        const firstName = document.getElementById("first_name").value.trim();
        const lastName = document.getElementById("last_name").value.trim();
        const email = document.getElementById("email").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const moveInDate = document.getElementById("move_in_date").value.trim();
        const unitType = document.getElementById("unit_type").value;
        const roomType = document.querySelector("input[name='room_type']:checked");

        // Error message spans
        const firstNameError = document.getElementById("first-name-error");
        const lastNameError = document.getElementById("last-name-error");
        const emailError = document.getElementById("email-error");
        const phoneError = document.getElementById("phone-error");
        const moveInDateError = document.getElementById("move-in-date-error");
        const unitTypeError = document.getElementById("unit-type-error");
        const roomTypeError = document.getElementById("room-type-error");

        let isValid = true;

        // Validation rules
        if (firstName === "") {
            firstNameError.textContent = "First name is required.";
            isValid = false;
        }

        if (lastName === "") {
            lastNameError.textContent = "Last name is required.";
            isValid = false;
        }

        if (email === "" || !validateEmail(email)) {
            emailError.textContent = "Please enter a valid email address.";
            isValid = false;
        }

        if (phone === "") {
            phoneError.textContent = "Phone number is required.";
            isValid = false;
        }

        if (moveInDate === "") {
            moveInDateError.textContent = "Move-in date is required.";
            isValid = false;
        }

        if (unitType === "") {
            unitTypeError.textContent = "Please select a unit type.";
            isValid = false;
        }

        if (!roomType) {
            roomTypeError.textContent = "Please select a room type.";
            isValid = false;
        }

        formData.append('action', 'submit_form_action');

        if (isValid) {
            fetch(ajax_object.ajax_url, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        form.reset();
                        alert('Success');
                    } else {
                        alert('Error: ' + data.data);
                    }
                })
                .catch(error => console.error('Error: ', error))
        }

        function clearErrors() {
            document.querySelectorAll(".error-message").forEach(span => {
                span.textContent = "";
            });
        }

        // Helper function to validate email
        function validateEmail(email) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }
    });


    // const forms = document.querySelectorAll('.needs-validation')

    // // Loop over them and prevent submission
    // Array.from(forms).forEach(form => {
    //     form.addEventListener('submit', event => {
    //         if (!form.checkValidity()) {
    //             event.preventDefault()
    //             event.stopPropagation()
    //         }

    //         form.classList.add('was-validated')
    //     }, false)
    // })
});