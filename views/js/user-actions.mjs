import { sweetAlert } from "./plugins/sweet-alert.mjs";

// -------------- Funcion para mostrar la imagen y validar su tamaño y tipo en el input al editarla en el perfil -------------- 

export const showPicture = function () {

    const inputFile = document.querySelector("input[type='file']");

    if (inputFile) {

        const containerImage = document.getElementById("container-image");

        inputFile.addEventListener("change", function (event) {

            const maxSizeInBytes = 2 * 1024 * 1024; // 2 MB
            const allowedTypes = ['image/jpeg', 'image/png'];

            const file = event.target.files[0];

            if (file) {
                // Verificar el tamaño
                if (file.size > maxSizeInBytes) {
                    sweetAlert("error", `La imagen ${file.name} excede el tamaño máximo permitido (2 MB)`)
                    return;
                }

                // Verificar el tipo
                if (!allowedTypes.includes(file.type)) {
                    sweetAlert("error", `El tipo de archivo de ${file.name} no es válido. Solo se permiten archivos JPEG y PNG.`)
                    return;
                }

                // Mostrar la imagen
                const reader = new FileReader();

                reader.onload = function (e) {
                    containerImage.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        });
    }
}


// -------------- Funcion para abrir una imagen en otra pestaña -------------- 

export const openImage = function () {

    const images = document.querySelectorAll(".image-user");

    if (images.length > 0) {

        images.forEach(image => {

            image.addEventListener("click", function () {
                window.open(image.src);
            });

        });

    }

}