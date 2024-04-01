import { makeRequest } from "./request.mjs";
import { badgeAlert } from "./badge-alert.mjs";
import { showLoad, hideLoad } from "./loading.mjs";
import { sweetAlert } from "./plugins/sweet-alert.mjs";

export const login = function () {

    // Obteniendo el formulario de login
    const form = document.getElementById("form-login");

    /* Validando si se encontro o no ese formulario (Esto para evitar que salgan errores en la consola
    Al estar navegando en otra vista de la aplicacion) */
    if (form) {

        // Obtenemos una instancia de URLSearchParams y le pasamos la url actual para obtener variables get
        const URLParams = new URLSearchParams(window.location.href);

        // Comparamos si existe un elemento documento, rol en el local storage y que el rol del local storage sea igual al de la variable get de la url
        if (localStorage.getItem("document-login") && localStorage.getItem("role-login") && localStorage.getItem("role-login") === URLParams.get("role")) {

            /* Si lo anterior es verdadero accedemos a los elementos html necesarios para aplicar que el documento del usuario
            se cargue automaticamente en el input, se autochecked el recordarme y muestre un "mensaje" con el nombre del usuario */
            const inputDocument = form.querySelector("input[name='document-login']");
            const inputRememberMe = form.querySelector("input[name='remember-me-login']")
            const loginModeParagraph = document.getElementById("login-mode-paragraph");

            // Obtenemos y guardamos los elementos del local storage en variables
            const documentUser = localStorage.getItem("document-login");
            const roleUser = localStorage.getItem("role-login");

            // Hacemos una peticion get al router de usuarios para traer el nombre del usuario que se va a loguear y mostrarlo como "mensaje" en el formulario de login
            makeRequest(`routers/users.router.php?role=${roleUser}&column=document_${roleUser}&value=${documentUser}&select=name_${roleUser}`, "GET")
                .then(user => {

                    /* Validamos que la respuesta no sea falsa (Ya que puede que no se haya encontrado ese usuario que se logueo anteriormente)
                    (Para que suceda un false, el usuario logueado anteriormente puede que lo hayan eliminado de la base de datos), por lo tanto
                    si esto no sucede, siempre va a traer el respectivo usuario dueño de su cuenta y documento */
                    if (user !== "false") {

                        // Llenamos el input de documento con el documento del usuario anteriormente logueado
                        inputDocument.value = documentUser;
                        // Marcamos el check recordarme
                        inputRememberMe.checked = true;
                        // Y mostramos el nombre del usuario encima del input de documento
                        loginModeParagraph.innerHTML += `<b>${JSON.parse(user)[`name_${roleUser}`]}</b>`;
                    }

                });

        }

        // Aplicando un evento de envio al formulario para enviar la informacion al router
        form.addEventListener("submit", function (event) {

            /* Evitando que se envie el formulario (Para que no se refresque la pagina durante el proceso
            e interrumpa el envio de la informacion) */
            event.preventDefault();
            showLoad();

            // Creando un form data para almacenar la informacion de los inputs del formulario html
            const formData = new FormData(form);
            formData.append("login", true);

            /* Llamando a la funcion makeRequest (Propia mia) para hacer una peticion fetch al router
            y procesar la informacion en el backend */
            makeRequest("routers/users.router.php", "POST", formData)
                .then(result => {
                    // Si el resultado de la peticion es 1 o true mostrar una alerta tipo success
                    if (result == 1) {

                        /* Si el input checkbox de recordarme esta checkeado al enviar el formulario o iniciar sesion, automaticamente
                        se crean dos elementos en el localStorage, el documento y el rol del usuario al loguearse */
                        if (formData.get("remember-me-login") === "on") {
                            localStorage.setItem("document-login", formData.get("document-login"));
                            localStorage.setItem("role-login", formData.get("role-login"));
                        } else {
                            localStorage.removeItem("document-login");
                            localStorage.removeItem("role-login");
                        }

                        window.location = "http://clinica.com/home";
                    } else {
                        hideLoad();
                        badgeAlert(result, "error", "alert-login");
                    }
                });
        });

    }

}


// -------------- Funcion para actualizar el perfil del usuario --------------

export const editProfile = function () {

    // Obteniendo el formulario de editar perfil
    const formEditProfile = document.getElementById("form-edit-profile");

    /* Validando si se encontro o no ese formulario (Esto para evitar que salgan errores en la consola
    Al estar navegando en otra vista de la aplicacion) */
    if (formEditProfile) {

        // Aplicando un evento de envio al formulario para enviar la informacion al router
        formEditProfile.addEventListener("submit", function (event) {

            /* Evitando que se envie el formulario (Para que no se refresque la pagina durante el proceso
            e interrumpa el envio de la informacion) */
            event.preventDefault();
            sweetAlert("loading", "Actualizando perfil...");

            // Creando un form data para almacenar la informacion de los inputs del formulario html
            const formData = new FormData(formEditProfile);
            formData.append("edit", true);

            /* Llamando a la funcion makeRequest (Propia mia) para hacer una peticion fetch al router
            y procesar la informacion en el backend */
            makeRequest("routers/users.router.php", "POST", formData)
                .then(result => {

                    // Si el resultado de la peticion es 1 o true mostrar una alerta tipo success
                    if (result == 1) {
                        sweetAlert("success", "Perfil actualizado!")
                            .then(success => {
                                showLoad();
                                window.location.reload();
                            });
                    } else {
                        sweetAlert("error", result);
                    }
                });
        })
    }
}



// -------------- Funcion para cambiar la contraseña desde el perfil del usuario --------------

export const changePassword = function () {

    // Obteniendo el formulario de editar contraseña
    const formChangePassword = document.getElementById("form-change-password");

    /* Validando si se encontro o no ese formulario (Esto para evitar que salgan errores en la consola
    Al estar navegando en otra vista de la aplicacion) */
    if (formChangePassword) {

        // Aplicando un evento de envio al formulario para enviar la informacion al router
        formChangePassword.addEventListener("submit", function (event) {

            /* Evitando que se envie el formulario (Para que no se refresque la pagina durante el proceso
            e interrumpa el envio de la informacion) */
            event.preventDefault();
            sweetAlert("loading", "Actualizando contraseña...");

            // Creando un form data para almacenar la informacion de los inputs del formulario html
            const formData = new FormData(formChangePassword);
            formData.append("change-password", true);

            /* Llamando a la funcion makeRequest (Propia mia) para hacer una peticion fetch al router
            y procesar la informacion en el backend */
            makeRequest("routers/users.router.php", "POST", formData)
                .then(result => {

                    // Si el resultado de la peticion es 1 o true mostrar una alerta tipo success
                    if (result == 1) {
                        sweetAlert("success", "Contraseña actualizada!")
                            .then(success => {
                                showLoad();
                                window.location = "http://clinica.com/logout";
                            });
                    } else {
                        sweetAlert("error", result);
                    }
                });
        })
    }
}