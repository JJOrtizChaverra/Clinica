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
        if (
            isset($_POST["name-consulting-room"]) &&
            isset($_POST["id-consulting-room"])
        ) {

            if (is_numeric($_POST["id-consulting-room"])) {
                $data = array(
                    "id" => (int) $_POST["id-consulting-room"],
                    "name" => $_POST["name-consulting-room"]
                );

                $result = ConsultingRoomsModel::editConsultingRoom($data);

                if ($result) {
                    echo "<script>window.location = '" . Template::path() . "consulting-room'</script>";
                } else {
                    echo "<script>alert('Error al editar el consultorio')</script>";
                }
            } else {
                echo "<script>alert('Error al editar el consultorio')</script>";
            }
        }
    }

    // Eliminar consultorio
    public function deleteConsultingRoom()
    {
        if (isset($_GET["id"]) && (isset($_GET["delete"]) && $_GET["delete"] == true)) {

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
