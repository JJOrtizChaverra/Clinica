import { showLoad, hideLoad } from "./loading.mjs";
import { sweetAlert } from "./plugins/sweet-alert.mjs";
import { makeRequest } from "./request.mjs";
import { getTimesHorary } from "./horarys.mjs";


// ---------- Funcion para pedir cita medica ----------

export const askQuote = function () {

    // Obteniendo el formulario de pedir cita medica
    const form = document.getElementById("form-ask-quote");

    /* Validando si se encontro o no ese formulario (Esto para evitar que salgan errores en la consola
    Al estar navegando en otra vista de la aplicacion) */
    if (form) {

        const selectDoctorQuote = document.querySelector("select[name='id-doctor-quote']");
        const inputDateQuote = document.querySelector("input[name='date-quote']");

        // Llamamos a la funcion de obtener horas del horario al cambiar dinamicamente de doctor en el select de seleccionar doctor
        selectDoctorQuote.addEventListener("change", function () {
            getTimesHorary(selectDoctorQuote.value);

            // Haciendo una peticion al router de consultorios para traer el consultorio al que pertenece el doctor seleccionado en el select
            makeRequest(`routers/doctors.router.php?orderBy=id_doctor&orderMode=DESC&select=id_consulting_room_doctor,name_consulting_room&column=id_doctor&value=${selectDoctorQuote.value}`, "GET")
                .then(consultingRoom => {
                    form.querySelector("#consulting-room-quote-insert").value = JSON.parse(consultingRoom)[0]["name_consulting_room"];
                    form.querySelector("input[name='id-consulting-room-quote']").value = JSON.parse(consultingRoom)[0]["id_consulting_room_doctor"];
                });
        });

        // Llamamos a la funcion de obtener horas del horario al cambiar la fecha de la cita en el input de seleccionar fecha
        inputDateQuote.addEventListener("change", function () {
            getTimesHorary(selectDoctorQuote.value);
        });

        // Aplicamos un evento submit al formulario para enviar la informacion al router y aplicar la logica para guardar la cita en la db
        form.addEventListener("submit", function (event) {

            /* Evitando que se envie el formulario (Para que no se refresque la pagina durante el proceso
            e interrumpa el envio de la informacion) */
            event.preventDefault();
            sweetAlert("loading", "Pidiendo cita...");

            // Creamos un formdata con la informacion de los inputs del formulario
            const formData = new FormData(form);
            formData.append("insert", true);

            makeRequest("routers/quotes.router.php", "POST", formData)
                .then(result => {

                    if (result == 1) {
                        sweetAlert("success", "Cita pedida!") // El sweetAlert devuelve una promesa o una respuesta, por lo cual este .then lo que hace es que al darle click al boton aceptar de la alerta, me refresque la pagina
                            .then(success => {
                                showLoad();
                                window.location.reload();
                            });
                    } else {
                        hideLoad();
                        sweetAlert("error", result);
                    }
                });

        });
    }
}


export const updateQuote = function () {

    const formUpdateQuote = document.getElementById("form-update-quote");

    if (formUpdateQuote) {

        const buttonsUpdate = Array.from(document.querySelectorAll(`.button-update-quote`));

        const selectDoctorQuote = document.querySelector("select[name='doctor-consulting-room']");
        const inputDateQuote = document.querySelector("input[name='date']");
        const inputCurrentTimeQuote = document.querySelector("input[name='current-time-quote']");
        const inputCurrentDateQuote = document.querySelector("input[name='current-date-quote']");
        const inputIdHorary = document.querySelector("input[name='id-horary']");
        const inputIdQuote = document.querySelector("input[name='id-quote']");

        buttonsUpdate.forEach(button => {

            const row = button.closest("tr");

            button.addEventListener("click", function () {

                inputCurrentTimeQuote.value = row.cells[2].textContent;
                inputCurrentDateQuote.value = row.cells[1].textContent;
                inputIdQuote.value = row.id;

                for (let i = 0; i < selectDoctorQuote.length; i++) {
                    const element = selectDoctorQuote[i];

                    if (element.value.split("-")[0] === row.cells[3].getAttribute("value")) {
                        selectDoctorQuote.selectedIndex = i;
                    }
                }

                inputDateQuote.value = row.cells[1].textContent;
                getHoursDoctor(selectDoctorQuote.options[selectDoctorQuote.selectedIndex].value.split("-")[0]);

            });
        });

        selectDoctorQuote.addEventListener("change", function () {
            getHoursDoctor(selectDoctorQuote.value.split("-")[0]);
        });

        inputDateQuote.addEventListener("change", function () {
            getHoursDoctor(selectDoctorQuote.options[selectDoctorQuote.selectedIndex].value.split("-")[0]);
        });


        formUpdateQuote.addEventListener("submit", function (event) {

            event.preventDefault();
            showLoad();

            const formData = new FormData();

            formData.append("update", "quote");
            formData.append("id_horary", inputIdHorary.value);
            formData.append("id_quote", inputIdQuote.value);
            formData.append("current-time", inputCurrentTimeQuote.value);
            formData.append("current-date", inputCurrentDateQuote.value);

            const data = createFields(formUpdateQuote, formData);

            makeRequest("controllers/router.php", "POST", data)
                .then(result => {

                    if (result == 1) {
                        window.location.reload();
                    } else {
                        hideLoad();
                        badgeAlert(result, "error", "alert-update-quote");
                    }

                });

        });
    }

}

export const deleteQuote = function () {

    const formDeleteQuote = document.getElementById("form-delete-quote");

    if (formDeleteQuote) {

        const buttonsDelete = Array.from(document.querySelectorAll(`.button-delete-quote`));
        const inputIdQuote = document.querySelector("input[name='id-quote']");

        buttonsDelete.forEach(button => {

            const row = button.closest("tr");

            button.addEventListener("click", function () {
                inputIdQuote.value = row.id;
            });

            formDeleteQuote.addEventListener("submit", function (event) {

                event.preventDefault();
                showLoad();

                const data = new FormData();

                data.append("id", inputIdQuote.value);
                data.append("delete", "quote");

                makeRequest("controllers/router.php", "POST", data)
                    .then(result => {

                        if (result == 1) {
                            window.location.reload();
                        } else {
                            hideLoad();
                            badgeAlert(result, "error", "alert-delete-quote");
                        }

                    });

            });
        });
    }
}