<?php

if (isset($_SESSION["rol"]) && $_SESSION["rol"] === "secretary") {

    $table1 = "consulting_rooms";
    $table2 = null;
    $column = "id";
    $value = null;
    $select = "*";

    $consultingRooms = Controller::get($table1, $table2, $column, $value, $select);
} else {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}

?>


<div class="container-xl">

    <section class="d-flex align-items-center justify-content-between p-3">
        <h1 class="fs-2">Gestor de Consultorios</h1>

        <nav class="d-none d-sm-flex align-items-center" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?php echo TemplateController::path() ?>home" class="breadcrumb-item">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consultorios</li>
            </ol>
        </nav>
    </section>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3">

        <div class="header">
            <button type="button" class="btn background-primary btn-lg text-white fw-medium" data-bs-toggle="modal" data-bs-target="#modal-register-consulting_rooms">Registrar un Consultorio</button>
        </div>


        <div class="body">

            <div class="table-responsive">

                <table class="table table-striped rounded-1 data-table" id="table-consulting_rooms">

                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre del consultorio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($consultingRooms as $key => $consultingRoom) : ?>

                            <tr id=<?php echo $consultingRoom["id_consulting_room"]; ?>>

                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $consultingRoom["name_consulting_room"]; ?></td>

                                <td>
                                    <button class="btn btn-success mb-2 my-tooltip button-edit-consulting_room" data-bs-toggle="modal" data-bs-target="#modal-edit-consulting_rooms">
                                        <span class="tooltip-text">
                                            Editar
                                        </span>
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <button class="btn btn-danger mb-2 my-tooltip button-delete-consulting_room" data-bs-toggle="modal" data-bs-target="#modal-delete-consulting_rooms">
                                        <span class="tooltip-text">
                                            Eliminar
                                        </span>
                                        <i class="bi bi-x-square"></i>
                                    </button>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </section>
</div>

<!-- Modal para register consutorio -->
<div class="modal fade modal-dialog-scrollable" id="modal-register-consulting_rooms" tabindex="-1" aria-labelledby="modal-register-consulting_roomLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-register-consulting_roomLabel">Registrar Consultorio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-register-consulting_room"></div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-register-consulting_room" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="name-register" class="form-label fw-semibold">Nombre</label>
                        <input type="text-number" class="form-control form-control-lg" id="name-register" name="name" placeholder="Nombre del consultorio" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn background-primary text-white">Aceptar</button>
                </div>

            </form>
        </div>
    </div>
</div>


<!-- Modal para edit consutorio -->
<div class="modal fade modal-dialog-scrollable" id="modal-edit-consulting_rooms" tabindex="-1" aria-labelledby="modal-edit-consulting_roomLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-edit-consulting_roomLabel">Editar Consultorio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-edit-consulting_room"></div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-edit-consulting_room" novalidate>

                <div class="modal-body">


                    <div class="mb-3 has-validation col-12">
                        <label for="name-edit" class="form-label fw-semibold">Nombre</label>
                        <input type="text-number" class="form-control form-control-lg" id="name-edit" name="name" placeholder="Nombre del consultorio" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn background-primary text-white" id="button-confirm-edit">Guardar cambios</button>
                </div>

            </form>
        </div>
    </div>
</div>


<!-- Modal para delete consulting_room -->
<div class="modal modal-sm fade" id="modal-delete-consulting_rooms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-delete-consulting_roomLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-delete-consulting_roomLabel">Eliminar Consultorio</h1>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-delete-consulting_room"></div>

            <div class="modal-body text-center">
                ¿Esta seguro/a que desea eliminar este consultorio?
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn background-danger text-white" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn background-primary text-white" id="button-confirm-delete">Aceptar</button>
            </div>
        </div>
    </div>
</div>