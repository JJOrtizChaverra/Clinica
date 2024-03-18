<?php

if ($_SESSION["rol"] !== "secretary") {

    echo "<script>window.location = '" . Template::path() . "home'</script>";
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Crear un consultorio</h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo Template::path(); ?>home"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="<?php echo Template::path(); ?>consulting-rooms"> Consultorios</a></li>
            <li class="active"> Crear consultorio</li>
        </ol>
    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <form method="post">

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="name-consulting-room">Nombre del consultorio</label>
                            <input type="text" class="form-control input-lg" name="name-consulting-room" id="name-consulting-room" placeholder="Ingrese el nombre del consultorio" required>
                        </div>

                        <div>
                            <button style="margin-right: 8px;" type="submit" class="btn btn-primary">Crear Consultorio</button>
                            
                            <a href="<?php echo Template::path(); ?>consulting-rooms" class="btn btn-danger">Cancelar</a>
                        </div>

                    </div>

                    <?php

                    $newConsultingRoom = new ConsultingRoomsController();
                    $newConsultingRoom->createConsultingRoom();

                    ?>

                </form>
            </div>
        </div>
    </section>
</div>