<?php

if ($_SESSION["rol"] === "secretary") {

    // Trayendo los consultorios
    $consultingRooms = ConsultingRoomsController::viewConsultingRooms(null, null);
} else {
    echo "<script>window.location = '" . Template::path() . "home'</script>";
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Registrar Doctor</h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo Template::path(); ?>home"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="<?php echo Template::path(); ?>doctors"> Doctores</a></li>
            <li class="active"> Crear doctor</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-body">

                <form method="post" enctype="multipart/form-data">

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="name-doctor">Nombre<sup class="text-red">*</sup></label>
                            <input type="text" class="form-control input-lg" name="name-doctor" id="name-doctor" placeholder="Ingrese el/los nombres" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="lastname-doctor">Apellido<sup class="text-red">*</sup></label>
                            <input type="text" class="form-control input-lg" name="lastname-doctor" id="lastname-doctor" placeholder="Ingrese el/los apellidos" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="document-doctor">Documento<sup class="text-red">*</sup></label>
                            <input type="number" class="form-control input-lg" name="document-doctor" id="document-doctor" placeholder="Ingrese el numero de documento" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="password-doctor">Contraseña<sup class="text-red">*</sup></label>
                            <input type="password" class="form-control input-lg" name="password-doctor" id="password-doctor" placeholder="Ingrese una contraseña" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="gender-doctor">Genero<sup class="text-red">*</sup></label>

                            <select name="gender-doctor" id="gender-doctor" class="form-control input-lg" required>

                                <option value="" disabled selected>Seleccione un genero</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>

                            </select>
                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="id-consulting-room-doctor">Consultorio<sup class="text-red">*</sup></label>

                            <select name="id-consulting-room-doctor" id="id-consulting-room-doctor" class="form-control input-lg" required>
                                <option disabled selected>Seleccione un consultorio</option>
                                <?php foreach ($consultingRooms as $key => $consultingRoom) : ?>

                                    <option value="<?php echo $consultingRoom["id_consulting_room"] ?>"><?php echo $consultingRoom["name_consulting_room"]; ?></option>

                                <?php endforeach; ?>
                            </select>

                        </div>

                    </div>

                    <div class="col-12 text-center">

                        <button style="margin-right: 8px;" type="submit" class="btn btn-primary">Registrar</button>
                        <a href="<?php echo Template::path() ?>doctors" class="btn btn-danger">Cancelar</a>

                    </div>

                    <?php

                    $createDoctor = new DoctorsController();
                    $createDoctor->createDoctor();

                    ?>
                </form>
            </div>
        </div>
    </section>
</div>