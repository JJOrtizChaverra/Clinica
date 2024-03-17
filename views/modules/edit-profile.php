<?php

if (
    $_SESSION["rol"] === "secretary" ||
    $_SESSION["rol"] === "doctor" ||
    $_SESSION["rol"] === "patient" ||
    $_SESSION["rol"] === "admin"
) {

    $profile = UsersController::viewProfile();
} else {
    echo "<script>window.location = '" . Template::path() . "home'</script>";
    return;
}

?>

<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">

                <form method="post" enctype="multipart/form-data">

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control input-lg" name="profile-name" id="name" value="<?php echo $profile["name_user"]; ?>" required>

                            <input type="hidden" class="form-control input-lg" name="profile-id" value="<?php echo $profile["id_user"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Apellido</label>
                            <input type="text" class="form-control input-lg" name="profile-lastname" id="lastname" value="<?php echo $profile["lastname_user"]; ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group text-center">
                            <label for="image">
                                <?php if ($profile["picture_user"] !== null) : ?>

                                    <td><img id="container-image" src="<?php echo Template::path(); ?>views/assets/img/<?php echo $profile["rol_user"]; ?>/<?php echo $profile["picture_user"]; ?>" class="img-responsive img-circle" alt="<?php echo $_SESSION["displayname"]; ?>" width="150"></td>

                                <?php else : ?>

                                    <td><img id="container-image" src="<?php echo Template::path(); ?>views/assets/img/default.jpg" class="img-responsive img-circle" alt="<?php echo $_SESSION["displayname"]; ?>" width="150"></td>

                                <?php endif ?>
                            </label>

                            <input type="file" id="image" name="profile-image" style="margin: 0 auto;" onchange="showPicture(event)">
                            <input type="hidden" name="current-img" value="<?php echo $profile["picture_user"]; ?>">
                        </div>
                    </div>

                    <div class="text-center">
                        <button style="margin-bottom: 8px;" type="submit" class="btn btn-success">Guardar</button>

                        <div>
                            <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Cambiar contraseña</a>
                        </div>
                    </div>

                    <?php

                    $editProfile = new UsersController();
                    $editProfile->editProfile($profile["rol_user"]);

                    ?>
                </form>
            </div>
        </div>
    </section>
</div>

<!-- Modal para cambiar contraseña -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
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

                        <input type="hidden" class="form-control input-lg" name="profile-id" value="<?php echo $profile["id_user"]; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>

            <?php

            $changePassword = new UsersController();
            $changePassword->changePassword();

            ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->