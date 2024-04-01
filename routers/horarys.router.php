<?php

require_once "../controllers/helpers.controller.php";
require_once "../controllers/horarys.controller.php";
require_once "../models/horarys.model.php";

$controller = new HorarysController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Insertar horario

    if (isset(
        $_POST["insert"],
        $_POST["date-horary"],
        $_POST["time-start-horary"],
        $_POST["time-end-horary"],
        $_POST["times-horary"],
        $_POST["minutes-range-horary"],
        $_POST["id-doctor-horary"]
    )) {
        $controller->insertHorary();
        return;
    }

    echo "Campos incompletos";
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    // Obtener horarios

    if (isset(
        $_GET["orderBy"],
        $_GET["orderMode"],
        $_GET["select"],
        $_GET["column"],
        $_GET["value"]
    )) {
        echo json_encode($controller::getHorarys($_GET["orderBy"], $_GET["orderMode"], $_GET["select"], $_GET["column"], $_GET["value"]));
        return;
    }
}
