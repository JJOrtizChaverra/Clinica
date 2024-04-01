<?php

require_once "../controllers/helpers.controller.php";
require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

$controller = new UsersController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Iniciar sesion

    if (isset($_POST["login"], $_POST["document-login"], $_POST["password-login"], $_POST["role-login"])) {
        $controller->login();
        return;
    }


    // Editar perfil

    if(isset($_POST["edit"], $_POST["name-profile"], $_POST["lastname-profile"], $_POST["current-picture-profile"], $_POST["id-profile"]) && $_POST["role-profile"]) {
        $controller->editProfile();
        return;
    }


    // Cambiar contraseña

    if(isset($_POST["change-password"], $_POST["password-profile"])) {
        $controller->changePassword();
        return;
    }


    echo "Campos incompletos";
}



if ($_SERVER["REQUEST_METHOD"] === "GET") {

    // Obtener doctores

    if (isset(
        $_GET["role"], 
        $_GET["column"],
        $_GET["value"],
        $_GET["select"]
    )) {
        echo json_encode($controller::getUser($_GET["role"], $_GET["column"], $_GET["value"], $_GET["select"]));
        return;
    }
}
