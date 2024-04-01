<?php

if (isset($_SESSION["role"]) && ($_SESSION["role"] === "secretary" || $_SESSION["role"] === "admin")) {

    $orderBy = "id_consulting_room";
    $orderMode = "DESC";
    $select = "*";
    $column = null;
    $value = null;

    $consultingRooms = ConsultingRoomsController::getConsultingRooms($orderBy, $orderMode, $select, $column, $value);
} else {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}


?>

<main class="container-xxl" id="view-consulting-rooms">

    <?php include "modules/breadcrumb.php"; ?>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3 section-content">

        <div class="header">
            <button type="button" class="btn background-primary btn-lg text-white fw-medium" data-bs-toggle="modal" data-bs-target="#modal-insert-consulting_room">Registrar un Consultorio</button>
        </div>

        <div class="body">

            <?php include "modules/table.php"; ?>

        </div>

    </section>
</main>

<!-- Modal para registrar -->

<?php include "modules/modal-insert.php"; ?>


<!-- Modal para editar -->

<?php include "modules/modal-update.php"; ?>