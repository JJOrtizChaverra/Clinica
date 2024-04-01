<?php

require_once "../controllers/helpers.controller.php";
require_once "../controllers/quotes.controller.php";
require_once "../models/horarys.model.php";
require_once "../models/quotes.model.php";

$controller = new QuotesController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Pedir una cita

    if (isset(
        $_POST["insert"],
        $_POST["id-doctor-quote"],
        $_POST["date-quote"],
        $_POST["time-quote"],
        $_POST["id-patient-quote"],
        $_POST["id-horary-quote"],
        $_POST["id-consulting-room-quote"]
    )) {
        $controller->insertQuote();
        return;
    }


    // Actualizar cita

    // if (isset($_POST["update"], $_POST["id-consulting-room"], $_POST["name-consulting-room"])) {
    //     $controller->updateConsultingRoom();
    //     return;
    // }


    // // Cancelar cita
    // if (isset($_POST["delete"], $_POST["id-consulting-room"])) {
    //     $controller->deleteConsultingRoom();
    //     return;
    // }

    echo "Campos incompletos";
}
