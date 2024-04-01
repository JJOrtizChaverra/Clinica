<?php

if (!isset($_SESSION["login"], $_SESSION["role"]) && !$_SESSION["login"] == true) {
    echo "<script>window.location = '" . TemplateController::path() . "logout'</script>";
    return;
}

?>


<main class="container-xxl" id="view-configurations">

    <?php include "modules/breadcrumb.php"; ?>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3 section-content">

        <div class="body">

            <div class="container-fluid">
                <div class="row justify-content-evenly gap-3">
                    <div class="form-check form-switch d-flex align-items-center col-12 col-sm-6 col-md-3">
                        <input class="form-check-input input-switch" type="checkbox" role="switch" id="switch-dark-mode">
                        <label class="form-check-label ms-2 label-switch" for="switch-dark-mode">Modo Oscuro</label>
                    </div>
                </div>
            </div>

        </div>

    </section>
</main>