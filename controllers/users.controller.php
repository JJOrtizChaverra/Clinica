<?php

class UsersController
{

    public function login($rol)
    {
        if (isset($_POST["login-user"])) {

            if (
                preg_match("/^[0-9]{6,}$/", $_POST["login-user"]) &&
                preg_match("/^[0-9a-zA-Z]{8,}$/", $_POST["login-password"])
            ) {

                if ($rol === "secretary") {

                    $username = $_POST["login-user"];
                    $password = $_POST["login-password"];

                    $data = array(
                        "username" => $username,
                        "password" => $password
                    );


                    $result = UsersModel::login($data);

                    if (!empty($result)) {
                        if (
                            $result["username_user"] === $_POST["login-user"] &&
                            $result["password_user"] === $_POST["login-password"]
                        ) {

                            $_SESSION["login"] = true;

                            $_SESSION["id"] = $result["id_user"];
                            $_SESSION["username"] = $result["username_user"];
                            $_SESSION["name"] = $result["name_user"];
                            $_SESSION["lastname"] = $result["lastname_user"];
                            $_SESSION["displayname"] = $result["name_user"] . " " . $result["lastname_user"];
                            $_SESSION["picture"] = $result["picture_user"];
                            $_SESSION["rol"] = $result["rol_user"];

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
    }


    static public function viewProfile()
    {

        $id = $_SESSION["id"];
        return UsersModel::viewProfile($id);
    }

    public function editProfile($rol)
    {

        if (isset($_POST["profile-id"]) && isset($_POST["profile-name"])) {

            $pathImage = $_POST["current-img"];

            if (empty($pathImage)) {
                $pathImage = null;
            }

            if (isset($_FILES["profile-image"]["tmp_name"]) && !empty($_FILES["profile-image"]["tmp_name"])) {

                if (!empty($_POST["current-img"])) {
                    unlink("views/assets/img/$rol/" . $_POST["current-img"]);
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

            $result = UsersModel::editProfile($data);

            if ($result) {
                
                $_SESSION["picture"] = $pathImage;
                $_SESSION["name"] = $_POST["profile-name"];
                $_SESSION["lastname"] = $_POST["profile-lastname"];

                echo "<script>window.location = '" . Template::path() . "profile'</script>";
            } else {
                echo "<p class='text-red text-center' role='alert'>Error al actualizar la información</p>";
            }
        }
    }

    public function changePassword()
    {
        if(isset($_POST["profile-id"]) && isset($_POST["profile-new-password"])) {
            if (preg_match("/^[0-9a-zA-Z]{8,}$/", $_POST["profile-new-password"])) {

            $data = array(
                "id" => $_SESSION["id"],
                "password" =>  $_POST["profile-new-password"]
            );

            $result = UsersModel::changePassword($data);

            if($result) {
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
