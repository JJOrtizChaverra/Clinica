<section class="container-xxl">

    <center>
        <h1 class="mt-2 mb-3">Seleccione como desea ingresar al sistema</h1>
    </center>

    <div class="row">

        <a href="<?php echo TemplateController::path(); ?>login&role=secretary" class="btn col-12 col-sm-6 col-lg-3 mb-3">
            <div class="card card-dashboard-secretary">
                <div class="card-header text-center text-white">
                    Iniciar Sesion
                </div>
                <div class="card-body text-center">
                    <h2 class="card-title text-white">Secretaria</h2>
                    <i class="bi bi-person-standing-dress opacity-50" style="font-size: 80px;"></i>
                </div>
            </div>
        </a>

        <a href="<?php echo TemplateController::path(); ?>login&role=doctor" class="btn col-12 col-sm-6 col-lg-3 mb-3">
            <div class="card card-dashboard-doctor">
                <div class="card-header text-center text-white">
                    Iniciar Sesion
                </div>
                <div class="card-body text-center">
                    <h2 class="card-title text-white">Doctor</h2>
                    <i class="bi bi-person-workspace opacity-50" style="font-size: 80px;"></i>
                </div>
            </div>
        </a>

        <a href="<?php echo TemplateController::path(); ?>login&role=patient" class="btn col-12 col-sm-6 col-lg-3 mb-3">
            <div class="card card-dashboard-patient">
                <div class="card-header  text-white text-center">
                    Iniciar Sesion
                </div>
                <div class="card-body text-center">
                    <h2 class="card-title text-white">Paciente</h2>
                    <i class="bi bi-people-fill opacity-50" style="font-size: 80px;"></i>
                </div>
            </div>

        </a>

        <a href="<?php echo TemplateController::path(); ?>login&role=admin" class="btn col-12 col-sm-6 col-lg-3 mb-3 h-100">
            <div class="card card-dashboard-admin">
                <div class="card-header  text-white text-center">
                    Iniciar Sesion
                </div>
                <div class="card-body text-center">
                    <h2 class="card-title text-white">Admin</h2>
                    <i class="bi bi-person-badge-fill opacity-50 " style="font-size: 80px;"></i>
                </div>
            </div>
        </a>
    </div>

</section>