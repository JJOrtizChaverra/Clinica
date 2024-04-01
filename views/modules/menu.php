<?php

$url = $_GET["url"];

?>

<div class="offcanvas offcanvas-start background-secondary" tabindex="-1" id="menuNavbar" aria-labelledby="menuNavbarLabel">
    <div class="offcanvas-header background-primary">
        <h5 class="offcanvas-title text-white" id="menuNavbarLabel">Clinica Medica</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <ul class="navbar-nav flex-grow-1 pe-3 nav-underline h-100">
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

            <?php if ($_SESSION["role"] === "admin") : ?>

                <li class="nav-item">

                    <?php if ($url === "secretarys") : ?>

                        <a class="nav-link text-white active" aria-current="page" href="<?php echo TemplateController::path(); ?>secretarys">
                            <i class="bi bi-person-standing-dress me-2 fs-5"></i>
                            Secretarias
                        </a>

                    <?php else : ?>

                        <a class="nav-link text-white" href="<?php echo TemplateController::path(); ?>secretarys">
                            <i class="bi bi-person-standing-dress me-2 fs-5"></i>
                            Secretarias
                        </a>

                    <?php endif; ?>

                </li>

            <?php endif; ?>


            <?php if ($_SESSION["role"] === "secretary" || $_SESSION["role"] === "admin") : ?>

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

            <?php endif; ?>

            <?php if ($_SESSION["role"] === "patient") : ?>

                <li class="nav-item">

                    <?php if ($url === "quotes") : ?>

                        <a class="nav-link text-white active" aria-current="page" href="<?php echo TemplateController::path(); ?>quotes">
                            <i class="bi bi-calendar-date me-2 fs-5"></i>
                            Citas Medicas
                        </a>

                    <?php else : ?>

                        <a class="nav-link text-white" href="<?php echo TemplateController::path(); ?>quotes">
                            <i class="bi bi-calendar-date me-2 fs-5"></i>
                            Citas Medicas
                        </a>

                    <?php endif; ?>
                </li>

                <li class="nav-item">

                    <?php if ($url === "history") : ?>

                        <a class="nav-link text-white active" aria-current="page" href="<?php echo TemplateController::path(); ?>history">
                            <i class="bi bi-clock-history me-2 fs-5"></i>
                            Historial
                        </a>

                    <?php else : ?>

                        <a class="nav-link text-white" href="<?php echo TemplateController::path(); ?>history">
                            <i class="bi bi-clock-history me-2 fs-5"></i>
                            Historial
                        </a>

                    <?php endif; ?>
                </li>

            <?php endif; ?>

            <?php if ($_SESSION["role"] === "doctor") : ?>

                <li class="nav-item">

                    <?php if ($url === "quotes") : ?>

                        <a class="nav-link text-white active" aria-current="page" href="<?php echo TemplateController::path(); ?>quotes">
                            <i class="bi bi-calendar-date me-2 fs-5"></i>
                            Citas Medicas
                        </a>

                    <?php else : ?>

                        <a class="nav-link text-white" href="<?php echo TemplateController::path(); ?>quotes">
                            <i class="bi bi-calendar-date me-2 fs-5"></i>
                            Citas Medicas
                        </a>

                    <?php endif; ?>

                </li>

                <li class="nav-item">

                    <?php if ($url === "horarys") : ?>

                        <a class="nav-link text-white active" aria-current="page" href="<?php echo TemplateController::path(); ?>horarys">
                            <i class="bi bi-clock-history me-2 fs-5"></i>
                            Mis Horarios
                        </a>

                    <?php else : ?>

                        <a class="nav-link text-white" href="<?php echo TemplateController::path(); ?>horarys">
                            <i class="bi bi-clock-history me-2 fs-5"></i>
                            Mis Horarios
                        </a>

                    <?php endif; ?>

                </li>

            <?php endif; ?>

            <li class="nav-item mt-auto">

                <?php if ($url === "configurations") : ?>

                    <a class="nav-link text-white active" aria-current="page" href="<?php echo TemplateController::path(); ?>configurations">
                        <i class="bi bi-gear me-2 fs-5"></i>
                        Configuraciones
                    </a>

                <?php else : ?>

                    <a class="nav-link text-white" href="<?php echo TemplateController::path(); ?>configurations">
                        <i class="bi bi-gear me-2 fs-5"></i>
                        Configuraciones
                    </a>

                <?php endif; ?>

            </li>

        </ul>
    </div>
</div>