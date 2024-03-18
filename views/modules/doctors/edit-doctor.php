<?php

if ($_SESSION["rol"] === "secretary") {

    if (isset($_GET["id"]) && isset($_GET["edit"])) {

        if (is_numeric($_GET["id"]) && $_GET["edit"] === "doctor") {

            // Trayendo los consultorios
            $consultingRooms = ConsultingRoomsController::viewConsultingRooms(null, null);

            // Trayendo el doctor a editar
            $doctorEdit = DoctorsController::viewDoctors("id_doctor", $_GET["id"]);

            if (!$doctorEdit) {
                echo "<script>window.location = '" . Template::path() . "doctors'</script>";
                return;
            }
        } else {
            echo "<script>window.location = '" . Template::path() . "doctors'</script>";
            return;
        }
    } else {
        echo "<script>window.location = '" . Template::path() . "doctors'</script>";
        return;
    }
} else {
    echo "<script>window.location = '" . Template::path() . "home'</script>";
    return;
}
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Editar Doctor</h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo Template::path(); ?>home"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="<?php echo Template::path(); ?>doctors"> Doctores</a></li>
            <li class="active"> Editar doctor</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-body">

                <form method="post" enctype="multipart/form-data">

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="name-doctor">Nombre<sup class="text-red">*</sup></label>
                            <input type="text" class="form-control input-lg" name="name-doctor" id="name-doctor" value="<?php echo $doctorEdit["name_doctor"]; ?>" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="lastname-doctor">Apellido<sup class="text-red">*</sup></label>
                            <input type="text" class="form-control input-lg" name="lastname-doctor" id="lastname-doctor" value="<?php echo $doctorEdit["lastname_doctor"]; ?>" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="document-doctor">Documento<sup class="text-red">*</sup></label>
                            <input type="number" class="form-control input-lg" name="document-doctor" id="document-doctor" value="<?php echo $doctorEdit["document_doctor"]; ?>" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="password-doctor">Contraseña</label>
                            <input type="password" class="form-control input-lg" name="password-doctor" id="password-doctor">

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="gender-doctor">Genero<sup class="text-red">*</sup></label>

                            <select name="gender-doctor" id="gender-doctor" class="form-control input-lg" required>

                                <?php if ($doctorEdit["gender_doctor"] === "Masculino") : ?>

                                    <option value="Masculino" selected>Masculino</option>
                                    <option value="Femenino">Femenino</option>

                                <?php else : ?>

                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino" selected>Femenino</option>

                                <?php endif; ?>

                            </select>
                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="id-consulting-room-doctor">Consultorio<sup class="text-red">*</sup></label>

                            <select name="id-consulting-room-doctor" id="id-consulting-room-doctor" class="form-control input-lg" required>
                                <?php foreach ($consultingRooms as $key => $consultingRoom) : ?>

                                    <?php if ($consultingRoom["id_consulting_room"] == $doctorEdit["id_consulting_room_doctor"]) : ?>

                                        <option value="<?php echo $consultingRoom["id_consulting_room"] ?>" selected><?php echo $consultingRoom["name_consulting_room"]; ?></option>

                                    <?php else : ?>

                                        <option value="<?php echo $consultingRoom["id_consulting_room"] ?>"><?php echo $consultingRoom["name_consulting_room"]; ?></option>

                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </select>

                        </div>

                    </div>

                    <div class="col-12 text-center">

                        <button style="margin-right: 8px;" type="submit" class="btn btn-primary">Guardar cambios</button>
                        <a href="<?php echo Template::path() ?>doctors" class="btn btn-danger">Cancelar</a>

                    </div>

                    <?php

                    $editDoctor = new DoctorsController();
                    $editDoctor->editDoctor();

                    ?>
                </form>
            </div>
        </div>
    </section>
</div>