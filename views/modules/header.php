<?php

if (
    !$_SESSION["role"] === "secretary" ||
    !$_SESSION["role"] === "doctor" ||
    !$_SESSION["role"] === "patient" ||
    !$_SESSION["role"] === "admin"
) {
    echo "<script>window.location = '" . TemplateController::path() . "logout'</script>";
    return;
}

?>


<header class="main-header">

    <nav class="navbar background-primary" style="padding: 12px 0 12px 0;">
        <div class="container-xxl">

            <button class="navbar-toggler text-white border-0 d-flex align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="bi bi-list text-white btn-lg fs-2"></i>
                <span class="ms-2">Menu</span>
            </button>


            <?php if ($_GET["url"] !== "profile") : ?>

                <div class="dropdown">
                    <button class="btn p-0 text-white d-flex align-items-center border-0 menu-profile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php if ($_SESSION["picture"] !== null) : ?>

                            <img id="container-image" src="<?php echo TemplateController::path(); ?>views/assets/img/<?php echo $_SESSION["role"]; ?>/<?php echo $_SESSION["picture"]; ?>" class="img-fluid rounded-circle me-2" alt="<?php echo $_SESSION["displayname"]; ?>" width="35">

                        <?php else : ?>

                            <img id="container-image" src="<?php echo TemplateController::path(); ?>views/assets/img/default.jpg" class="img-fluid rounded-circle me-2" alt="<?php echo $_SESSION["displayname"]; ?>" width="35">

                        <?php endif ?>
                        <span class="d-none d-sm-block"><?php echo $_SESSION["displayname"]; ?></span>
                    </button>
                    <ul class="dropdown-menu text-center">
                        <li><a class="btn background-primary text-white w-75 mb-2" href="<?php echo TemplateController::path(); ?>profile">Perfil</a></li>
                        <li><a class="btn background-danger text-white w-75" href="<?php echo TemplateController::path(); ?>logout">Salir</a></li>
                    </ul>
                </div>

            <?php endif ?>

            <?php include "menu.php"; ?>

        </div>
    </nav>

    <!-- <div class="d-flex justify-content-end position-absolute end-0">
        <div class="collapse collapse-horizontal" id="collapseWidthExample">
            <div class="card card-body card-body-profile flex-sm-row justify-content-evenly p-0 pt-2 pb-2">
                <a>Perfil</a>
                <a class="btn background-danger text-white" href="<?php echo TemplateController::path(); ?>logout">Salir</a>
            </div>
        </div>
    </div> -->


</header>