<?php

require_once "connection.php";

class PatientsModel extends Connection
{
    // Crear un paciente

    static public function createPatient($data)
    {
        try {
            $pdo = Connection::connection()->prepare("INSERT INTO patients
            (document_patient, 
            name_patient, 
            lastname_patient, 
            gender_patient,
            password_patient)
            VALUES
            (:document_patient,
            :name_patient, 
            :lastname_patient, 
            :gender_patient, 
            :password_patient)");

            $pdo->bindParam(":document_patient", $data["document"], PDO::PARAM_INT);
            $pdo->bindParam(":name_patient", $data["name"], PDO::PARAM_STR);
            $pdo->bindParam(":lastname_patient", $data["lastname"], PDO::PARAM_STR);
            $pdo->bindParam(":gender_patient", $data["gender"], PDO::PARAM_STR);
            $pdo->bindParam(":password_patient", $data["password"], PDO::PARAM_STR);

            $pdo->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    // Traer pacientes

    static public function viewPatients($column, $value)
    {
        try {
            if ($column !== null) {
                $pdo = Connection::connection()->prepare("SELECT * FROM patients WHERE
                $column = :$column");

                if (is_numeric($value)) {
                    $pdo->bindParam(":$column", $value, PDO::PARAM_INT);
                } else {
                    $pdo->bindParam(":$column", $value, PDO::PARAM_STR);
                }

                $pdo->execute();

                return $pdo->fetch();
            } else {
                $pdo = Connection::connection()->prepare("SELECT * FROM patients");

                $pdo->execute();

                return $pdo->fetchAll();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // Editar un paciente

    static public function editPatient($data)
    {
        try {

            $pdo = Connection::connection()->prepare("UPDATE patients SET
            document_patient = :document_patient,
            name_patient = :name_patient,
            lastname_patient = :lastname_patient,
            gender_patient = :gender_patient
            WHERE
            id_patient = :id_patient");

            $pdo->bindParam(":id_patient", $data["id"], PDO::PARAM_INT);
            $pdo->bindParam(":document_patient", $data["document"], PDO::PARAM_INT);
            $pdo->bindParam(":name_patient", $data["name"], PDO::PARAM_STR);
            $pdo->bindParam(":lastname_patient", $data["lastname"], PDO::PARAM_STR);
            $pdo->bindParam(":gender_patient", $data["gender"], PDO::PARAM_STR);

            $pdo->execute();

            $pdo = null;

            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    // Eliminar paciente

    static public function deletePatient($id)
    {
        try {
            $pdo = Connection::connection()->prepare("DELETE FROM patients WHERE
            id_patient = :id_patient");

            $pdo->bindParam(":id_patient", $id, PDO::PARAM_INT);

            $pdo->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
