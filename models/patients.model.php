<?php

require_once "connection.php";

class PatientsModel
{

    // Insertar paciente

    static public function insertPatient($data)
    {
        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "INSERT INTO patients 
                (document_patient, name_patient, lastname_patient, gender_patient, password_patient)
                VALUES
                (:document_patient, :name_patient, :lastname_patient, :gender_patient, :password_patient)"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":document_patient", $data["document-patient"], PDO::PARAM_INT);
            $statement->bindParam(":name_patient", $data["name-patient"], PDO::PARAM_STR);
            $statement->bindParam(":lastname_patient", $data["lastname-patient"], PDO::PARAM_STR);
            $statement->bindParam(":gender_patient", $data["gender-patient"], PDO::PARAM_STR);
            $statement->bindParam(":password_patient", $data["password-patient"], PDO::PARAM_STR);

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


    // Obtener los pacientes

    static public function getPatients($orderBy, $orderMode, $select, $column, $value)
    {
        try {

            // Validamos si los parametros column y value vienen o no nulos (Estos parametros son para filtrar por un valor en especifico)
            if ($column != null && $value != null) {

                // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
                $statement = DataBase::connection()->prepare(
                    "SELECT $select FROM patients                    
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
                    "SELECT $select FROM patients
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


    // Actualizar paciente

    static public function updatePatient($data)
    {
        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "UPDATE patients SET
                name_patient = :name_patient,
                lastname_patient = :lastname_patient,
                gender_patient = :gender_patient
                WHERE
                id_patient = :id_patient"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":name_patient", $data["name-patient"], PDO::PARAM_STR);
            $statement->bindParam(":lastname_patient", $data["lastname-patient"], PDO::PARAM_STR);
            $statement->bindParam(":gender_patient", $data["gender-patient"], PDO::PARAM_STR);
            $statement->bindParam(":id_patient", $data["id-patient"], PDO::PARAM_INT);

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


    // Eliminar paciente

    static public function deletePatient($idPatient)
    {

        try {
            // Instanciando de la clase DataBase del archivo de conexion y preparando la consulta SQL
            $statement = DataBase::connection()->prepare(
                "DELETE FROM patients WHERE id_patient = :id_patient"
            );

            // Enlazando los parametros asignados a la SQL
            $statement->bindParam(":id_patient", $idPatient, PDO::PARAM_INT);

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
