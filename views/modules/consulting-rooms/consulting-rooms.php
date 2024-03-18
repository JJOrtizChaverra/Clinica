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
        <h1>Gestor de consultorios</h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo Template::path(); ?>home"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Consultorios</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">

                <a href="<?php Template::path(); ?>create-consulting-room" class="btn btn-primary btn-lg" ">Registrar un Consultorio</a>

            </div>


            <div class=" box-body">

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

                                        <a href="<?php echo Template::path(); ?>edit-consulting-room&id=<?php echo $consultingRoom["id_consulting_room"]; ?>&edit=consulting-room" class="btn btn-success" style="margin-right: 8px;">

                                            <i class="fa fa-pencil"></i>

                                        </a>

                                        <a href="<?php echo Template::path(); ?>consulting-rooms&id=<?php echo $consultingRoom["id_consulting_room"]; ?>&delete=consulting-room" class="btn btn-danger">

                                            <i class="fa fa-times"></i>

                                            <?php

                                            $deleteConsultingRoom = new ConsultingRoomsController();
                                            $deleteConsultingRoom->deleteConsultingRoom();

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