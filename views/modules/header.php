<?php

if (
    !$_SESSION["rol"] === "secretary" ||
    !$_SESSION["rol"] === "doctor" ||
    !$_SESSION["rol"] === "patient" ||
    !$_SESSION["rol"] === "admin"
) {
    echo "<script>window.location = '" . Template::path() . "logout'</script>";
    return;
}

$url = explode("/", $_GET["url"])[0];

?>

<header class="main-header">

    <nav class="navbar background-primary">
        <div class="container-fluid">

            <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="bi bi-list text-white btn-lg fs-2"></i>
            </button>

            <div class="offcanvas offcanvas-start background-secondary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header background-primary">
                    <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">Clinica Medica</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 nav-underline">
                        <li class="nav-item">

                            <?php if ($url === "home") : ?>

                                <a class="nav-link text-white active" aria-current="page" href="<?php echo Template::path(); ?>home">
                                    <i class="bi bi-house me-2 fs-5"></i>
                                    Inicio
                                </a>

                            <?php else : ?>

                                <a class="nav-link text-white" href="<?php echo Template::path(); ?>home">
                                    <i class="bi bi-house me-2 fs-5"></i>
                                    Inicio
                                </a>
                            <?php endif; ?>
                        </li>

                        <li class="nav-item">

                            <?php if ($url === "doctors") : ?>

                                <a class="nav-link text-white active" aria-current="page" href="<?php echo Template::path(); ?>doctors">
                                    <i class="bi bi-person-workspace me-2 fs-5"></i>
                                    Doctores
                                </a>

                            <?php else : ?>

                                <a class="nav-link text-white" href="<?php echo Template::path(); ?>doctors">
                                    <i class="bi bi-person-workspace me-2 fs-5"></i>
                                    Doctores
                                </a>

                            <?php endif; ?>

                        </li>

                        <li class="nav-item">

                            <?php if ($url === "consulting-rooms") : ?>

                                <a class="nav-link text-white active" aria-current="page" href="<?php echo Template::path(); ?>consulting-rooms">
                                    <i class="bi bi-bandaid me-2 fs-5"></i>
                                    Consultorios
                                </a>

                            <?php else : ?>

                                <a class="nav-link text-white" href="<?php echo Template::path(); ?>consulting-rooms">
                                    <i class="bi bi-bandaid me-2 fs-5"></i>
                                    Consultorios
                                </a>

                            <?php endif; ?>
                        </li>

                        <li class="nav-item">

                            <?php if ($url === "patients") : ?>

                                <a class="nav-link text-white active" aria-current="page" href="<?php echo Template::path(); ?>patients">
                                    <i class="bi bi-people me-2 fs-5"></i>
                                    Pacientes
                                </a>

                            <?php else : ?>

                                <a class="nav-link text-white" href="<?php echo Template::path(); ?>patients">
                                    <i class="bi bi-people me-2 fs-5"></i>
                                    Pacientes
                                </a>

                            <?php endif; ?>
                        </li>

                    </ul>
                </div>
            </div>

            <button class="btn d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                <a class="nav-link">

                    <?php if ($_SESSION["picture"] !== null) : ?>

                        <img id="container-image" src="<?php echo Template::path(); ?>views/assets/img/<?php echo $_SESSION["rol"]; ?>/<?php echo $_SESSION["picture"]; ?>" class="img-fluid rounded" alt="<?php echo $_SESSION["displayname"]; ?>" width="35">

                    <?php else : ?>

                        <img id="container-image" src="<?php echo Template::path(); ?>views/assets/img/default.jpg" class="img-fluid rounded" alt="<?php echo $_SESSION["displayname"]; ?>" width="35">

                    <?php endif ?>

                </a>

                <p style="cursor: pointer;" class="m-0 ms-2 me-2 fw-semibold text-white"><?php echo $_SESSION["displayname"]; ?></p>
            </button>

        </div>
    </nav>

    <div class="d-flex justify-content-end position-absolute end-0">
        <div class="collapse collapse-horizontal" id="collapseWidthExample">
            <div class="card card-body" style="width: 200px;">
                <a class="btn btn-primary" href="<?php echo Template::path(); ?>profile">Perfil</a>
                <a class="btn btn-danger" href="<?php echo Template::path(); ?>logout">Salir</a>
            </div>
        </div>
    </div>

</header>