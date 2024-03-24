<?php

if (isset($_SESSION["role"]) && $_SESSION["role"] === "secretary") {

    if ($_GET["url"] === "consulting-rooms") {
        $url = substr(str_replace("-", "_", $url), 0, strlen($_GET["url"]) - 1);
    } else if ($_GET["url"] === "doctors") {

        $table1 = "consulting_rooms";
        $table2 = "null";
        $column = "id";
        $value = "null";
        $select = "*";

        $consultingRooms = Controller::get($table1, $table2, $column, $value, $select);

        $url = substr($_GET["url"], 0, strlen($_GET["url"]) - 1);
    } else {
        $url = substr($_GET["url"], 0, strlen($_GET["url"]) - 1);
    }
} else {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}


?>

<div class="container-xl">

    <?php include "modules/breadcrumb.php"; ?>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3">

        <div class="header">
            <button type="button" class="btn background-primary btn-lg text-white fw-medium" data-bs-toggle="modal" data-bs-target="#modal-insert-<?php echo $url; ?>">Registrar un <?php echo ucfirst($url) ?></button>
        </div>

        <div class="body">

            <div class="table-responsive">
                <table class="table table-striped rounded-1 data-table" id="table-<?php echo $url; ?>s">

                </table>
            </div>


        </div>

    </section>
</div>

<!-- Modal para registrar doctor -->

<?php include "modules/modal-insert.php"; ?>


<!-- Modal para editar doctor -->

<?php include "modules/modal-update.php"; ?>


<!-- Modal para eliminar doctor -->

<?php include "modules/modal-delete.php"; ?>