<?php

require_once "connection.php";

class DoctorsModel extends Connection
{
    // Crear un doctor

    static public function createDoctor($data)
    {
        try {
            $pdo = Connection::connection()->prepare("INSERT INTO doctors
            (document_doctor, 
            name_doctor, 
            lastname_doctor, 
            gender_doctor,
            password_doctor,
            id_consulting_room_doctor)
            VALUES
            (:document_doctor,
            :name_doctor, 
            :lastname_doctor, 
            :gender_doctor, 
            :password_doctor, 
            :id_consulting_room_doctor)");

            $pdo->bindParam(":document_doctor", $data["document"], PDO::PARAM_INT);
            $pdo->bindParam(":name_doctor", $data["name"], PDO::PARAM_STR);
            $pdo->bindParam(":lastname_doctor", $data["lastname"], PDO::PARAM_STR);
            $pdo->bindParam(":gender_doctor", $data["gender"], PDO::PARAM_STR);
            $pdo->bindParam(":password_doctor", $data["password"], PDO::PARAM_STR);
            $pdo->bindParam(":id_consulting_room_doctor", $data["id-consulting-room"], PDO::PARAM_INT);

            $pdo->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    // Traer doctores

    static public function viewDoctors($column, $value)
    {
        try {

            if ($column !== null) {
                $pdo = Connection::connection()->prepare("SELECT * FROM doctors WHERE
                $column = :$column");

                $pdo->bindParam(":$column", $value, PDO::PARAM_STR);

                $pdo->execute();

                return $pdo->fetch();
            } else {
                $pdo = Connection::connection()->prepare("SELECT * FROM doctors");

                $pdo->execute();

                return $pdo->fetchAll();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // Editar un doctor

    static public function editDoctor($data)
    {
        try {

            $pdo = Connection::connection()->prepare("UPDATE doctors SET
            document_doctor = :document_doctor,
            name_doctor = :name_doctor,
            lastname_doctor = :lastname_doctor,
            gender_doctor = :gender_doctor,
            id_consulting_room_doctor = :id_consulting_room_doctor
            WHERE
            id_doctor = :id_doctor");

            $pdo->bindParam(":id_doctor", $data["id"], PDO::PARAM_INT);
            $pdo->bindParam(":document_doctor", $data["document"], PDO::PARAM_INT);
            $pdo->bindParam(":name_doctor", $data["name"], PDO::PARAM_STR);
            $pdo->bindParam(":lastname_doctor", $data["lastname"], PDO::PARAM_STR);
            $pdo->bindParam(":gender_doctor", $data["gender"], PDO::PARAM_STR);
            $pdo->bindParam(":id_consulting_room_doctor", $data["id-consulting-room"], PDO::PARAM_INT);

            $pdo->execute();

            $pdo = null;

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // Eliminar doctor

    static public function deleteDoctor($id)
    {

        try {
            $pdo = Connection::connection()->prepare("DELETE FROM doctors WHERE
            id_doctor = :id_doctor");

            $pdo->bindParam(":id_doctor", $id, PDO::PARAM_INT);

            $pdo->execute();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
