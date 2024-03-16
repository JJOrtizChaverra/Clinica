<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Clinica Medica</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Ingresar como
            <?php

            if (isset($_GET["url"])) {
                if (isset($_GET["secretary"])) {
                    echo "Secretaria";
                }
            }

            ?>
        </p>

        <form method="post" style="margin-bottom: 8px;">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="login-user" placeholder="Usuario">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="login-password" placeholder="Contraseña">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="#">Olvide mi contraseña</a><br>
    </div>
    <!-- /.login-box-body -->
</div>