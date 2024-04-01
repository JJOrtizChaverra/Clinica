<?php

class SecretarysController
{

    // Insertar secretaria

    public function insertSecretary()
    {

        // Validando los campos del formulario
        if (
            $_POST["insert"] == true &&
            preg_match("/^[0-9]{6,14}$/", $_POST["document-secretary"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["name-secretary"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["lastname-secretary"]) &&
            preg_match("/^[0-9a-zA-Z\-_ .,!#&\/()]{6,}$/", $_POST["password-secretary"])
        ) {

            // Trayendo una secretaria para verificar si ya existe o no uno con el documento que el usuario puso en el input
            $orderBy = "id_secretary";
            $orderMode = "ASC";
            $select = "id_secretary";
            $column = "document_secretary";
            $value = $_POST["document-secretary"];

            $secretary = SecretarysModel::getSecretarys($orderBy, $orderMode, $select, $column, $value);

            // Si la longitud del array que devuelve es igual a 0 entonces no hay una secretaria con el mismo documento
            if (count($secretary) == 0) {

                // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
                $data = array(
                    "document-secretary" => (int) $_POST["document-secretary"],
                    "name-secretary" => $_POST["name-secretary"],
                    "lastname-secretary" => $_POST["lastname-secretary"],
                    "password-secretary" => password_hash($_POST["password-secretary"], PASSWORD_ARGON2ID) // Hasheando o cifrando la contraseña
                );

                // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
                $result = SecretarysModel::insertSecretary($data);

                // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
                if ($result === true) {
                    echo true;
                } else {
                    echo "No se pudo registrar la secretaria";
                }
            } else {
                echo "Ya existe una secretaria con ese documento";
            }
        } else {
            echo "Campos invalidos";
        }

        return;
    }


    // Obtener las secretarias

    static public function getSecretarys($orderBy, $orderMode, $select, $column, $value)
    {
        return SecretarysModel::getSecretarys($orderBy, $orderMode, $select, $column, $value);
    }


    // Actualizar secretaria

    public function updateSecretary()
    {

        // Validando los campos del formulario
        if (
            $_POST["update"] == true &&
            preg_match("/^[0-9]{1,}$/", $_POST["id-secretary"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["name-secretary"]) &&
            preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ ]{4,25}$/", $_POST["lastname-secretary"])
        ) {

            // Almacenando solo la informacion necesaria en un array para llevarlo al modelo
            $data = array(
                "name-secretary" => $_POST["name-secretary"],
                "lastname-secretary" => $_POST["lastname-secretary"],
                "id-secretary" => (int) $_POST["id-secretary"]
            );

            // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
            $result = SecretarysModel::updateSecretary($data);

            // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
            if ($result === true) {
                echo true;
            } else {
                echo "No se pudo actualizar la secretaria";
            }
        } else {
            echo "Campos invalidos";
        }

        return;
    }


    // Eliminar secretaria

    public function deleteSecretary()
    {

        if ($_POST["delete"] == true && preg_match("/^[0-9]{1,}$/", $_POST["id-secretary"])) {

            $idSecretary = (int) $_POST["id-secretary"];

            // Llamando al modelo y almacenando la respuesta para despues enviarla al Javascript
            $result = SecretarysModel::deleteSecretary($idSecretary);

            // Si el resultado es true, devuelve true al Javascript (Que para el sera interpretado como 1)
            if ($result === true) {
                echo true;
            } else {
                echo "No se pudo eliminar la secretaria";
            }
        } else {
            echo "Ha ocurrido un error, intentalo mas tarde";
        }

        return;
    }
}
