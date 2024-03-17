<?php

if (isset($_SESSION["rol"]) && $_SESSION["rol"] !== "secretary") {
    echo "<script>window.location = '" . Template::path() . "home'</script>";

    return;
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
                    $newConsultingRoom -> createConsultingRoom();
                    
                    ?>

                </form>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-hover table-striped">

                    <thead>

                        <tr>

                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Editar / Borrar</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>1</td>
                            <td>Cardiologia</td>
                            <td>

                                <div class="btn-group">

                                    <button style="margin-right: 12px;" class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>
    </section>

</div>