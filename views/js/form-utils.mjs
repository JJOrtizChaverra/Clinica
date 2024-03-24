// -------------- Funcion para crear los campos en un formdata --------------

export const createFields = function (form) {

    const data = new FormData();

    const inputsForm = Array.from(form.querySelectorAll("[name]"));

    inputsForm.forEach(input => {

        if(input.type === "file") {

            if(input.files.length > 0) {
                data.append(input.name, input.files[0]);
            } else {
                data.append(input.name, null);
            }
        } else {
            data.append(input.name, input.value);
        }
    });

    return data;
}


// -------------- Funcion para rellenar los campos en un formulario --------------

export const fillFormFields = function (form, row) {

    const cells = Array.from(row.querySelectorAll("td"));

    cells.shift();
    cells.pop();

    if(form.getAttribute("id") === "form-update-doctor" || form.getAttribute("id") === "form-update-patient") {
        cells.shift();
    }

    const inputsUpdate = Array.from(form.querySelectorAll("[name]"));

    inputsUpdate.pop();
    inputsUpdate.pop();

    inputsUpdate.forEach((input, index) => {

        const cell = cells[index];

        if (input.tagName === "SELECT") {

            const select = input;

            Array.from(select).forEach(option => {
                option.selected = option.text === cell.textContent ? true : false;
            });
        } else {
            input.value = cell.textContent;
        }
    });
}