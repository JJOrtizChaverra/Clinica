<?php

$url = $_GET["url"];

?>

<div class="offcanvas offcanvas-start background-secondary" tabindex="-1" id="menuNavbar" aria-labelledby="menuNavbarLabel">
    <div class="offcanvas-header background-primary">
        <h5 class="offcanvas-title text-white" id="menuNavbarLabel">Clinica Medica</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 nav-underline">
            <li class="nav-item">

                <?php if ($url === "home") : ?>

                    <a class="nav-link text-white active" aria-current="page" href="<?php echo TemplateController::path(); ?>home">
                        <i class="bi bi-house me-2 fs-5"></i>
                        Inicio
                    </a>

                <?php else : ?>

                    <a class="nav-link text-white" href="<?php echo TemplateController::path(); ?>home">
                        <i class="bi bi-house me-2 fs-5"></i>
                        Inicio
                    </a>
                <?php endif; ?>
            </li>

            <li class="nav-item">

                <?php if ($url === "doctors") : ?>

                    <a class="nav-link text-white active" aria-current="page" href="<?php echo TemplateController::path(); ?>doctors">
                        <i class="bi bi-person-workspace me-2 fs-5"></i>
                        Doctores
                    </a>

                <?php else : ?>

                    <a class="nav-link text-white" href="<?php echo TemplateController::path(); ?>doctors">
                        <i class="bi bi-person-workspace me-2 fs-5"></i>
                        Doctores
                    </a>

                <?php endif; ?>

            </li>

            <li class="nav-item">

                <?php if ($url === "consulting-rooms") : ?>

                    <a class="nav-link text-white active" aria-current="page" href="<?php echo TemplateController::path(); ?>consulting-rooms">
                        <i class="bi bi-bandaid me-2 fs-5"></i>
                        Consultorios
                    </a>

                <?php else : ?>

                    <a class="nav-link text-white" href="<?php echo TemplateController::path(); ?>consulting-rooms">
                        <i class="bi bi-bandaid me-2 fs-5"></i>
                        Consultorios
                    </a>

                <?php endif; ?>
            </li>

            <li class="nav-item">

                <?php if ($url === "patients") : ?>

                    <a class="nav-link text-white active" aria-current="page" href="<?php echo TemplateController::path(); ?>patients">
                        <i class="bi bi-people me-2 fs-5"></i>
                        Pacientes
                    </a>

                <?php else : ?>

                    <a class="nav-link text-white" href="<?php echo TemplateController::path(); ?>patients">
                        <i class="bi bi-people me-2 fs-5"></i>
                        Pacientes
                    </a>

                <?php endif; ?>
            </li>

        </ul>
    </div>
</div>