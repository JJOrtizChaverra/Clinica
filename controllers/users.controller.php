<?php

require_once "models/users.model.php";

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


    static public function viewProfile() {
        
        $id = $_SESSION["id"];
        return UsersModel::viewProfile($id);

        
    }
}
