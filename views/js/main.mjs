import { formValidation } from "./form-utilities.mjs";
import { login, editProfile, changePassword } from "./users.mjs";
import { insertConsultingRoom, updateConsultingRoom, deleteConsultingRoom } from "./consulting-rooms.mjs";
import { insertDoctor, updateDoctor, deleteDoctor } from "./doctors.mjs";
import { insertPatient, updatePatient, deletePatient } from "./patients.mjs";
import { insertSecretary, updateSecretary, deleteSecretary } from "./secretarys.mjs";
import { insertHorary } from "./horarys.mjs";
import { askQuote } from "./quotes.mjs";
import { openImage, showPicture } from "./user-actions.mjs";
import { darkMode } from "./configurations.mjs";
import { fullCalendar } from "./plugins/full-calendar.mjs";
import { dataTable } from "./plugins/data-table.mjs";
import { hideLoad } from "./loading.mjs";

window.addEventListener("load", function () {

    formValidation();

    if (this.document.getElementById("view-login")) {
        login();

    } else if (this.document.getElementById("view-consulting-rooms")) {
        insertConsultingRoom();
        updateConsultingRoom();
        deleteConsultingRoom();

    } else if (this.document.getElementById("view-doctors")) {
        insertDoctor();
        updateDoctor();
        deleteDoctor();

    } else if (this.document.getElementById("view-patients")) {
        insertPatient();
        updatePatient();
        deletePatient();

    } else if (this.document.getElementById("view-secretarys")) {
        insertSecretary();
        updateSecretary();
        deleteSecretary();

    } else if (this.document.getElementById("view-horarys")) {
        insertHorary();

    } else if (this.document.getElementById("view-quotes-patients")) {
        fullCalendar();
        askQuote();

    } else if (this.document.getElementById("view-profile")) {
        showPicture();
        editProfile();
        changePassword();

    } else if (this.document.getElementById("view-configurations")) {
        darkMode();
    }

    openImage();
    dataTable();

    // Ocultando la carga de la pagina despues de 2 segundos de haber cargado completamente el DOM
    // (Esto para asegurarse mas de que todas las funciones y elementos de la pagina carguen bien y no haya errores en el codigo)
    setTimeout(() => {
        hideLoad();
    }, 2000);
});