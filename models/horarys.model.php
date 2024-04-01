<?php

require_once "connection.php";

class HorarysModel
{

    // Insertar horario

    static public function insertHorary($data)
    {
        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "INSERT INTO horarys 
                (date_horary, start_horary, end_horary, times_horary, minutes_range_horary, id_doctor_horary)
                VALUES
                (:date_horary, :start_horary, :end_horary, :times_horary, :minutes_range_horary, :id_doctor_horary)"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":date_horary", $data["date-horary"], PDO::PARAM_STR);
            $statement->bindParam(":start_horary", $data["time-start-horary"], PDO::PARAM_STR);
            $statement->bindParam(":end_horary", $data["time-end-horary"], PDO::PARAM_STR);
            $statement->bindParam(":times_horary", $data["times-horary"], PDO::PARAM_STR);
            $statement->bindParam(":minutes_range_horary", $data["minutes-range-horary"], PDO::PARAM_INT);
            $statement->bindParam(":id_doctor_horary", $data["id-doctor-horary"], PDO::PARAM_INT);

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


    // Obtener los horarios

    static public function getHorarys($orderBy, $orderMode, $select, $column, $value)
    {
        try {

            // Validamos si los parametros column y value vienen o no nulos (Estos parametros son para filtrar por un valor en especifico)
            if ($column != null && $value != null) {

                // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
                $statement = DataBase::connection()->prepare(
                    "SELECT $select FROM horarys
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
                    "SELECT $select FROM horarys
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


    // Actualizar horario

    static public function updateHorary($data)
    {
        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "UPDATE horarys SET 
                times_horary = :times_horary
                WHERE
                id_horary = :id_horary"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":times_horary", $data["times-horary"], PDO::PARAM_STR);
            $statement->bindParam(":id_horary", $data["id-horary"], PDO::PARAM_INT);

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
