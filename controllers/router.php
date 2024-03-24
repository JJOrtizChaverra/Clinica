<?php

require_once "controller.php";
require_once "helpers.php";

$controller = new Controller();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // ---------- Iniciar sesion ----------

    if (isset($_POST["document-login"], $_POST["password-login"], $_POST["role-login"])) {


        if (Helpers::validateUserRole($_POST["role-login"])) {

            if (
                preg_match("/^[0-9]{4,}$/", $_POST["document-login"]) &&
                preg_match("/^[0-9a-zA-Z\-_ .,!#&\/()]{4,}$/", $_POST["password-login"])
            ) {

                $controller->login($_POST);
            } else {
                echo "Campos invalidos";
            }
        } else {
            echo "El rol {$_POST["role-login"]} no existe en nuestro sistema";
        }
    }


    // ---------- Editar perfil del usuario ----------

    if (isset($_POST["name-profile"], $_POST["lastname-profile"], $_POST["current-picture-profile"], $_POST["id-profile"]) && $_POST["role-profile"]) {


        if (
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/", $_POST["name-profile"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/", $_POST["lastname-profile"])
        ) {


            $pathImage = $_POST["current-picture-profile"];

            if (isset($_FILES["picture-profile"])) {

                $tmpName = $_FILES["picture-profile"]["tmp_name"];
                $tipoImagen = $_FILES["picture-profile"]["type"];
                $nameImagen = mt_rand(0, 1000);
                $currentImage = $_POST["current-picture-profile"];

                if (isset($tmpName) && !empty($tmpName)) {
                    $deleteImage = Helpers::deleteImage($currentImage, $_POST["role-profile"]);
                    $pathImage = Helpers::createImage($tmpName, $tipoImagen, $nameImagen, $_POST["role-profile"]);
                } else {
                    echo "No se encontro la imagen";
                }
            }

            $_POST["picture-profile"] = $pathImage;

            $controller->editProfileUser($_POST);
        } else {
            echo "Campos invalidos";
        }
    }


    // ---------- Insertar ----------

    if (isset($_POST["insert"])) {

        switch ($_POST["insert"]) {
            case "consulting_room":

                unset($_POST["insert"]);

                if (Helpers::validateFields($_POST, ["name" => "/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]{4,}$/"])) {

                    $noRepeatConsultingRoom = Controller::get("consulting_rooms", "null", "name", $_POST["name"], "name_consulting_room");

                    if (!empty($noRepeatConsultingRoom)) {
                        echo "Ya existe un consultorio con ese nombre";
                        return;
                    }

                    $controller->insert("consulting_rooms", $_POST);
                } else {
                    echo "Campos invalidos";
                }

                break;

            case "doctor":

                unset($_POST["insert"]);

                if (
                    preg_match("/^[0-9]{4,}$/", $_POST["document"]) &&
                    preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/", $_POST["name"]) &&
                    preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/", $_POST["lastname"]) &&
                    preg_match("/^[0-9a-zA-Z\-_ .,!#&\/()]{4,}$/", $_POST["password"]) &&
                    preg_match("/^(Masculino|Femenino)$/", $_POST["gender"])
                ) {

                    $consultingRoomValid = Controller::get("consulting_rooms", "null", "id", $_POST["id_consulting_room"], "id_consulting_room");
                    $noRepeatDocument = Controller::get("doctors", "null", "document", $_POST["document"], "document_doctor");

                    if (empty($consultingRoomValid)) {
                        echo "Ese consultorio no existe en la base de datos";
                        return;
                    }

                    if (!empty($noRepeatDocument)) {
                        echo "Ya existe un doctor con ese documento";
                        return;
                    }

                    $passwordHash = password_hash($_POST["password"], PASSWORD_ARGON2ID);
                    $_POST["password"] = $passwordHash;

                    $controller->insert("doctors", $_POST);
                } else {
                    echo "Campos invalidos";
                }

                break;

            case "patient":

                unset($_POST["insert"]);

                if (
                    preg_match("/^[0-9]{4,}$/", $_POST["document"]) &&
                    preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/", $_POST["name"]) &&
                    preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/", $_POST["lastname"]) &&
                    preg_match("/^[0-9a-zA-Z\-_ .,!#&\/()]{4,}$/", $_POST["password"]) &&
                    preg_match("/^(Masculino|Femenino)$/", $_POST["gender"])
                ) {

                    $noRepeatDocument = Controller::get("patients", "null", "document", $_POST["document"], "document_patient");

                    if (!empty($noRepeatDocument)) {
                        echo "Ya existe un paciente con ese documento";
                        return;
                    }

                    $passwordHash = password_hash($_POST["password"], PASSWORD_ARGON2ID);
                    $_POST["password"] = $passwordHash;

                    $controller->insert("patients", $_POST);
                } else {
                    echo "Campos invalidos";
                }

                break;

            default:
                echo "Tipo de insercion invalida";
                break;
        }
    }




    // ---------- Actualizar ----------

    if (isset($_POST["id"]) && isset($_POST["update"])) {

        if (is_numeric($_POST["id"]) && $_POST["update"] === "consulting_room") {

            $id = (int) $_POST["id"];
            unset($_POST["update"]);
            unset($_POST["id"]);

            if (Helpers::validateFields($_POST, ["name" => "/^[a-zA-Z0-9áéíóúÁÉÍÓÚ ]{4,}$/"])) {

                $controller->update("consulting_rooms", $_POST, $id);
            } else {
                echo "Campos invalidos";
            }
        } else if (is_numeric($_POST["id"]) && $_POST["update"] === "patient") {

            $id = (int) $_POST["id"];
            unset($_POST["update"]);
            unset($_POST["id"]);

            if (
                preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/", $_POST["name"]) &&
                preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/", $_POST["lastname"]) &&
                preg_match("/^[0-9a-zA-Z\-_ .,!#&\/()]{4,}$/", $_POST["password"]) &&
                ($_POST["gender"] === "Masculino" || $_POST["gender"] === "Femenino")
            ) {

                $passwordHash = password_hash($_POST["password"], PASSWORD_ARGON2ID);
                $_POST["password"] = $passwordHash;

                $controller->update("patients", $_POST, $id);
            } else {
                echo "Campos invalidos";
            }
        } else if (is_numeric($_POST["id"]) && $_POST["update"] === "doctor") {

            $id = (int) $_POST["id"];
            unset($_POST["update"]);
            unset($_POST["id"]);

            $consultingRoomValid = Controller::get("id", $_POST["id_consulting_room"], "id_consulting_room", "consulting_rooms", null);

            if (
                preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/", $_POST["name"]) &&
                preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,}$/", $_POST["lastname"]) &&
                preg_match("/^[0-9a-zA-Z\-_ .,!#&\/()]{4,}$/", $_POST["password"]) &&
                ($_POST["gender"] === "Masculino" || $_POST["gender"] === "Femenino") &&
                !empty($consultingRoomValid)
            ) {

                $passwordHash = password_hash($_POST["password"], PASSWORD_ARGON2ID);
                $_POST["password"] = $passwordHash;

                $controller->update("doctors", $_POST, $id);
            } else {
                echo "Campos invalidos";
            }
        }
    }


    // ---------- Eliminar ----------

    if (isset($_POST["id"]) && isset($_POST["delete"])) {

        if (
            is_numeric($_POST["id"]) &&
            ($_POST["delete"] === "consulting_room" || $_POST["delete"] === "doctor" || $_POST["delete"] === "patient")
        ) {
            $controller->delete($_POST["delete"] . "s", (int) $_POST["id"]);
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] === "GET") {

    if (isset($_GET["table-1"], $_GET["table-2"], $_GET["column"], $_GET["value"], $_GET["select"])) {
        echo json_encode($controller->get($_GET["table-1"], $_GET["table-2"], $_GET["column"], $_GET["value"], $_GET["select"]));
    }
}
