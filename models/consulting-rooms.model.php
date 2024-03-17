<?php

require_once "connection.php";

class ConsultingRoomsModel extends Connection
{

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
}
