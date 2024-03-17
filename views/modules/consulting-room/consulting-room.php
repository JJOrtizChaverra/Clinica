<?php

if ($_SESSION["rol"] !== "secretary") {
    echo "<script>window.location = '" . Template::path() . "home'</script>";

    return;
} else {

    // Trayendo los consultorios

    $column = null;
    $value = null;

    $consultingRooms = ConsultingRoomsController::viewConsultingRooms($column, $value);
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Gestor de consultorios</h1>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-header">

                <form method="post">

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" name="new-consulting" id="consulting" placeholder="Ingrese un nuevo consultorio" required>
                        </div>

                        <button style="margin-bottom: 8px;" type="submit" class="btn btn-primary">Crear Consultorio</button>

                    </div>

                    <?php

                    $newConsultingRoom = new ConsultingRoomsController();
                    $newConsultingRoom->createConsultingRoom();

                    ?>

                </form>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped" id="table-consulting-rooms">

                    <thead>

                        <tr>

                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Editar / Borrar</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($consultingRooms as $key => $consultingRoom) : ?>

                            <tr>

                                <td><?php echo ($key + 1); ?></td>
                                <td><?php echo $consultingRoom["name_consulting_room"]; ?></td>
                                <td>

                                    <div class="btn-group">

                                        <button style="margin-right: 8px;" data-toggle="modal" data-target="#modal-edit-consulting-room" data-whatever="@mdo" class="btn btn-success" onclick="editConsultingRoom(<?php echo $consultingRoom['id_consulting_room'] ?>, <?php echo ($key + 1); ?>)">
                                            <i class="fa fa-pencil"></i>
                                        </button>


                                        <a href="<?php echo Template::path(); ?>consulting-room&id=<?php echo $consultingRoom["id_consulting_room"]; ?>&delete=true">
                                            <button class="btn btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>
    </section>

</div>

<!-- Modal para editar consultorio -->
<div class="modal fade" id="modal-edit-consulting-room" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Editar consultorio</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name-consulting-room">Nombre</label>
                        <input type="text" class="form-control input-lg" name="name-consulting-room" id="name-consulting-room" required>

                    </div>
                </div>

                <input type="hidden" class="form-control input-lg" name="id-consulting-room" id="id-consulting-room" readonly required>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>

            <?php

            $editConsultingRoom = new ConsultingRoomsController();
            $editConsultingRoom->editConsultingRoom();

            ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php

$deleteConsultingRoom = new ConsultingRoomsController();
$deleteConsultingRoom->deleteConsultingRoom();

?>