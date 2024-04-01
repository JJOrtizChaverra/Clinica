<?php

require_once "../controllers/consulting-rooms.controller.php";
require_once "../models/consulting-rooms.model.php";

$controller = new ConsultingRoomsController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Insertar consultorios

    if (isset($_POST["insert"], $_POST["name-consulting-room"])) {
        $controller->insertConsultingRoom();
        return;
    }


    // Actualizar consultorio

    if(isset($_POST["update"], $_POST["id-consulting-room"], $_POST["name-consulting-room"])) {
        $controller->updateConsultingRoom();
        return;
    }


    // Eliminar consultorio
    if(isset($_POST["delete"], $_POST["id-consulting-room"])) {
        $controller->deleteConsultingRoom();
        return;
    }

    echo "Campos incompletos";
}