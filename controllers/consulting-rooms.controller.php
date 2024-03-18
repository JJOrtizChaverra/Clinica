<?php

class ConsultingRoomsController
{

    // Crear un consultorio
    public function createConsultingRoom()
    {

        if (isset($_POST["name-consulting-room"])) {

            $data = array(
                "name" => $_POST["name-consulting-room"]
            );

            $result = ConsultingRoomsModel::createConsultingRoom($data);

            if ($result) {
                echo "<script>window.location = '" . Template::path() . "consulting-rooms'</script>";
            } else {
                echo "<script>alert('Error al registrar el consultorio')</script>";
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
            isset($_GET["id"]) &&
            isset($_GET["edit"])
        ) {

            $data = array(
                "id" => (int) $_GET["id"],
                "name" => $_POST["name-consulting-room"]
            );

            $result = ConsultingRoomsModel::editConsultingRoom($data);

            if ($result) {
                echo "<script>window.location = '" . Template::path() . "consulting-rooms'</script>";
            } else {
                echo "<script>alert('Error al editar el consultorio')</script>";
            }
        }
    }

    // Eliminar consultorio
    public function deleteConsultingRoom()
    {
        if (isset($_GET["id"]) && isset($_GET["delete"])) {

            if ($_GET["delete"] === "consulting-room") {

                $id = (int) $_GET["id"];

                $result = ConsultingRoomsModel::deleteConsultingRoom($id);

                if ($result) {
                    echo "<script>window.location = '" . Template::path() . "consulting-rooms'</script>";
                } else {
                    echo "<script>alert('Error al eliminar el consultorio')</script>";
                }
            } else {
                echo "<script>alert('Error al eliminar el consultorio')</script>";
            }
        }
    }
}
