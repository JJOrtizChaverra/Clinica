<?php

if (isset($_SESSION["role"]) && $_SESSION["role"] === "patient") {

    $orderBy = "id_quote";
    $orderMode = "DESC";
    $select = "id_quote,date_quote,time_quote,name_doctor,lastname_doctor, picture_doctor,name_consulting_room";
    $column = "id_patient_quote";
    $value = $_SESSION["id"];

    $quotes = QuotesController::getQuotes($orderBy, $orderMode, $select, $column, $value);

} else {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}


?>

<div class="container-xl">

    <?php include "modules/breadcrumb.php"; ?>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3 section-content">

        <div class="body">

            <?php include "modules/table.php"; ?>

        </div>

    </section>
</div>