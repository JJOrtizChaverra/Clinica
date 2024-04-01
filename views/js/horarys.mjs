import { showLoad } from "./loading.mjs";
import { makeRequest } from "./request.mjs";
import { sweetAlert } from "./plugins/sweet-alert.mjs";


// ---------- Funcion para insertar un horario para los doctores ----------

export const insertHorary = function () {

    // Obteniendo el formulario de insertar horario
    const form = document.getElementById("form-insert-horary");

    /* Validando si se encontro o no ese formulario (Esto para evitar que salgan errores en la consola
    Al estar navegando en otra vista de la aplicacion) */
    if (form) {

        form.addEventListener("submit", function (event) {

            /* Evitando que se envie el formulario (Para que no se refresque la pagina durante el proceso
            e interrumpa el envio de la informacion) */
            event.preventDefault();
            sweetAlert("loading", "Creando horario...");

            // En esta variable se va a almacenar un array tipo string el cual va a guardar los rangos de horas y minutos para los pacientes al pedir una cita
            let timesHorary = "[";

            // Tomamos como punto de partida la hora de entrada y de salida que ingreso el doctor en los inputs
            const timeStart = form.querySelector("input[name='time-start-horary']").value;
            const timeEnd = form.querySelector("input[name='time-end-horary']").value;

            // Dividimos esas horas y nos quedamos solo con los numeros
            const startHour = timeStart.split(":");
            const endHour = timeEnd.split(":");

            // Obtenemos como tipo de dato entero la hora, y los minutos de la hora de entrada
            let startHours = parseInt(startHour[0]);
            let startsMinutes = parseInt(startHour[1]);

            // Obtenemos como tipo de dato entero la hora, y los minutos de la hora de salida
            let endHours = parseInt(endHour[0]);
            let endMinutes = parseInt(endHour[1]);

            /* En while se va a ejecutar mientras: la hora de entrada sea menor a la hora de salida, O
            La hora de entrada sea exactamente igual a la hora de salida y mientras que los minutos de la hora de entrada
            sean menores a los minutos de la hora de salida */
            while (startHours < endHours || (startHours === endHours && startsMinutes < endMinutes)) {

                // Sumamos los minutos de la hora de entrada segun los que haya seleccionado en el rango de minutos del input
                startsMinutes += parseInt(form.querySelector("select[name='minutes-range-horary']").value);

                // Validamos si los minutos de la hora de entrada superan o son iguales a 60 (60 minutos)
                if (startsMinutes >= 60) {
                    startHours += Math.floor(startsMinutes / 60);
                    startsMinutes = startsMinutes % 60;
                }

                /* Validamos si la hora de entrada supera a la hora de salida 0 si es igual y si los minutos
                de la hora de entrada son mayores o iguales a los minutos de la hora de salida rompemos el ciclo */
                if (startHours > endHours || (startHours === endHours && startsMinutes >= endMinutes)) {
                    break;
                }

                // Formateamos las horas y minutos a string para añadirlo a la cadena del array tipo string
                timesHorary += `"${startHours.toString().padStart(2, "0")}:${startsMinutes.toString().padStart(2, "0")}",`;
            }

            // Quitamos la ultima coma de array string
            timesHorary = timesHorary.slice(0, -1);

            // Y cerramos el array string con un corchete
            timesHorary += "]";


            // Creando un form data para almacenar la informacion de los inputs del formulario html
            const formData = new FormData(form);
            formData.append("times-horary", timesHorary);
            formData.append("insert", true);


            /* Llamando a la funcion makeRequest (Propia mia) para hacer una peticion fetch al router
            y procesar la informacion en el backend */
            makeRequest("routers/horarys.router.php", "POST", formData)
                .then(result => {

                    // Si el resultado de la peticion es 1 o true mostrar una alerta tipo success
                    if (result == 1) {
                        sweetAlert("success", "Horario creado!") // El sweetAlert devuelve una promesa o una respuesta, por lo cual este .then lo que hace es que al darle click al boton aceptar de la alerta, me refresque la pagina
                            .then(success => {
                                showLoad();
                                window.location.reload();
                            });
                    } else {
                        sweetAlert("error", result);
                    }
                });
        });
    }
}


