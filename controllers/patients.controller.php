<?php

class PatientsController
{

    // Insertar paciente

    public function insertPatient()
    {

        // Validando los campos del formulario
        if (
            $_POST["insert"] == true &&
            preg_match("/^[0-9]{6,14}$/", $_POST["document-patient"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["name-patient"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["lastname-patient"]) &&
            preg_match("/\b(Masculino|Femenino)\b/", $_POST["gender-patient"]) &&
            preg_match("/^[0-9a-zA-Z\-_ .,!#&\/()]{6,}$/", $_POST["password-patient"])
        ) {

            // Trayendo un paciente para verificar si ya existe o no uno con el documento que el usuario puso en el input
            $orderBy = "id_patient";
            $orderMode = "ASC";
            $select = "id_patient";
            $column = "document_patient";
            $value = $_POST["document-patient"];

            $patient = PatientsModel::getPatients($orderBy, $orderMode, $select, $column, $value);

            // Si la longitud del array que devuelve es igual a 0 entonces no hay un patient con el mismo documento
            if (count($patient) == 0) {

                // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
                $data = array(
                    "document-patient" => (int) $_POST["document-patient"],
                    "name-patient" => $_POST["name-patient"],
                    "lastname-patient" => $_POST["lastname-patient"],
                    "gender-patient" => $_POST["gender-patient"],
                    "password-patient" => password_hash($_POST["password-patient"], PASSWORD_ARGON2ID) // Hasheando o cifrando la contraseña
                );

                // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
                $result = PatientsModel::insertPatient($data);

                // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
                if ($result) {
                    echo true;
                } else {
                    echo "No se pudo registrar el Paciente";
                }
            } else {
                echo "Ya existe un patient con ese documento";
            }
        } else {
            echo "Campos invalidos";
        }

        return;
    }


    // Obtener los patientes

    static public function getPatients($orderBy, $orderMode, $select, $column, $value)
    {
        return PatientsModel::getPatients($orderBy, $orderMode, $select, $column, $value);
    }


    // Actualizar patient

    public function updatePatient()
    {

        // Validando los campos del formulario
        if (
            $_POST["update"] == true &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-patient"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["name-patient"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["lastname-patient"]) &&
            preg_match("/\b(Masculino|Femenino)\b/", $_POST["gender-patient"])
        ) {

            // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
            $data = array(
                "name-patient" => $_POST["name-patient"],
                "lastname-patient" => $_POST["lastname-patient"],
                "gender-patient" => $_POST["gender-patient"],
                "id-patient" => (int) $_POST["id-patient"]
            );

            // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
            $result = PatientsModel::updatePatient($data);

            // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
            if ($result) {
                echo true;
            } else {
                echo "No se pudo actualizar el Paciente";
            }
        } else {
            echo "Campos invalidos";
        }

        return;
    }


    // Eliminar patient

    public function deletePatient()
    {

        if ($_POST["delete"] == true && preg_match("/^[0-9]{1,}$/", $_POST["id-patient"])) {

            $idpatient = (int) $_POST["id-patient"];

            // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
            $result = PatientsModel::deletePatient($idpatient);

            // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
            if ($result) {
                echo true;
            } else {
                echo "No se pudo eliminar el Paciente";
            }
        } else {
            echo "No se pudo completar la operacion";
        }

        return;
    }
}
