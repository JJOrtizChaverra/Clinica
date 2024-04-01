<?php

class QuotesController
{

    // Metodo para pedir una cita

    public function insertQuote()
    {

        // Validando los campos del formulario
        if (
            $_POST["insert"] == true &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-doctor-quote"]) &&
            preg_match("/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_POST["date-quote"]) &&
            HelpersController::validateDate($_POST["date-quote"]) &&
            preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/", $_POST["time-quote"]) &&
            HelpersController::validateTime($_POST["date-quote"], $_POST["time-quote"]) &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-patient-quote"]) &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-horary-quote"]) &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-consulting-room-quote"])
        ) {

            // Trayendo todas las citas del paciente para verificar si ya existe o no una cita con la fecha que ingreso en el input de fecha
            $quotesPatient = QuotesModel::getQuotes("id_quote", "DESC", "date_quote", "id_patient_quote", $_POST["id-patient-quote"]);

            // Iteramos sobre las fechas del paciente
            foreach ($quotesPatient as $key => $quote) {
                // Si encontro coincidencia entre la fecha que selecciono el paciente, y una fecha de la db, le devolvemos un error al paciente
                if($quote["date_quote"] === $_POST["date-quote"]) {
                    echo "Ya has pedido una cita para esa fecha";
                    return;
                }
            }

            // Trayendo un consultorio para verificar si ya existe o no uno con el nombre que el usuario puso en el input
            $horarys = HorarysModel::getHorarys("id_horary", "DESC", "times_horary", "id_horary", $_POST["id-horary-quote"]);

            // Si la longitud de la variable horarios es mayor a 0 quiere decir que si encontro coincidencias con el id del horario que se establecio en la cita
            if (count($horarys) > 0) {

                // Convirtiendo el array de las horas en un array normal de php para poder iterarlo
                $times = json_decode($horarys[0]["times_horary"], true);

                // Iterando el array de las horas del horario
                foreach ($times as $key => $time) {

                    // Si se encuentra coincidencias entre la hora que escogio el paciente y la del array de horas del horario
                    if ($time == $_POST["time-quote"]) {
                        // Se elimina ese indice, ya que no se podran pedir mas citas a esa hora (Un cita por hora)
                        unset($times[$key]);

                        // Luego se vuelve a convertir el resultado de ese array en un array pero en tipo string para actualizalor en la db
                        // Con el array values solo estoy introduciendo los valores del array, de lo contrario me estaria introduciendo tambien
                        // los indices y en tipo objeto
                        $times = json_encode(array_values($times));
                        break;
                    }

                    // Si el foreach entra a esta condicion, quiere decir que no encontro coincidencias con la hora que eligio el paciente
                    // Y la del horario, por lo tanto se lanza un error al usuario (Esto podria deberse a que un paciente ya escogio esa
                    // hora antes que el, y el paciente que va a pedir tambien esa hora no ha refrescado la pagina)
                    if ($key === count($times) - 1) {
                        echo "Ha ocurrido un problema, intentalo mas tarde";
                    }
                }

                $data = array(
                    "id-horary" => $_POST["id-horary-quote"],
                    "times-horary" => $times
                );

                $updateHorary = HorarysModel::updateHorary($data);

                if ($updateHorary) {

                    $data = array(
                        "date-quote" => $_POST["date-quote"],
                        "time-quote" => $_POST["time-quote"],
                        "id-patient-quote" => $_POST["id-patient-quote"],
                        "id-doctor-quote" => $_POST["id-doctor-quote"],
                        "id-consulting-room-quote" => $_POST["id-consulting-room-quote"],
                    );

                    $result = QuotesModel::insertQuote($data);

                    if ($result) {
                        echo true;
                    } else {
                        echo "No se pudo pedir tu cita medica";
                    }
                } else {
                    echo "Ha ocurrido un problema, intentalo mas tarde";
                }
            } else {
                echo "Ha ocurrido un problema, intentalo mas tarde";
            }
        } else {
            echo "Campos invalidos";
        }

        return;
    }


    // Obtener consultorios

    static public function getQuotes($orderBy, $orderMode, $select, $column, $value)
    {
        return QuotesModel::getQuotes($orderBy, $orderMode, $select, $column, $value);
    }


    // Actualizar consultorio

    // public function updateConsultingRoom()
    // {

    //     // Validando los campos del formulario
    //     if (
    //         $_POST["update"] == true &&
    //         preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["name-consulting-room"])
    //     ) {

    //         // Trayendo un consultorio para verificar si ya existe o no un consultorio con el nombre que el usuario envio
    //         $orderBy = "id_consulting_room";
    //         $orderMode = "ASC";
    //         $select = "id_consulting_room";
    //         $column = "name_consulting_room";
    //         $value = $_POST["name-consulting-room"];

    //         $consultingRoom = ConsultingRoomsModel::getConsultingRooms($orderBy, $orderMode, $select, $column, $value);

    //         // Si la longitud del array que devuelve es igual a 0 entonces no hay un consultorio con el mismo nombre
    //         if (count($consultingRoom) == 0) {

    //             // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
    //             $data = array(
    //                 "id-consulting-room" => $_POST["id-consulting-room"],
    //                 "name-consulting-room" => $_POST["name-consulting-room"]
    //             );

    //             // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
    //             $result = ConsultingRoomsModel::updateConsultingRoom($data);

    //             // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
    //             if ($result) {
    //                 echo true;
    //             } else {
    //                 echo "No se pudo actualizar el consultorio";
    //             }
    //         } else {
    //             echo "Ya existe un consultorio con ese nombre";
    //         }
    //     } else {
    //         echo "Campos invalidos";
    //     }

    //     return;
    // }


    // // Eliminar consultorio
    // public function deleteConsultingRoom()
    // {

    //     if ($_POST["delete"] == true && preg_match("/^[0-9]{1,}$/", $_POST["id-consulting-room"])) {

    //         $idConsultingRoom = (int) $_POST["id-consulting-room"];

    //         // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
    //         $result = ConsultingRoomsModel::deleteConsultingRoom($idConsultingRoom);

    //         // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
    //         if ($result) {
    //             echo true;
    //         } else {
    //             echo "No se pudo eliminar el consultorio";
    //         }
    //     } else {
    //         echo "No se pudo completar la operacion";
    //     }

    //     return;
    // }
}
