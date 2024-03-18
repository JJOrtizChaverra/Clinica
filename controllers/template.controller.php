<?php

class Template
{
    public function callTemplate()
    {
        include "views/template.php";
    }

    static public function path()
    {
        return "http://localhost/Clinica/";
    }


    // Metodo para crear imagenes
    static public function createImage($tmpName, $type, $nameImage, $rol)
    {

        if ($type === "image/jpeg") {

            $pathImage = $nameImage . "-" . mt_rand(1, 99) . ".jpg";

            $image = imagecreatefromjpeg($tmpName);

            imagejpeg($image, "views/assets/img/$rol/$pathImage");
        }

        if ($type === "image/png") {

            $pathImage = $nameImage . "-" . mt_rand(1, 99) . ".jpg";

            $image = imagecreatefrompng($tmpName);

            imagepng($image, "views/assets/img/$rol/$pathImage");
        }

        return $pathImage;
    }


    // Metodo para eliminar imagenes
    static public function deleteImage($currentImage, $rol)
    {
        if (!empty($currentImage)) {
            unlink("views/assets/img/$rol/" . $currentImage);

            return true;
        } else {
            return false;
        }
    }
}
