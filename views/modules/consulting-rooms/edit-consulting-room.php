<?php

if ($_SESSION["rol"] === "secretary") {

    if (isset($_GET["id"]) && isset($_GET["edit"])) {

        if (is_numeric($_GET["id"]) && $_GET["edit"] === "consulting-room") {

            // Trayendo los consultorios
            $consultingRoomEdit = ConsultingRoomsController::viewConsultingRooms("id_consulting_room", $_GET["id"]);

            if (!$consultingRoomEdit) {
                echo "<script>window.location = '" . Template::path() . "consulting-rooms'</script>";
                return;
            }
        } else {
            echo "<script>window.location = '" . Template::path() . "consulting-rooms'</script>";
            return;
        }
    } else {
        echo "<script>window.location = '" . Template::path() . "consulting-rooms'</script>";
        return;
    }
} else {
    echo "<script>window.location = '" . Template::path() . "home'</script>";
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Editar consultorio</h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo Template::path(); ?>home"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="<?php echo Template::path(); ?>consulting-rooms"> Consultorios</a></li>
            <li class="active"> Editar consultorio</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <form method="post">

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="name-consulting-room">Nombre</label>
                            <input type="text" class="form-control input-lg" name="name-consulting-room" id="name-consulting-room" value="<?php echo $consultingRoomEdit["name_consulting_room"]; ?>" required>

                        </div>

                        <div>
                            <button style="margin-right: 8px;" type="submit" class="btn btn-primary">Guardar cambios</button>

                            <a href="<?php echo Template::path(); ?>consulting-rooms" class="btn btn-danger">Cancelar</a>
                        </div>

                    </div>

                    <?php

                    $editConsultingRoom = new ConsultingRoomsController();
                    $editConsultingRoom->editConsultingRoom();

                    ?>

                </form>
            </div>
        </div>
    </section>
</div>