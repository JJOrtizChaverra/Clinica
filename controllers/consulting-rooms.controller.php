<?php

class ConsultingRoomsController {

    // Crear un consultorio
    public function createConsultingRoom() {

        if(isset($_POST["new-consulting"])) {

            $data = array(
                "name" => $_POST["new-consulting"]
            );

            $result = ConsultingRoomsModel::createConsultingRoom($data);

            if($result) {
                echo "<script>window.location = '".Template::path()."consulting-room'</script>";
            }

        }

    }


    // Traer consultorios
    static public function viewConsultingRooms($column, $value) {
        
        $result = ConsultingRoomsModel::viewConsultingRooms($column, $value);

        return $result;

    }


    // Eliminar consultorio
    public function deleteConsultingRoom() {

        if(isset($_GET["id"])) {
            
            $id = $_GET["id"];

            $result = ConsultingRoomsModel::deleteConsultingRoom($id);

            if($result) {
                echo "<script>window.location = '".Template::path()."consulting-room'</script>";
            } else {
                echo "<script>alert('Error al eliminar el consultorio')</script>";
            }

        }

    }

}