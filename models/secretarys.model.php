<?php

require_once "connection.php";

class SecretarysModel
{

    // Insertar secretaria

    static public function insertSecretary($data)
    {
        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "INSERT INTO secretarys 
                (document_secretary, name_secretary, lastname_secretary, password_secretary)
                VALUES
                (:document_secretary, :name_secretary, :lastname_secretary, :password_secretary)"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":document_secretary", $data["document-secretary"], PDO::PARAM_INT);
            $statement->bindParam(":name_secretary", $data["name-secretary"], PDO::PARAM_STR);
            $statement->bindParam(":lastname_secretary", $data["lastname-secretary"], PDO::PARAM_STR);
            $statement->bindParam(":password_secretary", $data["password-secretary"], PDO::PARAM_STR);

            // Ejecutando la consulta
            $statement->execute();

            // Si la consulta se hizo satisfactoriamente vaciar la conexion
            $statement = null;

            // Retornando un true validando que la consulta se hizo sin problemas
            return true;
        } catch (Exception $e) {

            // En caso de error se retorna false
            return false;
        }
    }


    // Obtener las secretarias

    static public function getSecretarys($orderBy, $orderMode, $select, $column, $value)
    {
        try {

            // Validamos si los parametros column y value vienen o no nulos (Estos parametros son para filtrar por un valor en especifico)
            if ($column != null && $value != null) {

                // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
                $statement = DataBase::connection()->prepare(
                    "SELECT $select FROM secretarys
                    WHERE $column = :$column
                    ORDER BY $orderBy $orderMode"
                );

                // Validando si el valor del parametro es numerico o no, esto para evitar errores con el tipo de dato al enlazar el parametro
                if (is_numeric($value)) {
                    $statement->bindParam(":$column", $value, PDO::PARAM_INT);
                } else {
                    $statement->bindParam(":$column", $value, PDO::PARAM_STR);
                }
            } else {

                // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
                $statement = DataBase::connection()->prepare(
                    "SELECT $select FROM secretarys
                    ORDER BY $orderBy $orderMode"
                );
            }

            // Ejecutando la consulta
            $statement->execute();

            // Retornando un fetchAll con los indices asociados a los nombres de las columnas de la tabla
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {

            // En caso de error se retorna el mensaje del error para manejarlo
            return $e->getMessage();
        }
    }


    // Actualizar secretaria

    static public function updateSecretary($data)
    {
        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "UPDATE secretarys SET
                name_secretary = :name_secretary,
                lastname_secretary = :lastname_secretary
                WHERE
                id_secretary = :id_secretary"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":name_secretary", $data["name-secretary"], PDO::PARAM_STR);
            $statement->bindParam(":lastname_secretary", $data["lastname-secretary"], PDO::PARAM_STR);
            $statement->bindParam(":id_secretary", $data["id-secretary"], PDO::PARAM_INT);

            // Ejecutando la consulta
            $statement->execute();

            // Si la consulta se hizo satisfactoriamente vaciar la conexion
            $statement = null;

            // Retornando un true validando que la consulta se hizo sin problemas
            return true;
        } catch (Exception $e) {

            // En caso de error se retorna false
            return false;
        }
    }


    // Eliminar secretaria

    static public function deleteSecretary($idSecretary)
    {

        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "DELETE FROM secretarys WHERE id_secretary = :id_secretary"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":id_secretary", $idSecretary, PDO::PARAM_INT);

            // Ejecutando la consulta
            $statement->execute();

            // Si la consulta se hizo satisfactoriamente vaciar la conexion
            $statement = null;

            // Retornando un true validando que la consulta se hizo sin problemas
            return true;
        } catch (Exception $e) {

            // En caso de error se retorna false
            return false;
        }
    }
}
