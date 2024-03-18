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


// Funcion para data table
const dataTable = (function () {

    $(".data-table").DataTable({

        "language": {
            "sSearch": "Buscar:",
            "sEmptyTable": "No hay datos",
            "sZeroRecords": "No se encontraron resultados",
            "sInfo": "Mostrando registros de _START_ al _END_ en un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros de 0 al 0 en un total de 0 ",
            "sInfoFiltered": "(Filtrando de un total de _MAX_ registros)",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Ultimo",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "sLoadingRecords": "Cargando...",
            "sLengthMenu": "Mostrar _MENU_ registros"
        }
    });
})();