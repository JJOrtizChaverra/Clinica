<?php

class ConsultingRoomsController
{

    // Crear un consultorio
    public function createConsultingRoom()
    {

        if (isset($_POST["new-consulting"])) {

            $data = array(
                "name" => $_POST["new-consulting"]
            );

            $result = ConsultingRoomsModel::createConsultingRoom($data);

            if ($result) {
                echo "<script>window.location = '" . Template::path() . "consulting-room'</script>";
            }
        }
    }


    // Traer consultorios
    static public function viewConsultingRooms($column, $value)
    {

        $result = ConsultingRoomsModel::viewConsultingRooms($column, $value);

        return $result;
    }

    // Editar un consultorio
    public function editConsultingRoom()
    {

        if (isset($_GET["id"]) && isset($_POST["consulting-room-name"])) {

            $data = array(
                "id" => (int) $_GET["id"],
                "name" => $_POST["consulting-room-name"]
            );

            $result = ConsultingRoomsModel::editConsultingRoom($data);

            if ($result) {
                echo "<script>window.location = '" . Template::path() . "consulting-room'</script>";
            } else {
                echo "<script>alert('Error al editar el consultorio')</script>";
            }
        }
    }

    // Eliminar consultorio
    public function deleteConsultingRoom()
    {

        if (isset($_GET["id"])) {

            $id = $_GET["id"];

            $result = ConsultingRoomsModel::deleteConsultingRoom($id);

            if ($result) {
                echo "<script>window.location = '" . Template::path() . "consulting-room'</script>";
            } else {
                echo "<script>alert('Error al eliminar el consultorio')</script>";
            }
        }
    }
}
