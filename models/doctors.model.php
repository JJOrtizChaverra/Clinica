<?php

require_once "connection.php";

class DoctorsModel
{

    // Insertar doctor

    static public function insertDoctor($data)
    {
        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "INSERT INTO doctors 
                (document_doctor, name_doctor, lastname_doctor, gender_doctor, password_doctor, id_consulting_room_doctor)
                VALUES
                (:document_doctor, :name_doctor, :lastname_doctor, :gender_doctor, :password_doctor, :id_consulting_room_doctor)"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":document_doctor", $data["document-doctor"], PDO::PARAM_INT);
            $statement->bindParam(":name_doctor", $data["name-doctor"], PDO::PARAM_STR);
            $statement->bindParam(":lastname_doctor", $data["lastname-doctor"], PDO::PARAM_STR);
            $statement->bindParam(":gender_doctor", $data["gender-doctor"], PDO::PARAM_STR);
            $statement->bindParam(":password_doctor", $data["password-doctor"], PDO::PARAM_STR);
            $statement->bindParam(":id_consulting_room_doctor", $data["id-consulting-room-doctor"], PDO::PARAM_INT);

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


    // Obtener los doctores

    static public function getDoctors($orderBy, $orderMode, $select, $column, $value)
    {
        try {

            // Validamos si los parametros column y value vienen o no nulos (Estos parametros son para filtrar por un valor en especifico)
            if ($column != null && $value != null) {

                // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
                $statement = DataBase::connection()->prepare(
                    "SELECT $select FROM doctors
                    INNER JOIN consulting_rooms ON
                    doctors.id_consulting_room_doctor = consulting_rooms.id_consulting_room
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
                    "SELECT $select FROM doctors
                    INNER JOIN consulting_rooms ON
                    doctors.id_consulting_room_doctor = consulting_rooms.id_consulting_room
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


    // Actualizar doctor

    // Insertar doctor

    static public function updateDoctor($data)
    {
        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "UPDATE doctors SET
                name_doctor = :name_doctor,
                lastname_doctor = :lastname_doctor,
                gender_doctor = :gender_doctor,
                id_consulting_room_doctor = :id_consulting_room_doctor
                WHERE
                id_doctor = :id_doctor"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":name_doctor", $data["name-doctor"], PDO::PARAM_STR);
            $statement->bindParam(":lastname_doctor", $data["lastname-doctor"], PDO::PARAM_STR);
            $statement->bindParam(":gender_doctor", $data["gender-doctor"], PDO::PARAM_STR);
            $statement->bindParam(":id_consulting_room_doctor", $data["id-consulting-room-doctor"], PDO::PARAM_INT);
            $statement->bindParam(":id_doctor", $data["id-doctor"], PDO::PARAM_INT);

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


    // Eliminar doctor

    static public function deleteDoctor($idDoctor)
    {

        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "DELETE FROM doctors WHERE id_doctor = :id_doctor"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":id_doctor", $idDoctor, PDO::PARAM_INT);

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
