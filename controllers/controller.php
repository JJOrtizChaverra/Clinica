<?php

require_once "model.php";

class Controller
{

    // ---------- Iniciar sesion ----------

    public function login($data)
    {
        $result = Model::login($data);

        if (!empty($result)) {

            $role = $data["role-login"];

            if (
                $result["document_$role"] == $_POST["document-login"] &&
                $_POST["password-login"] == $result["password_$role"]
            ) {

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
    }


    // ---------- Editar perfil del usuario ----------

    public function editProfileUser($data)
    {

        $result = Model::editProfileUser($data);

        if ($result) {

            session_start();

            $_SESSION["picture"] = $data["picture-profile"];
            $_SESSION["name"] = $data["name-profile"];
            $_SESSION["lastname"] = $data["lastname-profile"];
            $_SESSION["displayname"] = $data["name-profile"] . " " . $data["lastname-profile"];

            echo true;
        } else {
            echo "Error al actualizar la informacion";
        }
    }

    // ---------- Insertar ----------
    public function insert($table, $data)
    {
        echo Model::register($table, $data);
    }


    // ---------- Obtener ----------
    static public function get($column, $value, $select, $table1, $table2)
    {
        return Model::get($column, $value, $select, $table1, $table2);
    }


    // ---------- Actualizar ----------
    public function update($table, $datos, $id)
    {
        echo Model::update($table, $datos, $id);
    }


    // ---------- Eliminar ----------
    public function delete($table, $id)
    {
        echo Model::delete($table, $id);
    }
}
