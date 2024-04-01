<?php

if ($_GET["role"] !== "secretary" && $_GET["role"] !== "doctor" && $_GET["role"] !== "patient" && $_GET["role"] !== "admin") {
    echo "<script>window.location = '" . TemplateController::path() . "dashboard'</script>";
}

?>

<main class="container-fluid h-100 d-flex flex-column justify-content-center align-items-center" id="view-login">

    <h1 class="text-center">Clinica Medica</h1>

    <div class="container-sm bg-white p-3 mt-4 rounded border section-content" style="max-width: 350px;">

        <p class="text-center" id="login-mode-paragraph">Ingresar como
            <?php if ($_GET["role"] === "secretary") : ?>
                Secretaria
            <?php endif; ?>
            <?php if ($_GET["role"] === "doctor") : ?>
                Doctor
            <?php endif; ?>
            <?php if ($_GET["role"] === "patient") : ?>
                Paciente
            <?php endif; ?>
            <?php if ($_GET["role"] === "admin") : ?>
                Administrador
            <?php endif; ?>
            <br/>
        </p>

        <div class="alert text-center m-2" role="alert" id="alert-login"></div>

        <form class="row g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-login" novalidate>

            <div class="col-12">
                <div class="input-group has-validation">

                    <input type="number" class="form-control" id="document-login" name="document-login" placeholder="Ingresa tu documento" required>

                    <div class="invalidation-message"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="input-group has-validation">

                    <input type="password" class="form-control" id="password-login" name="password-login" placeholder="Ingresa tu contraseña" required>

                    <div class="invalidation-message"></div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember-me-login" id="remember-me-login">
                    <label class="form-check-label" for="remember-me-login">
                        Recordarme
                    </label>
                </div>
            </div>

            <input type="hidden" name="role-login" value="<?php echo $_GET["role"]; ?>">

            <div class="col-12 d-flex justify-content-center">
                <input type="submit" class="btn background-primary text-white me-2" value="Ingresar">
                <a href="<?php echo TemplateController::path(); ?>dashboard" class="btn background-danger text-white">Atras</a>
            </div>
        </form>
    </div>
</main>