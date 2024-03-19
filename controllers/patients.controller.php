<?php

class PatientsController
{

    // Crear un paciente

    public function createPatient()
    {
        if (
            isset($_POST["document-patient"]) &&
            isset($_POST["name-patient"]) &&
            isset($_POST["lastname-patient"]) &&
            isset($_POST["gender-patient"]) &&
            isset($_POST["password-patient"]) &&
            !isset($_GET["id"]) &&
            !isset($_GET["edit"])
        ) {

            $data = array(
                "document" => (int) $_POST["document-patient"],
                "name" => $_POST["name-patient"],
                "lastname" => $_POST["lastname-patient"],
                "gender" => $_POST["gender-patient"],
                "password" => $_POST["password-patient"],
            );

            $result = PatientsModel::createPatient($data);

            if ($result) {
                echo "<script>window.location = '" . Template::path() . "patients'</script>";
            } else {
                echo "<script>alert('" . $result . "')</script>";
            }
        }
    }


    // Traer pacientes

    static public function viewPatients($column, $value)
    {
        return PatientsModel::viewPatients($column, $value);
    }


    // Editar un paciente

    public function editPatient()
    {
        if (
            isset($_POST["document-patient"]) &&
            isset($_POST["name-patient"]) &&
            isset($_POST["lastname-patient"]) &&
            isset($_POST["gender-patient"]) &&
            isset($_GET["id"]) &&
            isset($_GET["edit"])
        ) {

            // $pathImage = $_POST["current-picture-patient"];

            // $tmpName = $_FILES["picture-patient"]["tmp_name"];
            // $typeImage = $_FILES["picture-patient"]["type"];
            // $nameImage = $_POST["document-patient"];
            // $currentImage = $_POST["current-picture-patient"];
            // $rol = "doctor";

            // if (isset($tmpName) && !empty($tmpName)) {
            //     $deleteImage = Template::deleteImage($currentImage, $rol);
            //     $pathImage = Template::createImage($tmpName, $typeImage, $nameImage, $rol);
            // }

            $data = array(
                "id" => (int) $_GET["id"],
                "document" => (int) $_POST["document-patient"],
                "name" => $_POST["name-patient"],
                "lastname" => $_POST["lastname-patient"],
                "gender" => $_POST["gender-patient"],
            );

            $result = PatientsModel::editPatient($data);

            if ($result) {
                echo "<script>window.location = '" . Template::path() . "patients'</script>";
            } else {
                echo "<script>alert('Error al editar el paciente')</script>";
            }
        }
    }


    // Eliminar un paciente

    public function deletePatient()
    {
        if (isset($_GET["id"]) && isset($_GET["delete"]) && isset($_GET["current-picture"])) {

            if (is_numeric($_GET["id"]) && $_GET["delete"] === "patient") {

                $id = (int) $_GET["id"];

                if ($_GET["current-picture"] !== "") {

                    $deletePicturePatient = Template::deleteImage($_GET["current-picture"] . ".jpg", "patient");

                    if (!$deletePicturePatient) {
                        $deletePicturePatient = Template::deleteImage($_GET["current-picture"] . ".png", "patient");
                    }
                }

                $result = PatientsModel::deletePatient($id);

                if ($result) {
                    echo "<script>window.location = '" . Template::path() . "patients'</script>";
                } else {
                    echo "<script>alert('Error al eliminar el paciente')</script>";
                }
            }
        }
    }
}
