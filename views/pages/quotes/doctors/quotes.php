<?php

if (isset($_SESSION["role"]) && $_SESSION["role"] === "doctor") {

    $orderBy = "date_quote";
    $orderMode = "DESC";
    $select = "id_quote,id_patient,document_patient,name_patient,lastname_patient,picture_patient,date_quote,time_quote,name_consulting_room";
    $column = "id_doctor_quote";
    $value = $_SESSION["id"];

    $quotes = QuotesController::getQuotes($orderBy, $orderMode, $select, $column, $value);
} else {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}

?>

<div class="container-xxl" id="view-quotes-doctors">

    <section class="d-flex align-items-center justify-content-between p-3">
        <h1 class="fs-2">Citas medicas</h1>

        <?php include "modules/breadcrumb.php"; ?>

    </section>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3 section-content">

        <div class="body p-2">

            <?php include "modules/table.php"; ?>

    </section>
</div>