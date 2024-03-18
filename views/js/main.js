const PATH = "http://localhost/Clinica/";

// Funcion para mostrar la imagen en el input al editarla en el perfil
const showPicture = function (event) {
    const containerImage = document.getElementById("container-image");

    const image = event.target.files[0];

    const reader = new FileReader();

    reader.onload = function (e) {
        containerImage.src = e.target.result;
    }

    reader.readAsDataURL(image);
}


// Funcion para abrir la imagen en otra pestaña
const openImage = function (image) {
    window.open(image.src);
}