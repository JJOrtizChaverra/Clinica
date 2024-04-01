<?php

class HorarysController
{

    // Insertar horary

    public function insertHorary()
    {

        // Validando los campos del formulario
        if (
            $_POST["insert"] == true &&
            preg_match("/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_POST["date-horary"]) &&
            HelpersController::validateDate($_POST["date-horary"]) &&
            preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/", $_POST["time-start-horary"]) &&
            preg_match("/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/", $_POST["time-end-horary"]) &&
            preg_match("/^[0-9]{1,2}$/", $_POST["minutes-range-horary"]) &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-doctor-horary"])
        ) {

            if($_POST["time-start-horary"] >= $_POST["time-end-horary"]) {
                echo "La hora de entrada no puede ser mayor ni igual a la hora de salida";
                return;
            }

            // Trayendo los horarios del doctor para verificar si ya existe o no uno con la fecha que el doctor puso en el input
            $orderBy = "id_horary";
            $orderMode = "DESC";
            $select = "date_horary";
            $column = "id_doctor_horary";
            $value = $_POST["id-doctor-horary"];

            $horarys = HorarysModel::getHorarys($orderBy, $orderMode, $select, $column, $value);

            // Esta variable me va a decir al final si existe o no un horario con la fecha que viene en POST
            $alreadyExistsHorary = false;

            // Iteramos sobre todos los horarios del doctor
            foreach ($horarys as $key => $horary) {

                // Validamos si el horario que se va iterando es igual al que esta en la variable POST (Que es la que el doctor puso en el input de la fecha)
                if($horary["date_horary"] === $_POST["date-horary"]) {
                    $alreadyExistsHorary = true;
                    break;
                }
            }

            // Si la la variable es false la negamos a true, por lo tanto no se encontro un horario con la misma fecha
            if (!$alreadyExistsHorary) {

                // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
                $data = array(
                    "date-horary" => $_POST["date-horary"],
                    "time-start-horary" => $_POST["time-start-horary"],
                    "time-end-horary" => $_POST["time-end-horary"],
                    "times-horary" => $_POST["times-horary"],
                    "minutes-range-horary" => (int) $_POST["minutes-range-horary"],
                    "id-doctor-horary" => (int) $_POST["id-doctor-horary"],
                );

                // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
                $result = HorarysModel::insertHorary($data);

                // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
                if ($result) {
                    echo true;
                } else {
                    echo "No se pudo crear el horario";
                }
            } else {
                echo "Ya existe un horario creado con esa fecha";
            }
        } else {
            echo "Campos invalidos";
        }

        return;
    }


    // Obtener los horaryes

    static public function getHorarys($orderBy, $orderMode, $select, $column, $value)
    {
        return HorarysModel::getHorarys($orderBy, $orderMode, $select, $column, $value);
    }
}
