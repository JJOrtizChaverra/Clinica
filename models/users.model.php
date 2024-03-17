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

    static public function editProfile($data) {
        try {
            
            $pdo = Connection::connection()->prepare("UPDATE users SET
            name_user = :name_user, 
            lastname_user = :lastname_user,
            picture_user = :picture_user
            WHERE
            id_user = :id_user");

            $pdo->bindParam(":id_user", $data["id"], PDO::PARAM_INT);
            $pdo->bindParam(":name_user", $data["name"], PDO::PARAM_STR);
            $pdo->bindParam(":lastname_user", $data["lastname"], PDO::PARAM_STR);
            $pdo->bindParam(":picture_user", $data["picture"], PDO::PARAM_STR);

            $pdo->execute();

            $pdo = null;

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    static public function changePassword($data) {
        try {
            
            $pdo = Connection::connection()->prepare("UPDATE users SET
            password_user = :password_user
            WHERE
            id_user = :id_user");

            $pdo->bindParam(":id_user", $data["id"], PDO::PARAM_INT);
            $pdo->bindParam(":password_user", $data["password"], PDO::PARAM_STR);

            $pdo->execute();

            $pdo = null;

            return true;

        } catch (Exception $e) {
            return false;
        }
    }
}
