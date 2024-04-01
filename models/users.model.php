<?php

require_once "connection.php";

class UsersModel
{

    // Iniciar sesion
    static public function login($data)
    {
        try {

            // Preparando a consulta y buscando al usuario por el documento
            $statement = DataBase::connection()->prepare(
                "SELECT * FROM {$data["role"]}s
                WHERE document_{$data["role"]} = :document_{$data["role"]}"
            );

            // Enlazando el parametro del documento
            $statement->bindParam(":document_{$data["role"]}", $data["document"], PDO::PARAM_INT);

            // Ejecutando la consulta
            $statement->execute();

            // Devolver ya sea el usuario encontrado o un array vacio en caso de no encontrarlo
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            // En caso de error devolver el mensaje de error
            return $e->getMessage();
        }
    }


    // Editar perfil

    static public function editProfile($data)
    {
        try {

            // Preparando a consulta y buscando al usuario por el documento
            $statement = DataBase::connection()->prepare(
                "UPDATE {$data["role-profile"]}s SET
                name_{$data["role-profile"]} = :name_{$data["role-profile"]},
                lastname_{$data["role-profile"]} = :lastname_{$data["role-profile"]},
                picture_{$data["role-profile"]} = :picture_{$data["role-profile"]}
                WHERE 
                id_{$data["role-profile"]} = :id_{$data["role-profile"]}"
            );

            // Enlazando el parametro del documento
            $statement->bindParam(":name_{$data["role-profile"]}", $data["name-profile"], PDO::PARAM_STR);
            $statement->bindParam(":lastname_{$data["role-profile"]}", $data["lastname-profile"], PDO::PARAM_STR);
            $statement->bindParam(":picture_{$data["role-profile"]}", $data["picture-profile"], PDO::PARAM_STR);
            $statement->bindParam(":id_{$data["role-profile"]}", $data["id-profile"], PDO::PARAM_INT);

            // Ejecutando la consulta
            $statement->execute();

            // Devolver un true si la consulta se hizo satisfactoriamente
            return true;
        } catch (Exception $e) {
            // En caso de error devolver un false
            return false;
        }
    }


    // Cambiar contraseña

    static public function changePassword($data)
    {
        try {

            // Preparando a consulta y buscando al usuario por el documento
            $statement = DataBase::connection()->prepare(
                "UPDATE {$data["role-profile"]}s SET
                password_{$data["role-profile"]} = :password_{$data["role-profile"]}
                WHERE 
                id_{$data["role-profile"]} = :id_{$data["role-profile"]}"
            );

            // Enlazando el parametro del documento
            $statement->bindParam(":password_{$data["role-profile"]}", $data["password-profile"], PDO::PARAM_STR);
            $statement->bindParam(":id_{$data["role-profile"]}", $data["id-profile"], PDO::PARAM_INT);

            // Ejecutando la consulta
            $statement->execute();

            // Devolver un true si la consulta se hizo satisfactoriamente
            return true;
        } catch (Exception $e) {
            // En caso de error devolver un false
            return false;
        }
    }


    // Obtener un usuario segun su rol

    static public function getUser($role, $column, $value, $select)
    {
        try {

            // Preparando a consulta y buscando al usuario por el documento
            $statement = DataBase::connection()->prepare(
                "SELECT $select FROM {$role}s
                WHERE $column = :$column"
            );

            // Enlazando el parametro del documento
            
            if(is_numeric($value)) {
                $statement->bindParam(":$column", $value, PDO::PARAM_INT);
            } else {
                $statement->bindParam(":$column", $value, PDO::PARAM_STR);
            }

            // Ejecutando la consulta
            $statement->execute();

            // Devolver un true si la consulta se hizo satisfactoriamente
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            // En caso de error devolver un false
            return $e->getMessage();
        }
    }
}
