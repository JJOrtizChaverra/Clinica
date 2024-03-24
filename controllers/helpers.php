<?php

class Helpers
{

    // ---------- Metodo para validar el rol del usuario ----------

    static public function validateUserRole($userRole)
    {

        $allowedRoles = ["secretary", "doctor", "patient", "admin"];

        if (in_array($userRole, $allowedRoles)) {
            return true;
        } else {
            return false;
        }
    }


    // ---------- Metodo para validar los campos de los formularios ----------

    static public function validateFields($fields, $types)
    {
        foreach ($fields as $field => $valor) {
            if (!isset($types[$field])) {
                return false;
            }
            if (!preg_match($types[$field], $valor)) {
                return false;
            }
        }
        return true;
    }


    // ---------- Metodo para crear imagenes ----------

    static public function createImage($tmpName, $typeImage, $nameImage, $rolUser)
    {

        if ($typeImage === "image/jpeg") {

            $pathImage = $nameImage . "-" . mt_rand(1, 99) . ".jpg";

            $image = imagecreatefromjpeg($tmpName);

            imagejpeg($image, "../views/assets/img/$rolUser/$pathImage");
        }

        if ($typeImage === "image/png") {

            $pathImage = $nameImage . "-" . mt_rand(1, 99) . ".jpg";

            $image = imagecreatefrompng($tmpName);

            imagepng($image, "../views/assets/img/$rolUser/$pathImage");
        }

        return $pathImage;
    }


    // ---------- Metodo para eliminar imagenes ----------

    static public function deleteImage($currentImage, $rolUser)
    {
        if (!empty($currentImage)) {
            unlink("../views/assets/img/$rolUser/$currentImage");
        }
    }
}
