<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Clinica Medica</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Ingresar como <?php echo $_GET["rol"]; ?>
        </p>

        <form method="post" style="margin-bottom: 8px;">
            <div class="form-group has-feedback">
                <input type="number" class="form-control" name="login-user" placeholder="Usuario" required>
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
    <!-- /.login-box-body -->
</div>