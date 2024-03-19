<?php

class DoctorsController
{

    // Crear un doctor

    public function createDoctor()
    {

        if (
            isset($_POST["document-doctor"]) &&
            isset($_POST["name-doctor"]) &&
            isset($_POST["lastname-doctor"]) &&
            isset($_POST["gender-doctor"]) &&
            isset($_POST["password-doctor"]) &&
            isset($_POST["id-consulting-room-doctor"]) &&
            !isset($_GET["id"]) &&
            !isset($_GET["edit"])
        ) {

            $data = array(
                "document" => (int) $_POST["document-doctor"],
                "name" => $_POST["name-doctor"],
                "lastname" => $_POST["lastname-doctor"],
                "gender" => $_POST["gender-doctor"],
                "password" => $_POST["password-doctor"],
                "id-consulting-room" => (int) $_POST["id-consulting-room-doctor"]
            );

            $result = DoctorsModel::createDoctor($data);

            if ($result) {
                echo "<script>window.location = '" . Template::path() . "doctors'</script>";
            } else {
                echo "<script>alert('".$result."')</script>";
            }
        }
    }


    // Traer doctores

    static public function viewDoctors($column, $value)
    {
        return DoctorsModel::viewDoctors($column, $value);
    }


    // Editar un doctor

    public function editDoctor()
    {

        if (
            isset($_POST["document-doctor"]) &&
            isset($_POST["name-doctor"]) &&
            isset($_POST["lastname-doctor"]) &&
            isset($_POST["gender-doctor"]) &&
            isset($_POST["id-consulting-room-doctor"]) &&
            isset($_GET["id"]) &&
            isset($_GET["edit"])
        ) {
            
            $data = array(
                "id" => (int) $_GET["id"],
                "document" => (int) $_POST["document-doctor"],
                "name" => $_POST["name-doctor"],
                "lastname" => $_POST["lastname-doctor"],
                "gender" => $_POST["gender-doctor"],
                "id-consulting-room" => (int) $_POST["id-consulting-room-doctor"]
            );

            $result = DoctorsModel::editDoctor($data);

            if ($result) {
                echo "<script>window.location = '" . Template::path() . "doctors'</script>";
            } else {
                echo "<script>alert('Error al editar el doctor')</script>";
            }
        }
    }


    // Eliminar un doctor

    public function deleteDoctor()
    {

        if (isset($_GET["id"]) && isset($_GET["delete"]) && isset($_GET["current-picture"])) {

            if (is_numeric($_GET["id"]) && $_GET["delete"] === "doctor") {

                $id = (int) $_GET["id"];

                if ($_GET["current-picture"] !== "") {
                    $deletePictureDoctor = Template::deleteImage($_GET["current-picture"] . ".jpg", "doctor");

                    if (!$deletePictureDoctor) {
                        $deletePictureDoctor = Template::deleteImage($_GET["current-picture"] . ".png", "doctor");
                    }
                }



                $result = DoctorsModel::deleteDoctor($id);

                if ($result) {
                    echo "<script>window.location = '" . Template::path() . "doctors'</script>";
                } else {
                    echo "<script>alert('Error al eliminar el doctor')</script>";
                }
            }
        }
    }
}
