<?php

class UsersController
{

    public function login($rol)
    {
        if (isset($_POST["login-document"]) && isset($_POST["login-password"])) {

            if (
                preg_match("/^[0-9]{6,}$/", $_POST["login-document"]) &&
                preg_match("/^[0-9a-zA-Z]{8,}$/", $_POST["login-password"])
            ) {

                $data = array(
                    "document" => (int) $_POST["login-document"],
                    "password" => $_POST["login-password"]
                );


                $result = UsersModel::login($rol, $data);

                if (!empty($result)) {
                    if (
                        $result["document_$rol"] === $_POST["login-document"] &&
                        $result["password_$rol"] === $_POST["login-password"]
                    ) {

                        $_SESSION["login"] = true;

                        $_SESSION["id"] = $result["id_$rol"];
                        $_SESSION["document"] = $result["document_$rol"];
                        $_SESSION["name"] = $result["name_$rol"];
                        $_SESSION["lastname"] = $result["lastname_$rol"];
                        $_SESSION["displayname"] = $result["name_$rol"] . " " . $result["lastname_$rol"];
                        $_SESSION["picture"] = $result["picture_$rol"];
                        $_SESSION["rol"] = $result["rol_$rol"];

                        echo "<script>window.location = 'home'</script>";
                    } else {
                        echo "<p class='text-red text-center' role='alert'>Contraseña incorrecta</p>";
                    }
                } else {
                    echo "<p class='text-red text-center' role='alert'>Usuario incorrecto</p>";
                }
            }
        }
    }


    // static public function viewProfile()
    // {

    //     $id = $_SESSION["id"];
    //     return UsersModel::viewProfile($id);
    // }

    public function editProfile($rol)
    {

        if (
            isset($_GET["id"]) &&
            isset($_POST["profile-name"]) &&
            isset($_POST["profile-lastname"])
        ) {

            $pathImage = $_POST["current-image"];

            if (empty($pathImage)) {
                $pathImage = null;
            }

            if (isset($_FILES["profile-image"]["tmp_name"]) && !empty($_FILES["profile-image"]["tmp_name"])) {

                if (!empty($_POST["current-image"])) {
                    unlink("views/assets/img/$rol/" . $_POST["current-image"]);
                }
            }

            if ($_FILES["profile-image"]["type"] === "image/jpeg") {

                $nameImage = mt_rand(10, 99);
                $pathImage = "s-" . $nameImage . ".jpg";

                $image = imagecreatefromjpeg($_FILES["profile-image"]["tmp_name"]);

                imagejpeg($image, "views/assets/img/$rol/$pathImage");
            }

            if ($_FILES["profile-image"]["type"] === "image/png") {

                $nameImage = mt_rand(10, 99);
                $pathImage = "s-" . $nameImage . ".jpg";

                $image = imagecreatefrompng($_FILES["profile-image"]["tmp_name"]);

                imagepng($image, "views/assets/img/$rol/$pathImage");
            }

            $data = array(
                "id" => $_SESSION["id"],
                "name" => $_POST["profile-name"],
                "lastname" => $_POST["profile-lastname"],
                "picture" => $pathImage
            );

            $result = UsersModel::editProfile($rol, $data);

            if ($result) {

                $_SESSION["picture"] = $pathImage;
                $_SESSION["name"] = $_POST["profile-name"];
                $_SESSION["lastname"] = $_POST["profile-lastname"];
                $_SESSION["displayname"] = $_POST["profile-name"] . " " . $_POST["profile-lastname"];

                echo "<script>window.location = '" . Template::path() . "profile'</script>";
            } else {
                echo "<p class='text-red text-center' role='alert'>Error al actualizar la información</p>";
            }
        }
    }

    public function changePassword($rol)
    {
        if (isset($_GET["id"]) && isset($_POST["profile-new-password"])) {
            if (preg_match("/^[0-9a-zA-Z]{8,}$/", $_POST["profile-new-password"])) {

                $data = array(
                    "id" => $_SESSION["id"],
                    "password" =>  $_POST["profile-new-password"]
                );

                $result = UsersModel::changePassword($rol, $data);

                if ($result) {
                    echo "<script>window.location = '" . Template::path() . "profile'</script>";
                } else {
                    echo "<p class='text-red text-center' role='alert'>Error al cambiar la contraseña</p>";
                }
            } else {
                echo "<p class='text-red text-center' role='alert'>Contraseña no valida</p>";
            }
        }
    }
}
