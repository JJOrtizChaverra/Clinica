import { makeRequest } from "../request.mjs";
import { getTimesHorary } from "../horarys.mjs";
import { sweetAlert } from "./sweet-alert.mjs";

export const fullCalendar = function () {

    const calendarEl = document.getElementById("full-calendar");

    if (calendarEl) {

        const selectDoctorQuote = document.querySelector("select[name='id-doctor-quote']");
        const inputDateQuote = document.querySelector("input[name='date-quote']");

        const calendar = new FullCalendar.Calendar(calendarEl, {
            locale: "es",
            initialView: "dayGridMonth",
            dateClick: function (info) {

                // Obtenemos la fecha de hoy y la formateamos en yyyy-mm-dd
                const date = new Date();

                const year = date.getFullYear();
                const month = ("0" + (date.getMonth() + 1)).slice(-2);
                const day = ("0" + date.getDate()).slice(-2);

                const today = `${year}-${month}-${day}`;

                // Validamos que mientras la fecha de hoy sea menor o igual a la fecha seleccionada en el input, me abra el modal
                if (today <= info.dateStr) {
                    // Obtener la fecha en la que se hizo click
                    inputDateQuote.value = info.dateStr;

                    // Llamamos a la funcion de obtener horas del horario al abrir el modal
                    getTimesHorary(selectDoctorQuote.value);

                    // Haciendo una peticion al router de consultorios para traer el consultorio al que pertenece el doctor al abrir el modal
                    makeRequest(`routers/doctors.router.php?orderBy=id_doctor&orderMode=DESC&select=id_consulting_room_doctor,name_consulting_room&column=id_doctor&value=${selectDoctorQuote.value}`, "GET")
                        .then(consultingRoom => {
                            document.querySelector("#consulting-room-quote-insert").value = JSON.parse(consultingRoom)[0]["name_consulting_room"];
                            document.querySelector("input[name='id-consulting-room-quote']").value = JSON.parse(consultingRoom)[0]["id_consulting_room_doctor"];
                        });

                    // Abrir el modal
                    const modal = new bootstrap.Modal(document.getElementById('modal-ask-quote'));
                    modal.show();

                } else {
                    sweetAlert("error", "Debes seleccionar una fecha igual o posterior a la actual");
                }
            }
        });
        calendar.render();
    }
}