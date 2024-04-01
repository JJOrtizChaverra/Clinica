<?php

if (!isset($_SESSION["login"], $_SESSION["role"]) && !$_SESSION["login"] == true) {
    echo "<script>window.location = '" . TemplateController::path() . "logout'</script>";
    return;
}

?>

<div class="container-xxl" id="view-home">

    <?php include "modules/breadcrumb.php"; ?>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3 section-content">

        <div class="header">
            
        </div>

        <div class="body">

            

        </div>

    </section>
</div>