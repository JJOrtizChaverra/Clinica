<?php

if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin") {

    // Obteniendo todos los doctores
    $orderBy = "id_secretary";
    $orderMode = "DESC";
    $select = "id_secretary,document_secretary,name_secretary,lastname_secretary,picture_secretary";
    $column = null;
    $value = null;

    $secretarys = SecretarysController::getSecretarys($orderBy, $orderMode, $select, $column, $value);
} else {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}

?>

<div class="container-xxl" id="view-secretarys">

    <?php include "modules/breadcrumb.php"; ?>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3 section-content">

        <div class="header">
            <button type="button" class="btn background-primary btn-lg text-white fw-medium" data-bs-toggle="modal" data-bs-target="#modal-insert-secretary">Registrar una Secretaria</button>
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