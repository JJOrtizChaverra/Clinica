// ---------- Funcion para validar los formularios y sus campos -----------

export const formValidation = function () {

    const forms = document.querySelectorAll(".needs-validation");

    forms.forEach(form => {

        const inputs = form.querySelectorAll("input[name]:not(input[type='checkbox'])");

        inputs.forEach(input => {

            const invalidationMessage = input.nextElementSibling;

            input.addEventListener("input", function () {

                let isValid = false;

                if (input.type === "text") {

                    const regex = /^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/;

                    if (regex.test(input.value)) {
                        isValid = true;
                    }

                }

                if (input.type === "number") {

                    const regex = /^[0-9]{6,14}$/;

                    if (regex.test(input.value)) {
                        isValid = true;
                    }
                }

                if(input.type === "password") {

                    const regex = /^[0-9a-zA-Z\-_ .,!#&\/()]{6,}$/;

                    if(regex.test(input.value)) {
                        isValid = true;
                    }
                }

                if (input.type === "date") {

                    const regex = /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;

                    const date = new Date();

                    const year = date.getFullYear();
                    const month = ("0" + (date.getMonth() + 1)).slice(-2);
                    const day = ("0" + date.getDate()).slice(-2);

                    const today = `${year}-${month}-${day}`;

                    if (regex.test(input.value) && today <= input.value) {
                        isValid = true;
                    }
                }

                if (input.type === "time") {

                    const regex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;

                    if (regex.test(input.value)) {
                        isValid = true;
                    }
                }


                if (isValid) {
                    invalidationMessage.style.display = "none";
                    input.classList.remove("invalid-input");
                    input.classList.add("valid-input");
                } else {
                    invalidationMessage.style.display = "block";
                    input.classList.remove("valid-input");
                    input.classList.add("invalid-input");
                }

            });

        });

    });
}