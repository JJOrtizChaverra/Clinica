<?php

require_once "../controllers/patients.controller.php";
require_once "../models/patients.model.php";

$controller = new PatientsController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Insertar paciente

    if (isset(
        $_POST["insert"],
        $_POST["document-patient"],
        $_POST["name-patient"],
        $_POST["lastname-patient"],
        $_POST["gender-patient"],
        $_POST["password-patient"]
    )) {
        $controller->insertPatient();
        return;
    }


    // Actualizar paciente    

    if (isset(
        $_POST["update"],
        $_POST["id-patient"],
        $_POST["name-patient"],
        $_POST["lastname-patient"],
        $_POST["gender-patient"]
    )) {
        $controller->updatePatient();
        return;
    }


    // Eliminar paciente

    if (isset($_POST["delete"], $_POST["id-patient"])) {
        $controller->deletePatient();
        return;
    }


    echo "Campos incompletos";
}
