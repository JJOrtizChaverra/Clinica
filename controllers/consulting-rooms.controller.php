<?php

class ConsultingRoomsController
{

    // Metodo para insertar un consultorio

    public function insertConsultingRoom()
    {

        // Validando los campos del formulario
        if (
            $_POST["insert"] == true &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["name-consulting-room"])
        ) {

            // Trayendo un consultorio para verificar si ya existe o no uno con el nombre que el usuario puso en el input
            $orderBy = "id_consulting_room";
            $orderMode = "ASC";
            $select = "id_consulting_room";
            $column = "name_consulting_room";
            $value = $_POST["name-consulting-room"];

            $consultingRoom = ConsultingRoomsModel::getConsultingRooms($orderBy, $orderMode, $select, $column, $value);

            // Si la longitud del array que devuelve es igual a 0 entonces no hay un consultorio con el mismo nombre
            if (count($consultingRoom) == 0) {

                // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
                $data = array(
                    "name-consulting-room" => $_POST["name-consulting-room"]
                );

                // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
                $result = ConsultingRoomsModel::insertConsultingRoom($data);

                // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
                if ($result) {
                    echo true;
                } else {
                    echo "No se pudo registrar el consultorio";
                }
            } else {
                echo "Ya existe un consultorio con ese nombre";
            }
        } else {
            echo "Campos invalidos";
        }

        return;
    }


    // Actualizar consultorio

    public function updateConsultingRoom()
    {

        // Validando los campos del formulario
        if (
            $_POST["update"] == true &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["name-consulting-room"])
        ) {

            // Trayendo un consultorio para verificar si ya existe o no un consultorio con el nombre que el usuario envio
            $orderBy = "id_consulting_room";
            $orderMode = "ASC";
            $select = "id_consulting_room";
            $column = "name_consulting_room";
            $value = $_POST["name-consulting-room"];

            $consultingRoom = ConsultingRoomsModel::getConsultingRooms($orderBy, $orderMode, $select, $column, $value);

            // Si la longitud del array que devuelve es igual a 0 entonces no hay un consultorio con el mismo nombre
            if (count($consultingRoom) == 0) {

                // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
                $data = array(
                    "id-consulting-room" => $_POST["id-consulting-room"],
                    "name-consulting-room" => $_POST["name-consulting-room"]
                );

                // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
                $result = ConsultingRoomsModel::updateConsultingRoom($data);

                // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
                if ($result) {
                    echo true;
                } else {
                    echo "No se pudo actualizar el consultorio";
                }
            } else {
                echo "Ya existe un consultorio con ese nombre";
            }
        } else {
            echo "Campos invalidos";
        }

        return;
    }


    // Obtener consultorios

    static public function getConsultingRooms($orderBy, $orderMode, $select, $column, $value)
    {
        return ConsultingRoomsModel::getConsultingRooms($orderBy, $orderMode, $select, $column, $value);
    }


    // Eliminar consultorio
    public function deleteConsultingRoom()
    {

        if ($_POST["delete"] == true && preg_match("/^[0-9]{1,}$/", $_POST["id-consulting-room"])) {

            $idConsultingRoom = (int) $_POST["id-consulting-room"];

            // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
            $result = ConsultingRoomsModel::deleteConsultingRoom($idConsultingRoom);

            // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
            if ($result) {
                echo true;
            } else {
                echo "No se pudo eliminar el consultorio";
            }
        } else {
            echo "No se pudo completar la operacion";
        }

        return;
    }
}
