document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("#form");
    form.addEventListener("submit", (event) => {
        event.preventDefault();

        const formData = new FormData(form);

        formData.append('action', 'submit_form_action');

        fetch(ajax_object.ajax_url, {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    form.reset();
                } else {
                    alert('Error: ' + data.data);
                }
            })
            .catch(error => console.error('Error: ', error))
    });

    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
});