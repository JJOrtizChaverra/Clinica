<!-- <div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Clinica Medica</b></a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Ingresar como <?php echo $_GET["rol"]; ?>
        </p>

        <form method="post" style="margin-bottom: 8px;">
            <div class="form-group has-feedback">
                <input type="number" class="form-control" name="login-document" placeholder="Documento" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="login-password" placeholder="Contraseña" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            </div>
            <div class="row">

                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>

            </div>

            <?php

            $login = new UsersController();
            $login->login($_GET["rol"]);

            ?>

        </form>

        <a href="#">Olvide mi contraseña</a><br>
    </div>
</div> -->


<div class="container-fluid h-100 d-flex flex-column justify-content-center align-items-center">

    <center>
        <h1>Clinica Medica</h1>
    </center>

    <div class="container-sm bg-white p-3 mt-4 rounded" style="max-width: 350px;">

        <p class="text-center">Ingresar como <?php echo $_GET["rol"]; ?></p>

        <form class="row g-3 needs-validation d-flex flex-column justify-content-evenly" novalidate>

            <div class="col-12">
                <div class="input-group has-validation">

                    <input type="text" class="form-control" id="login-document" name="login-document" placeholder="Ingresa tu documento" aria-describedby="inputGroupPrepend" required>

                    <span class="input-group-text" id="inputGroupPrepend">
                        <i class="bi bi-person-vcard-fill"></i>
                    </span>

                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="input-group has-validation">

                    <input type="text" class="form-control" id="login-password" name="login-password" placeholder="Ingresa tu contraseña" aria-describedby="inputGroupPrepend" required>

                    <span class="input-group-text" id="inputGroupPrepend">
                        <i class="bi bi-lock-fill"></i>
                    </span>

                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <button class="btn background-primary text-white" type="submit">Ingresar</button>
            </div>
        </form>
    </div>
</div>