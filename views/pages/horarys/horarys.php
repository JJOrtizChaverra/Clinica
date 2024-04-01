<?php

if (isset($_SESSION["role"]) && $_SESSION["role"] === "doctor") {

    // Obteniendo todos los horarios
    $orderBy = "id_horary";
    $orderMode = "DESC";
    $select = "id_horary,date_horary,start_horary,end_horary,minutes_range_horary";
    $column = "id_doctor_horary";
    $value = $_SESSION["id"];

    $horarys = HorarysController::getHorarys($orderBy, $orderMode, $select, $column, $value);
} else {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}

?>

<div class="container-xxl" id="view-horarys">

    <?php include "modules/breadcrumb.php"; ?>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3 section-content">

        <div class="header">
            <button type="button" class="btn background-primary btn-lg text-white fw-medium" data-bs-toggle="modal" data-bs-target="#modal-insert-horary">Crear un horario</button>
        </div>

        <div class="body">

            <?php include "modules/table.php"; ?>

        </div>

    </section>
</div>

<!-- Modal para insertar un horario -->

<?php include "modules/modal-insert.php"; ?>