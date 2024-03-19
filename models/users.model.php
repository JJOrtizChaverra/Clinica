<?php

require_once "connection.php";

class UsersModel extends Connection
{

    static public function login($rol, $data)
    {

        try {
            $pdo = Connection::connection()->prepare("SELECT * FROM $rol" . "s" . " WHERE document_$rol = :document_$rol");

            $pdo->bindParam(":document_$rol", $data["document"], PDO::PARAM_INT);

            $pdo->execute();

            return $pdo->fetch();

            // $pdo->close();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    static public function viewProfile($rol, $id)
    {
        try {
            $pdo = Connection::connection()->prepare("SELECT * FROM $rol" . "s" . " WHERE id_$rol = :id_$rol");

            $pdo->bindParam(":id_$rol", $id, PDO::PARAM_INT);

            $pdo->execute();

            return $pdo->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    static public function editProfile($rol, $data)
    {
        try {

            $pdo = Connection::connection()->prepare("UPDATE $rol" . "s" . " SET
            name_$rol = :name_$rol, 
            lastname_$rol = :lastname_$rol,
            picture_$rol = :picture_$rol
            WHERE
            id_$rol = :id_$rol");

            $pdo->bindParam(":id_$rol", $data["id"], PDO::PARAM_INT);
            $pdo->bindParam(":name_$rol", $data["name"], PDO::PARAM_STR);
            $pdo->bindParam(":lastname_$rol", $data["lastname"], PDO::PARAM_STR);
            $pdo->bindParam(":picture_$rol", $data["picture"], PDO::PARAM_STR);

            $pdo->execute();

            $pdo = null;

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static public function changePassword($rol, $data)
    {
        try {

            $pdo = Connection::connection()->prepare("UPDATE $rol" . "s" . " SET
            password_$rol = :password_$rol
            WHERE
            id_$rol = :id_$rol");

            $pdo->bindParam(":id_$rol", $data["id"], PDO::PARAM_INT);
            $pdo->bindParam(":password_$rol", $data["password"], PDO::PARAM_STR);

            $pdo->execute();

            $pdo = null;

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    static public function noRepeatUser($rol, $document)
    {
        try {
            $pdo = Connection::connection()->prepare("SELECT id_$rol FROM $rol" . "s" . " WHERE document_$rol = $document");

            $pdo->execute();

            return $pdo->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
