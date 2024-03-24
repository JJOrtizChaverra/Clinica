<div class="container-fluid h-100 d-flex flex-column justify-content-center align-items-center">

    <h1 class="text-center">Clinica Medica</h1>

    <div class="container-sm bg-white p-3 mt-4 rounded" style="max-width: 350px;">

        <div class="alert alert-danger text-center" role="alert" id="alert-login"></div>

        <p class="text-center">Ingresar como <?php echo $_GET["role"]; ?></p>

        <form class="row g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-login" novalidate>

            <div class="col-12">
                <div class="input-group has-validation">

                    <input type="number" class="form-control" id="document-login" name="document-login" placeholder="Ingresa tu documento" required>

                    <div class="invalid-feedback">El campo no puede estar vacío</div>
                </div>
            </div>
            <div class="col-12">
                <div class="input-group has-validation">

                    <input type="password" class="form-control" id="password-login" name="password-login" placeholder="Ingresa tu contraseña" required>

                    <div class="invalid-feedback">El campo no puede estar vacío</div>
                </div>
            </div>

            <input type="hidden" name="role-login" value="<?php echo $_GET["role"]; ?>">

            <div class="col-12 d-flex justify-content-center">
                <input class="btn background-primary text-white me-2" type="submit" value="Ingresar">
                <a href="<?php echo TemplateController::path(); ?>home" class="btn background-danger text-white">Atras</a>

            </div>
        </form>
    </div>
</div>