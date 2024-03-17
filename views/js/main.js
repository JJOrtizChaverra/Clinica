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


// Funcion para cargar la informacion del consultorio a editar en cada uno de los campos
const editConsultingRoom = function (id, row) {

    const tableConsultingRooms = document.getElementById("table-consulting-rooms");
    const inputIdConsultingRooms = document.getElementById("id-consulting-room");
    const inputNameConsultingRoom = document.getElementById("name-consulting-room");

    inputNameConsultingRoom.value = tableConsultingRooms.rows[row].cells[1].textContent;
    inputIdConsultingRooms.value = id;
};