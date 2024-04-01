<?php

class UsersController
{

    // Iniciar sesion

    public function login()
    {
        // Validando los campos del formulario
        if (
            $_POST["login"] == true &&
            preg_match("/^[0-9]{6,14}$/", $_POST["document-login"]) &&
            preg_match("/^[0-9a-zA-Z\-_ .,!#&\/()]{6,}$/", $_POST["password-login"]) &&
            preg_match("/\b(secretary|doctor|patient|admin)\b/", $_POST["role-login"])
        ) {

            $role = $_POST["role-login"];

            // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
            $data = array(
                "document" => (int) $_POST["document-login"],
                "role" => $role
            );

            // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
            $result = UsersModel::login($data);

            if ($result) {

                // Si el resultado trae algo, validamos que los campos de documento y contraseña sean exactamente iguales
                if (
                    $result["document_$role"] == $_POST["document-login"] &&
                    // $result["password_$role"] == $_POST["password-login"]
                    password_verify($_POST["password-login"], $result["password_$role"])
                ) {

                    // Iniciando la sesion y declarando algunas variables que utilizamos en algunas vistas por ejemplo la del perfil de usuario
                    session_start();

                    $_SESSION["login"] = true;

                    $_SESSION["id"] = $result["id_$role"];
                    $_SESSION["document"] = $result["document_$role"];
                    $_SESSION["name"] = $result["name_$role"];
                    $_SESSION["lastname"] = $result["lastname_$role"];
                    $_SESSION["displayname"] = $result["name_$role"] . " " . $result["lastname_$role"];
                    $_SESSION["picture"] = $result["picture_$role"];
                    $_SESSION["role"] = $result["role_$role"];

                    echo true;
                } else {
                    echo "Contraseña incorrecta";
                }
            } else {
                echo "Documento incorrecto";
            }
        } else {
            echo "Campos invalidos";
        }
    }


    // Editar perfil

    public function editProfile()
    {
        session_start();

        if (
            $_POST["edit"] == true &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["name-profile"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["lastname-profile"]) &&
            preg_match("/\b(secretary|doctor|patient|admin)\b/", $_POST["role-profile"]) &&
            $_SESSION["role"] == $_POST["role-profile"] &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-profile"]) &&
            $_SESSION["id"] == $_POST["id-profile"]
        ) {

            $pathImage = $_POST["current-picture-profile"];

            if(empty($pathImage)) {
                $pathImage = null;
            }

            if (isset($_FILES["picture-profile"]) && !empty($_FILES["picture-profile"]["tmp_name"])) {

                $tmpName = $_FILES["picture-profile"]["tmp_name"];
                $tipoImagen = $_FILES["picture-profile"]["type"];
                $nameImagen = mt_rand(0, 1000);
                $currentImage = $_POST["current-picture-profile"];

                $helpersController = new HelpersController();
                $helpersController->deleteImage($currentImage, $_POST["role-profile"]);

                $pathImage = HelpersController::createImage($tmpName, $tipoImagen, $nameImagen, $_POST["role-profile"]);
            }

            $data = array(
                "id-profile" => $_POST["id-profile"],
                "role-profile" => $_POST["role-profile"],
                "name-profile" => $_POST["name-profile"],
                "lastname-profile" => $_POST["lastname-profile"],
                "picture-profile" => $pathImage
            );

            $result = UsersModel::editProfile($data);

            if($result === true) {

                $_SESSION["name"] = $_POST["name-profile"];
                $_SESSION["lastname"] = $_POST["lastname-profile"];
                $_SESSION["displayname"] = $_POST["name-profile"]." ".$_POST["lastname-profile"];
                $_SESSION["picture"] = $pathImage;

                echo true;
            } else {
                echo "No se pudo actualizar el perfil";
            }
        } else {
            echo "Campos invalidos";
        }
    }


    // Cambiar contraseña

    public function changePassword()
    {

        session_start();

        // Validando los campos del formulario
        if (
            $_POST["change-password"] == true &&
            preg_match("/^[0-9a-zA-Z\-_ .,!#&\/()]{6,}$/", $_POST["password-profile"])
        ) {

            // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
            $data = array(
                "id-profile" => (int) $_SESSION["id"],
                "password-profile" => password_hash($_POST["password-profile"], PASSWORD_ARGON2ID), // Hasheando la nueva contraseña
                "role-profile" => $_SESSION["role"]
            );

            // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
            $result = UsersModel::changePassword($data);

            if ($result) {
                echo true;
            } else {
                echo "No se pudo actualizar la contraseña";
            }
        } else {
            echo "Campos invalidos";
        }
    }


    // Metodo para obtener un usuario segun su rol

    static public function getUser($role, $column, $value, $select) {
        return UsersModel::getUser($role, $column, $value, $select);
    }
}
