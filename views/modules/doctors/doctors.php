<?php

if ($_SESSION["rol"] === "secretary") {
    // Trayendo los doctores
    $doctors = DoctorsController::viewDoctors(null, null);
} else {
    echo "<script>window.location = '" . Template::path() . "home'</script>";
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Gestor de doctores</h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo Template::path(); ?>home"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Doctores</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header">

                <a href="<?php Template::path() ?>create-doctor" class="btn btn-primary btn-lg">Registrar un Doctor</a>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped data-table">

                    <thead>

                        <tr>

                            <th>N°</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Genero</th>
                            <th>Consultorio</th>
                            <th>Foto</th>
                            <th>Editar / Borrar</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($doctors as $key => $doctor) : ?>

                            <tr>

                                <td><?php echo ($key + 1); ?></td>
                                <td><?php echo $doctor["document_doctor"]; ?></td>
                                <td><?php echo $doctor["name_doctor"]; ?></td>
                                <td><?php echo $doctor["lastname_doctor"]; ?></td>
                                <td><?php echo $doctor["gender_doctor"]; ?></td>

                                <?php

                                $column = "id_consulting_room";
                                $value = $doctor["id_consulting_room_doctor"];
                                $consultingRoomDoctor = ConsultingRoomsController::viewConsultingRooms($column, $value);

                                ?>

                                <td><?php echo $consultingRoomDoctor["name_consulting_room"]; ?></td>

                                <?php if ($doctor["picture_doctor"] !== null) : ?>

                                    <td><img style="cursor: pointer;" src="<?php echo Template::path(); ?>views/assets/img/<?php echo $doctor["rol_doctor"]; ?>/<?php echo $doctor["picture_doctor"]; ?>" class="img-responsive img-circle" alt="<?php echo $doctor["name_doctor"] . " " . $doctor["lastname_doctor"]; ?>" width="30" onclick="openImage(this)"></td>

                                <?php else : ?>

                                    <td><img src="<?php echo Template::path(); ?>views/assets/img/default.jpg" class="img-responsive img-circle" alt="<?php echo $doctor["name_doctor"] . " " . $doctor["lastname_doctor"]; ?>" width="30"></td>

                                <?php endif ?>

                                <td>

                                    <a href="<?php echo Template::path(); ?>edit-doctor&id=<?php echo $doctor["id_doctor"] ?>&edit=doctor" class="btn btn-success btn-edit-doctor" style="margin-right: 8px;">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <a href="<?php echo Template::path(); ?>doctors&id=<?php echo $doctor["id_doctor"]; ?>&current-picture=<?php echo explode(".", $doctor["picture_doctor"])[0]; ?>&delete=doctor" class="btn btn-danger">
                                        <i class="fa fa-times"></i>

                                        <?php

                                        $deleteDoctor = new DoctorsController();
                                        $deleteDoctor->deleteDoctor();

                                        ?>
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>
    </section>

</div>

<!-- Modal para crear un doctor -->
<div class="modal fade" id="modal-doctor" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title-modal-doctor">Registrar un doctor</h4>
            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->