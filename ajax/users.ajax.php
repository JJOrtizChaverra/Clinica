<?php

require_once "../controllers/users.controller.php";
require_once "../models/users.model.php";

class UsersAjax
{
    public function noRepeatUser($rol, $value)
    {
        $result = UsersController::noRepeatUser($rol, (int) $value);

        echo json_encode($result);
    }
}

if (isset($_POST["rol"]) && isset($_POST["value"])) {

    $noRepeatUser = new UsersAjax();
    $noRepeatUser->noRepeatUser($_POST["rol"], $_POST["value"]);
}
