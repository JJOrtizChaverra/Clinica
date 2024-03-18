<?php

if (
    $_SESSION["rol"] === "secretary" ||
    $_SESSION["rol"] === "doctor" ||
    $_SESSION["rol"] === "patient" ||
    $_SESSION["rol"] === "admin"
) {

    if (!isset($_GET["id"]) && !$_GET["id"] == $_SESSION["id"]) {
        echo "<script>window.location = '" . Template::path() . "home'</script>";
        return;
    }
} else {
    echo "<script>window.location = '" . Template::path() . "home'</script>";
    return;
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <?php if ($_SESSION["rol"] === "secretary") : ?>
            <h1>Gestor de perfil - <b>Secretaria</b></h1>
        <?php endif ?>

        <?php if ($_SESSION["rol"] === "doctor") : ?>
            <h1>Gestor de perfil - <b>Doctor</b></h1>
        <?php endif ?>

        <?php if ($_SESSION["rol"] === "patient") : ?>
            <h1>Gestor de perfil - <b>Paciente</b></h1>
        <?php endif ?>

        <?php if ($_SESSION["rol"] === "admin") : ?>
            <h1>Gestor de perfil - <b>Administrador</b></h1>
        <?php endif ?>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">

                <form method="post" enctype="multipart/form-data">

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="document">Documento</label>
                            <input type="text" class="form-control input-lg" id="document" value="<?php echo $_SESSION["document"]; ?>" readonly disabled required>
                        </div>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control input-lg" name="profile-name" id="name" value="<?php echo $_SESSION["name"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Apellido</label>
                            <input type="text" class="form-control input-lg" name="profile-lastname" id="lastname" value="<?php echo $_SESSION["lastname"]; ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group text-center">
                            <label for="image">
                                <?php if ($_SESSION["picture"] !== null) : ?>

                                    <td><img id="container-image" src="<?php echo Template::path(); ?>views/assets/img/<?php echo $_SESSION["rol"]; ?>/<?php echo $_SESSION["picture"]; ?>" class="img-responsive img-circle" alt="<?php echo $_SESSION["displayname"]; ?>" width="150"></td>

                                <?php else : ?>

                                    <td><img id="container-image" src="<?php echo Template::path(); ?>views/assets/img/default.jpg" class="img-responsive img-circle" alt="<?php echo $_SESSION["displayname"]; ?>" width="150"></td>

                                <?php endif ?>
                            </label>

                            <input type="file" id="image" name="profile-image" style="margin: 0 auto;" onchange="showPicture(event)">
                            <input type="hidden" name="current-image" value="<?php echo $_SESSION["picture"]; ?>">
                        </div>
                    </div>

                    <div class="text-center">
                        <button style="margin-bottom: 8px; margin-right: 8px;" type="submit" class="btn btn-success">Guardar</button>

                        <a href="<?php echo Template::path(); ?>home">
                            <button style="margin-bottom: 8px;" type="button" class="btn btn-danger">Cancelar</button>
                        </a>

                        <div>
                            <a type="button" class="btn" data-toggle="modal" data-target="#modal-change-password" data-whatever="@mdo">Cambiar contraseña</a>
                        </div>
                    </div>

                    <?php

                    $editProfile = new UsersController();
                    $editProfile->editProfile($_SESSION["rol"]);

                    ?>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- Modal para cambiar contraseña -->

<div class="modal fade" id="modal-change-password" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Cambiar contraseña</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="new-password">Nueva contraseña</label>
                        <input type="password" class="form-control input-lg" name="profile-new-password" id="new-password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>

            <?php

            $changePassword = new UsersController();
            $changePassword->changePassword($_SESSION["rol"]);

            ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->