// -------------- Funcion para obtener las horas en las que esta disponible el doctor para atender la cita --------------

export const getTimesHorary = function (idDoctor) {

    const selectTimeQuote = document.querySelector("select[name='time-quote']");
    const inputDateQuote = document.querySelector("input[name='date-quote'");
    const inputIdHorary = document.querySelector("input[name='id-horary-quote'");

    // Obtenemos la fecha de hoy y la formateamos en yyyy-mm-dd
    const date = new Date();

    const year = date.getFullYear();
    const month = ("0" + (date.getMonth() + 1)).slice(-2);
    const day = ("0" + date.getDate()).slice(-2);

    const today = `${year}-${month}-${day}`;

    // Validamos que mientras la fecha de hoy sea menor o igual a la fecha seleccionada en el input, me traiga las horas
    if (today <= inputDateQuote.value) {

        // Hacemos una peticion get al controlador de horarios para traer todos los horarios que pertenecen al id del doctor que se recibe por parametro
        makeRequest(`routers/horarys.router.php?orderBy=id_horary&orderMode=DESC&select=id_horary,date_horary,times_horary&column=id_doctor_horary&value=${idDoctor}`, "GET")
            .then(horarys => {

                // Limpiando el select de horas para evitar que se junten todas las horas de todas las fechas y doctores
                selectTimeQuote.innerHTML = "";
                inputIdHorary.value = "";

                // Iterando sobre los horarios hasta encontrar el horario que coincida con la fecha que se esta estipulando en el input de seleccionar fecha
                const horary = JSON.parse(horarys).find(horary => {
                    return horary["date_horary"] === inputDateQuote.value;
                });

                // Si el resultado anterior es diferente a vacio, osea que si encontro coincidencias en la fecha del input y del historial de horarios del doctor
                if (horary !== undefined) {

                    // Conviertiendo todas las horas de ese horario en un arreglo para iterarlo
                    let timesHorary = JSON.parse(horary["times_horary"]);

                    // Validamos si la fecha actual es igual a la del input de seleccionar fecha
                    // (Esto con el fin de hacer que se muestren unicamente las horas que estan despues de la hora actual y que el paciente
                    // no pueda seleccionar una hora que ya paso o no existe)
                    if (today === inputDateQuote.value) {

                        let currentHour = new Date().getHours();
                        let currentMinutes = new Date().getMinutes();

                        currentHour = currentHour < 10 ? "0" + currentHour : currentHour;
                        currentMinutes = currentMinutes < 10 ? "0" + currentMinutes : currentMinutes;

                        const currentHourStr = `${currentHour}:${currentMinutes}`;

                        timesHorary = timesHorary.filter(hour => {

                            const hourSplit = hour.split(":");

                            let hourInt = parseInt(hourSplit[0]);
                            let minutesInt = parseInt(hourSplit[1]);

                            hourInt = hourInt < 10 ? "0" + hourInt : hourInt;
                            minutesInt = minutesInt < 10 ? "0" + minutesInt : minutesInt;

                            const hourCompare = `${hourInt}:${minutesInt}`;

                            return hourCompare > currentHourStr;

                        });

                        // Si el metodo filter devuelve una longitud de 0 quiere decir que ya no hay horas disponibles para citas despues de la hora actual
                        // A menos que cambie de doctor a uno que si tenga horas disponibles despues de la hora actual
                        if (timesHorary.length === 0) {
                            selectTimeQuote.innerHTML += `<option selected disabled readonly>No hay horas disponibles con ese/a doctor/a</option>`
                            return;
                        }
                    }

                    // Al final de todo iteramos sobre todas las horas que se encuentran disponibles para fecha y doctor y las mostramos como opciones en el select de horas
                    timesHorary.forEach(hour => {
                        selectTimeQuote.innerHTML += `<option value="${hour}">${hour}</option>`;
                    });

                    inputIdHorary.value = horary["id_horary"];

                } else {
                    selectTimeQuote.innerHTML += `<option selected disabled readonly>No hay horas disponibles con ese/a doctor/a</option>`
                }
            });
    } else {
        selectTimeQuote.innerHTML = `<option selected disabled readonly>Seleciona una fecha igual o mayor a la actual</option>`;
        inputIdHorary.value = "";
    }
}