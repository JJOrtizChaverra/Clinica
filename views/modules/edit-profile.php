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
                            <input type="text" class="form-control input-lg" name="profile-name" id="name" value="<?php echo $profile["name_user"]; ?>">

                            <input type="hidden" class="form-control input-lg" name="profile-id" value="<?php echo $profile["id_user"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Apellido</label>
                            <input type="text" class="form-control input-lg" name="profile-lastname" id="lastname" value="<?php echo $profile["lastname_user"]; ?>">
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group text-center">
                            <label for="image">
                                <?php if ($profile["picture_user"] !== null) : ?>

                                    <td><img src="<?php echo Template::path(); ?>views/assets/img/users/<?php echo $profile["picture_user"]; ?>" class="img-responsive img-circle" alt="<?php echo $_SESSION["displayname"]; ?>" width="150"></td>

                                <?php else : ?>

                                    <td><img src="<?php echo Template::path(); ?>views/assets/img/default.jpg" class="img-responsive img-circle" alt="<?php echo $_SESSION["displayname"]; ?>" width="150"></td>

                                <?php endif ?>
                            </label>

                            <input type="file" id="image" name="profile-image" style="margin: 0 auto;">
                            <input type="hidden" name="current-img">
                        </div>
                    </div>

                    <div class="text-center">
                        <button style="margin-bottom: 8px;" type="submit" class="btn btn-success">Submit</button>

                        <div>
                            <a href="">Cambiar contraseña</a>
                        </div>
                    </div>


                    <?php

                    $editProfile = new UsersController();
                    $editProfile->editProfile();

                    ?>

                </form>
            </div>
        </div>
    </section>
</div>