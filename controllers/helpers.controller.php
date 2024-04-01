<?php

class HelpersController
{

    // // ---------- Metodo para validar el rol del usuario ----------

    // static public function validateUserRole($userRole)
    // {

    //     $allowedRoles = ["secretary", "doctor", "patient", "admin"];

    //     if (in_array($userRole, $allowedRoles)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    // ---------- Metodo para validar que la fecha sea igual o mayor a la fecha actual ----------

    static public function validateDate($date)
    {
        date_default_timezone_set("America/Bogota");

        $currentDate = date("Y-m-d");

        if ($date < $currentDate) {
            return false;
        } else {
            return true;
        }
    }


    // ---------- Metodo para validar que la hora sea igual o mayor a la hora actual si la fecha actual es hoy ----------

    static public function validateTime($date, $time)
    {
        date_default_timezone_set("America/Bogota");

        $currentDate = date("Y-m-d");
        $currentTime = date("H:i");

        if ($currentDate === $date) {
            if ($time > $currentTime) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
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

            $pathImage = $nameImage . "-" . mt_rand(1, 99) . ".png";

            $image = imagecreatefrompng($tmpName);

            imagepng($image, "../views/assets/img/$rolUser/$pathImage");
        }

        return $pathImage;
    }


    // ---------- Metodo para eliminar imagenes ----------

    public function deleteImage($currentImage, $rolUser)
    {
        if (!empty($currentImage)) {
            unlink("../views/assets/img/$rolUser/$currentImage");
        }
    }
}
