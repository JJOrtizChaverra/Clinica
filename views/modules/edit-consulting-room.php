<?php

if ($_SESSION["rol"] !== "secretary") {
    echo "<script>window.location = '" . Template::path() . "home'</script>";

    return;
} else {

    if (isset($_GET["id"])) {

        if (is_numeric($_GET["id"])) {

            // Trayendo los consultorios
            $column = "id_consulting_room";
            $value = $_GET["id"];

            $consultingRooms = ConsultingRoomsController::viewConsultingRooms($column, $value);

            if (!$consultingRooms) {
                echo "<script>window.location = '" . Template::path() . "consulting-room'</script>";
            }
        } else {
            echo "<script>window.location = '" . Template::path() . "consulting-room'</script>";
        }
    } else {
        echo "<script>window.location = '" . Template::path() . "consulting-room'</script>";
    }
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Editar consultorio</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="post" enctype="multipart/form-data">

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="name">Nombre del consultorio</label>
                            <input type="text" class="form-control input-lg" name="consulting-room-name" id="name" value="<?php echo $consultingRooms["name_consulting_room"]; ?>" required>
                        </div>

                        <button style="margin-right: 8px;" type="submit" class="btn btn-success">Guardar</button>

                        <a href="<?php echo Template::path(); ?>consulting-room">
                            <buzton type="submit" class="btn btn-danger">Cancelar</button>
                        </a>
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