<?php

if (
    !$_SESSION["role"] === "secretary" ||
    !$_SESSION["role"] === "doctor" ||
    !$_SESSION["role"] === "patient" ||
    !$_SESSION["role"] === "admin"
) {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}

?>

<div class="container-md">

    <section class="d-flex align-items-center justify-content-between p-3">
        <h1 class="fs-2">Gestor de Perfil</h1>

        <nav class="d-none d-sm-flex align-items-center" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?php echo TemplateController::path() ?>home" class="breadcrumb-item">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mi perfil</li>
            </ol>
        </nav>
    </section>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3">

        <div class="alert text-center m-2" role="alert" id="alert-edit-profile"></div>

        <form class="g-3 needs-validation" enctype="multipart/form-data" id="form-edit-profile" novalidate>

            <div class="row">
                <div class="col-12 col-md-6">

                    <div class="mb-3 has-validation col-12 col-md-6 w-100">
                        <label for="name-profile" class="form-label fw-semibold">Nombre/s</label>
                        <input type="text" class="form-control form-control-lg" id="name-profile" name="name-profile" value="<?php echo $_SESSION["name"] ?>" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                    <div class="mb-3 has-validation col-12 col-md-6 w-100">
                        <label for="lastname-profile" class="form-label fw-semibold">Apellido/s</label>
                        <input type="text" class="form-control form-control-lg" id="lastname-profile" name="lastname-profile" value="<?php echo $_SESSION["lastname"] ?>" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>
                </div>

                <div class="col-12 col-md-6">

                    <div class=" has-validation col-12 col-md-6 w-100 text-center">
                        <label for="picture-profile" class="border border-2 rounded-circle cursor-pointer">

                            <?php if ($_SESSION["picture"] !== null) : ?>
                                <img id="container-image" src="<?php TemplateController::path(); ?>views/assets/img/<?php echo $_SESSION["role"] ?>/<?php echo $_SESSION["picture"]; ?>" alt="<?php echo $_SESSION["displayname"]; ?>" class="img-fluid rounded-circle">
                            <?php else : ?>
                                <img id="container-image" src="<?php TemplateController::path(); ?>views/assets/img/defult.jpg" alt="<?php echo $_SESSION["displayname"]; ?>" class="img-fluid rounded-circle">
                            <?php endif; ?>

                        </label>
                        <input type="file" id="picture-profile" name="picture-profile">
                        <input type="hidden" name="current-picture-profile" value="<?php echo $_SESSION["picture"]; ?>" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                </div>
            </div>

            <input type="hidden" name="role-profile" value="<?php echo $_SESSION["role"]; ?>">
            <input type="hidden" name="id-profile" value="<?php echo $_SESSION["id"]; ?>">

            <div class="d-flex justify-content-center mb-2">
                <input type="submit" class="me-2 btn background-primary text-white" id="button-confirm-edit-profile" value="Guardar cambios">
                <a href="<?php TemplateController::path(); ?>home" class="btn background-danger text-white">Atras</a>
            </div>

            <div class="d-flex justify-content-center">
                <button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#modal-change-password">Cambiar contraseña</button>
            </div>

        </form>
    </section>
</div>

<!-- Modal para cambiar contraseña -->
<div class="modal fade" id="modal-change-password" tabindex="-1" aria-labelledby="modal-change-passwordsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-change-passwordsLabel">Cambiar contraseña</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-change-password"></div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-change-password" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <input type="password" class="form-control form-control-lg" id="password-profile" name="password" placeholder="Escribe la nueva contraseña" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                    <input type="hidden" name="id-user" value="<?php echo $_SESSION["id"]; ?>">

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn background-primary text-white" id="button-confirm-change-password" value="Aceptar">
                </div>

            </form>
        </div>
    </div>
</div>