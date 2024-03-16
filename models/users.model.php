<?php

require_once "connection.php";

class UsersModel extends Connection
{

    static public function login($data)
    {

        try {
            $pdo = Connection::connection()->prepare("SELECT * FROM users WHERE username_user = :username_user");

            $pdo->bindParam(":username_user", $data["username"], PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetch();

            // $pdo->close();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    static public function viewProfile($id) {
        try {
            $pdo = Connection::connection()->prepare("SELECT * FROM users WHERE id_user = :id_user");

            $pdo->bindParam(":id_user", $id, PDO::PARAM_INT);

            $pdo->execute();

            return $pdo->fetch();
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
