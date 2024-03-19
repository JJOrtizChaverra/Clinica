<section class="container-xxl">

    <center>
        <h1 class="mt-2 mb-3">Seleccione como desea ingresar al sistema</h1>
    </center>

    <div class="row">
        <div class="col-12 col-sm-6 col-lg-3 mb-3">
            <div class="card" style="background-color: #F781D8;">
                <div class="card-header text-center text-white">
                    Iniciar Sesion
                </div>
                <div class="card-body text-end">
                    <h2 class="card-title position-absolute text-white z-1">Secretaria</h2>
                    <i class="bi bi-person-standing-dress opacity-50" style="font-size: 80px;"></i>
                </div>
                <div class="card-footer text-body-secondary text-center" style="background-color: #e768c6;">
                    <a href="<?php echo Template::path(); ?>login&rol=secretary" class="text-decoration-none fw-semibold text-white p-0">Ingresar</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 mb-3">
            <div class="card" style="background-color: #BDBDBD;">
                <div class="card-header text-center text-white">
                    Iniciar Sesion
                </div>
                <div class="card-body text-end">
                    <h2 class="card-title position-absolute text-white z-1">Doctor</h2>
                    <i class="bi bi-person-workspace opacity-50" style="font-size: 80px;"></i>
                </div>
                <div class="card-footer text-body-secondary text-center" style="background-color: #999999;">
                    <a href="<?php echo Template::path(); ?>login&rol=doctor" class="text-decoration-none fw-semibold text-white p-0">Ingresar</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 mb-3">
            <div class="card" style="background-color: #f39c12;">
                <div class="card-header  text-white text-center">
                    Iniciar Sesion
                </div>
                <div class="card-body text-end">
                    <h2 class="card-title position-absolute text-white z-1">Paciente</h2>
                    <i class="bi bi-people-fill opacity-50" style="font-size: 80px;"></i>
                </div>
                <div class="card-footer text-body-secondary text-center" style="background-color: #da8c10;">
                    <a href="<?php echo Template::path(); ?>login&rol=patient" class="text-decoration-none fw-semibold text-white p-0">Ingresar</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-lg-3 mb-3">
            <div class="card" style="background-color: #dd4b39;">
                <div class="card-header text-white text-center">
                    Iniciar Sesion
                </div>
                <div class="card-body text-end">
                    <h2 class="card-title position-absolute text-white z-1">Administrador</h2>
                    <i class="bi bi-person-badge-fill opacity-50" style="font-size: 80px;"></i>
                </div>
                <div class="card-footer text-body-secondary text-center" style="background-color: #c74333;">
                    <a href="<?php echo Template::path(); ?>login&rol=admin" class="text-decoration-none fw-semibold text-white p-0">Ingresar</a>
                </div>
            </div>
        </div>
    </div>

</section>