<?php

if (isset($_SESSION["role"]) && $_SESSION["role"] === "patient") {

    $orderBy = "id_doctor";
    $orderMode = "DESC";
    $select = "id_doctor,name_doctor,lastname_doctor,id_consulting_room_doctor,name_consulting_room";
    $column = null;
    $value = null;

    $doctors = DoctorsController::getDoctors($orderBy, $orderMode, $select, $column, $value);    
} else {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}

?>

<div class="container-xxl" id="view-quotes-patients">

    <section class="d-flex align-items-center justify-content-between p-3">
        <h1 class="fs-2">Citas medicas</h1>

        <?php include "modules/breadcrumb.php"; ?>

    </section>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3 section-content">

        <div class="body p-2">

            <?php include "modules/calendar.php"; ?>

    </section>
</div>

<!-- Modal para pedir citas medicas -->

<?php include "modules/modal-ask-quote.php"; ?>