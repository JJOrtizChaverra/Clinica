<?php

require_once "../controllers/secretarys.controller.php";
require_once "../models/secretarys.model.php";

$controller = new SecretarysController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Insertar secretaria

    if (isset(
        $_POST["insert"],
        $_POST["document-secretary"],
        $_POST["name-secretary"],
        $_POST["lastname-secretary"],
        $_POST["password-secretary"]
    )) {
        $controller->insertSecretary();
        return;
    }


    // Actualizar secretaria

    if (isset(
        $_POST["update"],
        $_POST["id-secretary"],
        $_POST["name-secretary"],
        $_POST["lastname-secretary"]
    )) {
        $controller->updateSecretary();
        return;
    }


    // Eliminar secretaria
    
    if (isset($_POST["delete"], $_POST["id-secretary"])) {
        $controller->deleteSecretary();
        return;
    }

    echo "Campos incompletos";
}