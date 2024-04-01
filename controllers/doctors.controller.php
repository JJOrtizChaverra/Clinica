<?php

class DoctorsController
{

    // Insertar doctor

    public function insertDoctor()
    {

        // Validando los campos del formulario
        if (
            $_POST["insert"] == true &&
            preg_match("/^[0-9]{6,14}$/", $_POST["document-doctor"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["name-doctor"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["lastname-doctor"]) &&
            preg_match("/\b(Masculino|Femenino)\b/", $_POST["gender-doctor"]) &&
            preg_match("/^[0-9a-zA-Z\-_ .,!#&\/()]{6,}$/", $_POST["password-doctor"]) &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-consulting-room-doctor"])
        ) {

            // Trayendo un doctor para verificar si ya existe o no uno con el documento que el usuario puso en el input
            $orderBy = "id_doctor";
            $orderMode = "ASC";
            $select = "id_doctor";
            $column = "document_doctor";
            $value = $_POST["document-doctor"];

            $doctor = DoctorsModel::getDoctors($orderBy, $orderMode, $select, $column, $value);

            // Si la longitud del array que devuelve es igual a 0 entonces no hay un doctor con el mismo documento
            if (count($doctor) == 0) {

                // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
                $data = array(
                    "document-doctor" => (int) $_POST["document-doctor"],
                    "name-doctor" => $_POST["name-doctor"],
                    "lastname-doctor" => $_POST["lastname-doctor"],
                    "gender-doctor" => $_POST["gender-doctor"],
                    "password-doctor" => password_hash($_POST["password-doctor"], PASSWORD_ARGON2ID), // Hasheando o cifrando la contraseña
                    "id-consulting-room-doctor" => (int) $_POST["id-consulting-room-doctor"]
                );

                // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
                $result = DoctorsModel::insertDoctor($data);

                // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
                if ($result) {
                    echo true;
                } else {
                    echo "No se pudo registrar el doctor";
                }
            } else {
                echo "Ya existe un doctor con ese documento";
            }
        } else {
            echo "Campos invalidos";
        }

        return;
    }


    // Obtener los doctores

    static public function getDoctors($orderBy, $orderMode, $select, $column, $value)
    {
        return DoctorsModel::getDoctors($orderBy, $orderMode, $select, $column, $value);
    }


    // Actualizar doctor

    public function updateDoctor()
    {

        // Validando los campos del formulario
        if (
            $_POST["update"] == true &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-doctor"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["name-doctor"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["lastname-doctor"]) &&
            preg_match("/\b(Masculino|Femenino)\b/", $_POST["gender-doctor"]) &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-consulting-room-doctor"])
        ) {

            // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
            $data = array(
                "name-doctor" => $_POST["name-doctor"],
                "lastname-doctor" => $_POST["lastname-doctor"],
                "gender-doctor" => $_POST["gender-doctor"],
                "id-consulting-room-doctor" => (int) $_POST["id-consulting-room-doctor"],
                "id-doctor" => (int) $_POST["id-doctor"]
            );

            // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
            $result = DoctorsModel::updateDoctor($data);

            // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
            if ($result) {
                echo true;
            } else {
                echo "No se pudo actualizar el doctor";
            }
        } else {
            echo "Campos invalidos";
        }

        return;
    }


    // Eliminar doctor

    public function deleteDoctor()
    {

        if ($_POST["delete"] == true && preg_match("/^[0-9]{1,}$/", $_POST["id-doctor"])) {

            $idDoctor = (int) $_POST["id-doctor"];

            // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
            $result = DoctorsModel::deleteDoctor($idDoctor);

            // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
            if ($result) {
                echo true;
            } else {
                echo "No se pudo eliminar el doctor";
            }
        } else {
            echo "No se pudo completar la operacion";
        }

        return;
    }
}
