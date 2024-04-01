<?php

require_once "../controllers/doctors.controller.php";
require_once "../models/doctors.model.php";

$controller = new DoctorsController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Insertar doctor

    if (isset(
        $_POST["insert"],
        $_POST["document-doctor"],
        $_POST["name-doctor"],
        $_POST["lastname-doctor"],
        $_POST["gender-doctor"],
        $_POST["password-doctor"],
        $_POST["id-consulting-room-doctor"]
    )) {
        $controller->insertDoctor();
        return;
    }


    // Actualizar doctor    

    if (isset(
        $_POST["update"],
        $_POST["id-doctor"],
        $_POST["name-doctor"],
        $_POST["lastname-doctor"],
        $_POST["gender-doctor"],
        $_POST["id-consulting-room-doctor"]
    )) {
        $controller->updateDoctor();
        return;
    }


    // Eliminar doctor
    
    if (isset($_POST["delete"], $_POST["id-doctor"])) {
        $controller->deleteDoctor();
        return;
    }

    echo "Campos incompletos";
}


if ($_SERVER["REQUEST_METHOD"] === "GET") {

    // Obtener doctores

    if (isset(
        $_GET["orderBy"],
        $_GET["orderMode"],
        $_GET["select"],
        $_GET["column"],
        $_GET["value"]
    )) {
        echo json_encode($controller::getDoctors($_GET["orderBy"], $_GET["orderMode"], $_GET["select"], $_GET["column"], $_GET["value"]));
        return;
    }
}
