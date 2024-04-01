<?php

if (isset($_SESSION["role"]) && ($_SESSION["role"] === "secretary" || $_SESSION["role"] === "admin")) {

    // Obteniendo todos los doctores
    $orderBy = "id_patient";
    $orderMode = "DESC";
    $select = "id_patient,document_patient,name_patient,lastname_patient,gender_patient,picture_patient";
    $column = null;
    $value = null;

    $patients = PatientsController::getPatients($orderBy, $orderMode, $select, $column, $value);
} else {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}

?>

<div class="container-xxl" id="view-patients">

    <?php include "modules/breadcrumb.php"; ?>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3 section-content">

        <div class="header">
            <button type="button" class="btn background-primary btn-lg text-white fw-medium" data-bs-toggle="modal" data-bs-target="#modal-insert-patient">Registrar un Paciente</button>
        </div>

        <div class="body">

            <?php include "modules/table.php"; ?>

        </div>

    </section>
</div>

<!-- Modal para registrar -->

<?php include "modules/modal-insert.php"; ?>


<!-- Modal para editar -->

<?php include "modules/modal-update.php"; ?>