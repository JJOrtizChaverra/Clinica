// Funcion para validar el form
(() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated');
        }, false);
    });
})();

const inputsValidated = (function () {

    // Funcion para validar inputs de un Formulario
    const validated = function (input, form) {

        const inputType = input.getAttribute("type");
        let inputValue = input.value;
        let isValidate = false;

        const invalidFeedback = input.nextElementSibling;

        if (inputValue.trim() !== "") {

            if (inputValue.length >= 4) {

                if (inputType === "text") {

                    const regex = /^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/;

                    if (regex.test(inputValue)) {
                        isValidate = true;
                    } else {
                        invalidFeedback.textContent = "El campo no puede contener numeros ni caracteres especiales";
                    }

                } else if (inputType === "text-number") {

                    const regex = /^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]{4,}$/;

                    if (regex.test(inputValue)) {
                        isValidate = true;
                    } else {
                        invalidFeedback.textContent = "El campo no puede contener caracteres especiales";
                    }

                } else if (inputType === "number") {

                    const regex = /^[0-9]{4,}$/;

                    if (regex.test(inputValue)) {
                        isValidate = true;
                    } else {
                        invalidFeedback.textContent = "El campo no puede contener letras ni caracteres especiales";
                    }

                } else if (inputType === "password") {

                    const regex = /^[0-9a-zA-Z\-_ .,!#&\/()]{4,}$/;

                    if (regex.test(inputValue)) {
                        isValidate = true;
                    } else {
                        invalidFeedback.textContent = "La contraseña solo puede incluir: -_ .,!#&\/() caracteres especiales";
                    }
                }

            } else {
                invalidFeedback.textContent = "El campo debe ser mayor o igual a 4 caracteres";
            }

        } else {
            invalidFeedback.textContent = "El campo no puede estar vacío";
        }

        if (!isValidate) {
            input.value = "";
            form.classList.add('was-validated');
        }
    }


    const forms = Array.from(document.querySelectorAll('.needs-validation'));

    forms.forEach(form => {
        const inputs = Array.from(form.querySelectorAll("[name]"));

        inputs.forEach(input => {

            if (input.type !== "file" && input.tagName !== "SELECT") {
                input.addEventListener("change", validated.bind(null, input, form));
            }

        });
    });
})();