// -------------- Funcion para el login de usuarios -------------- 

import { createFields } from "./form-utils.mjs";
import { showLoad, hideLoad } from "./loading.mjs";
import { badgeAlert } from "./alert.mjs";
import { makeRequest } from "./request.mjs";

export const login = function () {

    const formLogin = document.querySelector("#form-login");

    if (formLogin) {

        formLogin.addEventListener("submit", function (event) {

            event.preventDefault();
            showLoad();

            const data = createFields(formLogin);

            makeRequest("controllers/router.php", "POST", data)
                .then(result => {

                    if (result == 1) {
                        window.location = "home";
                    } else {
                        hideLoad();
                        badgeAlert(result, "error", `alert-login`);
                    }
                });
        });
    }
}


// -------------- Funcion para insertar un registro en la base de datos -------------- 

export const editProfileUser = function () {

    const formEditProfile = document.querySelector("#form-edit-profile");

    if (formEditProfile) {

        formEditProfile.addEventListener("submit", function (event) {

            event.preventDefault();
            showLoad();

            const data = createFields(formEditProfile);

            makeRequest("controllers/router.php", "POST", data)
                .then(result => {

                    console.log(result);

                    if (result == 1) {
                        window.location = window.location.href;
                    } else {
                        hideLoad();
                        badgeAlert(result, "error", `alert-edit-profile`);
                    }
                });
        })
    }
}


// -------------- Funcion para mostrar la imagen en el input al editarla en el perfil -------------- 

export const showPicture = function () {

    const inputFile = document.querySelector("input[type='file']");
    const containerImage = document.getElementById("container-image");

    if (inputFile) {
        inputFile.addEventListener("change", function (event) {

            const image = event.target.files[0];

            const reader = new FileReader();

            reader.onload = function (e) {
                containerImage.src = e.target.result;
            }

            reader.readAsDataURL(image);
        });
    }
}


// -------------- Funcion para abrir una imagen en otra pestaña -------------- 

export const openImage = function (image) {
    window.open(image.src);
}

