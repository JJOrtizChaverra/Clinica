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
    <section class="content-header">

        <h1>Gestor de Perfil</h1>

    </section>

    <section class="content">
        <div class="box">

            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">

                    <thead>

                        <tr>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Foto</th>
                            <th>Editar</th>
                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <td><?php echo $profile["username_user"]; ?></td>
                            <td><?php echo $profile["name_user"]; ?></td>
                            <td><?php echo $profile["lastname_user"]; ?></td>

                            <?php if ($profile["picture_user"] !== null) : ?>
                                <td><img src="<?php echo Template::path(); ?>views/assets/img/users/<?php echo $profile["picture_user"]; ?>" class="img-responsive img-circle" alt="<?php echo $_SESSION["displayname"]; ?>" width="25"></td>
                            <?php else : ?>

                                <td><img src="<?php echo Template::path(); ?>views/assets/img/default.jpg" class="img-responsive img-circle" alt="<?php echo $_SESSION["displayname"]; ?>" width="25"></td>

                            <?php endif ?>
                            <td>
                                <a href="<?php echo Template::path(); ?>edit-profile/<?php echo $profile["id_user"]; ?>">
                                    <button class='btn btn-success'><i class='fa fa-pencil'></i></button>
                                </a>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>
    </section>
</div>