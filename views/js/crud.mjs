// -------------- Funcion para insertar un registro en la base de datos -------------- 

import { showLoad, hideLoad } from "./loading.mjs";
import { badgeAlert } from "./alert.mjs";
import { makeRequest } from "./request.mjs";
import { createFields, fillFormFields } from "./form-utils.mjs";
import { dataTable } from "./data-table.mjs";

export const insert = function () {

    if (document.querySelector("table")) {

        const table = document.querySelector("table").id.split("-")[1].slice(0, -1);
        const formInsert = document.getElementById(`form-insert-${table}`);

        formInsert.addEventListener("submit", function (event) {

            event.preventDefault();
            showLoad();

            const data = createFields(formInsert);

            makeRequest("controllers/router.php", "POST", data)
                .then(result => {

                    if (result == 1) {
                        window.location = window.location.href;
                    } else {
                        hideLoad();
                        badgeAlert(result, "error", `alert-insert-${table}`);
                    }
                });
        });
    }
}


// -------------- Funcion para actualizar un registro de la base de datos --------------

export const update = function () {

    if (document.querySelector("table")) {

        const table = document.querySelector("table").id.split("-")[1].slice(0, -1);
        const formUpdate = document.querySelector(`#form-update-${table}`);

        const buttonsUpdate = Array.from(document.querySelectorAll(`.button-update-${table}`));

        buttonsUpdate.forEach(button => {

            const row = button.closest("tr");

            button.addEventListener("click", fillFormFields.bind(null, formUpdate, row));
            button.addEventListener("click", function () { formUpdate.querySelector(`input[name="id"]`).value = button.id; });
        });

        formUpdate.addEventListener("submit", function (event) {

            event.preventDefault();
            showLoad();

            const data = createFields(formUpdate);

            makeRequest("controllers/router.php", "POST", data)
                .then(result => {

                    if (result == 1) {
                        window.location = window.location.href;
                    } else {
                        hideLoad();
                        badgeAlert(result, "error", `alert-update-${table}`);
                    }
                });
        });
    }
}


// -------------- Funcion para eliminar un registro de la base de datos-------------- 

export const deletee = function () {

    if (document.querySelector("table")) {

        const table = document.querySelector("table").id.split("-")[1].slice(0, -1)
        const buttonsDelete = Array.from(document.querySelectorAll(`.button-delete-${table}`));
        const formDelete = document.querySelector(`#form-delete-${table}`);

        buttonsDelete.forEach(button => {
            button.addEventListener("click", function () { formDelete.querySelector(`input[name="id"]`).value = button.id; });
        });

        formDelete.addEventListener("submit", function (event) {

            event.preventDefault();
            showLoad();

            const data = createFields(formDelete);

            makeRequest("controllers/router.php", "POST", data)
                .then(result => {

                    if (result == 1) {
                        window.location = window.location.href;
                    } else {
                        hideLoad();
                        badgeAlert(result, "error", `alert-delete-${table}`);
                    }
                });
        });
    }
}


// -------------- Funcion para obtener informacion de la base de datos --------------

export const get = function () {

    if (document.querySelector("table")) {

        showLoad();

        const table = document.querySelector("table").id.split("-")[1].slice(0, -1);

        let options = [];
        let columnsTable = [];

        if (table === "consulting_room") {
            options = ["consulting_rooms", null, "id", null, "*"];
            columnsTable = ["N°", "Nombre del consultorio", "Acciones"];
        } else if (table === "doctor") {
            options = ["doctors", "consulting_rooms", "id", null, "id_doctor,document_doctor,name_doctor,lastname_doctor,gender_doctor,name_consulting_room,picture_doctor"];
            columnsTable = ["N°", "Documento", "Nombre", "Apellido", "Genero", "Consultorio", "Foto", "Acciones"];
        } else if (table === "patient") {
            options = ["patients", null, "id", null, "id_patient,document_patient,name_patient,lastname_patient,gender_patient,picture_patient"];
            columnsTable = ["N°", "Documento", "Nombre", "Apellido", "Genero", "Foto", "Acciones"];
        }

        const columns = columnsTable.map(column => {
            return { title: column };
        });

        makeRequest(`controllers/router.php?table-1=${options[0]}&table-2=${options[1]}&column=${options[2]}&value=${options[3]}&select=${options[4]}`, "GET")
            .then(result => {

                const data = JSON.parse(result).map((row, index) => {

                    if (table !== "consulting_room") {
                        if (row[`picture_${table}`] !== null) {
                            row[`picture_${table}`] = `<img src="views/assets/img/${table}/${row[`picture_${table}`]}" class="img-fluid rounded-circle" width="50px">`;
                        } else {
                            row[`picture_${table}`] = `<img src="views/assets/img/default.jpg" class="img-fluid rounded-circle" width="50px">`;
                        }
                    }

                    const element = Object.values(row);

                    const id = element.shift();

                    element.unshift(index + 1);
                    element.push(`
                    <button class="btn btn-success mb-2 my-tooltip button-update-${table}" data-bs-toggle="modal" data-bs-target="#modal-update-${table}" id="${id}">
                        <span class="tooltip-text">
                            Editar
                        </span>
                        <i class="bi bi-pencil-square"></i>
                    </button>
    
                    <button class="btn btn-danger mb-2 my-tooltip button-delete-${table}" data-bs-toggle="modal" data-bs-target="#modal-delete-${table}" id="${id}">
                        <span class="tooltip-text">
                            Eliminar
                        </span>
                        <i class="bi bi-x-square"></i>
                    </button>`
                    );

                    return element;
                });

                dataTable(columns, data);

                setTimeout(() => {

                    insert();
                    update();
                    deletee();

                    hideLoad();
                }, 3000);

            });
    }
}