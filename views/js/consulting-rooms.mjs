import { showLoad } from "./loading.mjs";
import { makeRequest } from "./request.mjs";
import { sweetAlert } from "./plugins/sweet-alert.mjs";


// ---------- Funcion para registrar un consultorio ----------

export const insertConsultingRoom = function () {

    // Obteniendo el formulario de registro de consultorio
    const form = document.getElementById("form-insert-consulting_room");

    /* Validando si se encontro o no ese formulario (Esto para evitar que salgan errores en la consola
    Al estar navegando en otra vista de la aplicacion) */
    if (form) {

        // Aplicando un evento de envio al formulario para enviar la informacion al router
        form.addEventListener("submit", function (event) {

            /* Evitando que se envie el formulario (Para que no se refresque la pagina durante el proceso
            e interrumpa el envio de la informacion) */
            event.preventDefault();
            sweetAlert("loading", "Procesando informacion...");

            // Creando un form data para almacenar la informacion de los inputs del formulario html
            const formData = new FormData(form);
            formData.append("insert", true);

            /* Llamando a la funcion makeRequest (Propia mia) para hacer una peticion fetch al router
            y procesar la informacion en el backend */
            makeRequest("routers/consulting-rooms.router.php", "POST", formData)
                .then(result => {

                    // Si el resultado de la peticion es 1 o true mostrar una alerta tipo success
                    if (result == 1) {
                        sweetAlert("success", "Consultorio registrado!") // El sweetAlert devuelve una promesa o una respuesta, por lo cual este .then lo que hace es que al darle click al boton aceptar de la alerta, me refresque la pagina
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


// ---------- Funcion para actualizar un consultorio ----------

export const updateConsultingRoom = function () {

    // Obteniendo el formulario de actualizar del consultorio
    const form = document.getElementById("form-update-consulting-room");

    /* Validando si se encontro o no ese formulario (Esto para evitar que salgan errores en la consola
    Al estar navegando en otra vista de la aplicacion) */
    if (form) {

        // Obteniendo todos los botones de editar de cada una de las filas de la tabla (Cada fila tiene su propio boton de editar)
        const buttonsUpdate = document.querySelectorAll(".button-update-consulting-room");

        /* Creando una variable vacia en la cual se va almacenar el id del consultorio cuando se clickee el boton de editar
        a ese consultorio que se quiere editar */
        let idConsultingRoom;

        // Iterando sobre cada uno de los botones
        buttonsUpdate.forEach(button => {

            // Aplicando un evento de click para aquel boton que se presione
            button.addEventListener("click", function () {

                // Obteniendo el id del consultorio a editar que se encuentra en el id de cada fila de la tabla
                // (El metodo closest lo que hace es acceder al elemento mas cercano que se especifica, en este caso al tr)
                const row = button.closest("tr");
                idConsultingRoom = row.id;

                // Llenando los campos del formulario segun el texto que contiene cada celda
                form.querySelector("input[name='name-consulting-room']").value = row.cells[1].textContent;

            });

        });


        // Aplicando un evento de envio al formulario para enviar la informacion al router
        form.addEventListener("submit", function (event) {

            /* Evitando que se envie el formulario (Para que no se refresque la pagina durante el proceso
            e interrumpa el envio de la informacion) */
            event.preventDefault();
            sweetAlert("loading", "Procesando informacion...");

            // Creando un form data para almacenar la informacion de los inputs del formulario html
            const formData = new FormData(form);
            formData.append("id-consulting-room", idConsultingRoom);
            formData.append("update", true);


            /* Llamando a la funcion makeRequest (Propia mia) para hacer una peticion fetch al router
            y procesar la informacion en el backend */
            makeRequest("routers/consulting-rooms.router.php", "POST", formData)
                .then(result => {

                    // Si el resultado de la peticion es 1 o true mostrar una alerta tipo success
                    if (result == 1) {
                        sweetAlert("success", "Consultorio actualizado!") // El sweetAlert devuelve una promesa o una respuesta, por lo cual este .then lo que hace es que al darle click al boton aceptar de la alerta, me refresque la pagina
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


// ---------- Funcion para eliminar un consultorio ----------

export const deleteConsultingRoom = function () {

    // Obteniendo todos los botones de eliminar de cada una de las filas de la tabla (Cada fila tiene su propio boton de eliminar)
    const buttonsDelete = document.querySelectorAll(".button-delete-consulting-room");

    if (buttonsDelete.length > 0) {
        // Iterando sobre cada uno de los botones
        buttonsDelete.forEach(button => {

            // Aplicando un evento de click para aquel boton que se presione
            button.addEventListener("click", function () {

                // Obteniendo el id del consultorio a eliminar que se encuentra en el id de cada fila de la tabla
                // (El metodo closest lo que hace es acceder al elemento mas cercano que se especifica, en este caso al tr)
                const row = button.closest("tr");
                const idConsultingRoom = row.id;

                /* Llamando a la funcion sweetAlert la cual tiene una opcion de ventana tipo confirmar para asi validar la eliminacion
                del consultorio (Tambien devuelve una promesa o resultado al dar click en confirmar, el cual se puede manejar con un .then) */
                sweetAlert("confirm", "Esta seguro/a que desea eliminar este consultorio")
                    .then(result => {
                        if (result.isConfirmed) {

                            sweetAlert("loading", "Eliminando...");

                            // Creando un form data para almacenar la informacion de los inputs del formulario html
                            const formData = new FormData();
                            formData.append("id-consulting-room", idConsultingRoom);
                            formData.append("delete", true);

                            /* Llamando a la funcion makeRequest (Propia mia) para hacer una peticion fetch al router
                            y procesar la informacion en el backend */
                            makeRequest("routers/consulting-rooms.router.php", "POST", formData)
                                .then(result => {

                                    // Si el resultado de la peticion es 1 o true mostrar una alerta tipo success
                                    if (result == 1) {
                                        sweetAlert("success", "Consultorio eliminado!") // El sweetAlert devuelve una promesa o una respuesta, por lo cual este .then lo que hace es que al darle click al boton aceptar de la alerta, me refresque la pagina
                                            .then(success => {
                                                showLoad();
                                                window.location.reload();
                                            });
                                    } else {
                                        sweetAlert("error", result);
                                    }
                                });
                        }
                    });
            });
        });
    }
}