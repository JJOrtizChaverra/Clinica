<?php

require_once "connection.php";

class ConsultingRoomsModel
{
    // Insertar consultorio

    static public function insertConsultingRoom($data)
    {
        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "INSERT INTO consulting_rooms 
                (name_consulting_room)
                VALUES
                (:name_consulting_room)"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":name_consulting_room", $data["name-consulting-room"], PDO::PARAM_STR);

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


    // Obtener consultorios

    static public function getConsultingRooms($orderBy, $orderMode, $select, $column, $value)
    {
        try {

            // Validamos si los parametros column y value vienen o no nulos (Estos parametros son para filtrar por un valor en especifico)
            if ($column != null && $value != null) {

                // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
                $statement = DataBase::connection()->prepare(
                    "SELECT $select FROM consulting_rooms
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
                    "SELECT $select FROM consulting_rooms
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


    // Actualizar consultorio

    static public function updateConsultingRoom($data)
    {

        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "UPDATE consulting_rooms SET
                name_consulting_room = :name_consulting_room
                WHERE
                id_consulting_room = :id_consulting_room"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":name_consulting_room", $data["name-consulting-room"], PDO::PARAM_STR);
            $statement->bindParam(":id_consulting_room", $data["id-consulting-room"], PDO::PARAM_INT);

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


    // Eliminar consultorio

    static public function deleteConsultingRoom($idConsultingRoom)
    {

        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "DELETE FROM consulting_rooms WHERE id_consulting_room = :id_consulting_room"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":id_consulting_room", $idConsultingRoom, PDO::PARAM_INT);

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
