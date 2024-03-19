<?php

require_once "connection.php";

class ConsultingRoomsModel extends Connection
{

    // Crear un consultorio

    static public function createConsultingRoom($data)
    {
        try {
            $pdo = Connection::connection()->prepare("INSERT INTO consulting_rooms
            (name_consulting_room)
            VALUES
            (:name_consulting_room)");

            $pdo->bindParam(":name_consulting_room", $data["name"], PDO::PARAM_STR);

            if ($pdo->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }


    // Traer consultorios

    static public function viewConsultingRooms($column, $value)
    {
        try {

            if ($column !== null) {

                $pdo = Connection::connection()->prepare("SELECT * FROM consulting_rooms WHERE
                $column = :$column");

                if (is_numeric($value)) {
                    $pdo->bindParam(":$column", $value, PDO::PARAM_INT);
                } else {
                    $pdo->bindParam(":$column", $value, PDO::PARAM_STR);
                }

                $pdo->execute();

                return $pdo->fetch();
            } else {
                $pdo = Connection::connection()->prepare("SELECT * FROM consulting_rooms");

                $pdo->execute();

                return $pdo->fetchAll();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // Eliminar consultorio

    static public function editConsultingRoom($data)
    {
        try {

            $pdo = Connection::connection()->prepare("UPDATE consulting_rooms SET
            name_consulting_room = :name_consulting_room
            WHERE
            id_consulting_room = :id_consulting_room");

            $pdo->bindParam(":id_consulting_room", $data["id"], PDO::PARAM_INT);
            $pdo->bindParam(":name_consulting_room", $data["name"], PDO::PARAM_STR);

            $pdo->execute();

            $pdo = null;

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    // Eliminar consultorio

    static public function deleteConsultingRoom($id)
    {
        try {
            $pdo = Connection::connection()->prepare("DELETE FROM consulting_rooms WHERE 
            id_consulting_room = :id_consulting_room");

            $pdo->bindParam(":id_consulting_room", $id, PDO::PARAM_INT);


            $pdo->execute();

            $pdo = null;

            return true;
        } catch (Exception $e) {
            $pdo = null;
            return false;
        }
    }
}
