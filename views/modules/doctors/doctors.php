<?php

if (isset($_SESSION["rol"]) && $_SESSION["rol"] === "secretary") {

    $table1 = "doctors";
    $table2 = "consulting_rooms";
    $column = "id";
    $value = null;
    $select = "id_doctor,document_doctor,name_doctor,lastname_doctor,gender_doctor,name_consulting_room,picture_doctor";

    $doctors = Controller::get($table1, $table2, $column, $value, $select);

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
        <h1 class="fs-2">Gestor de Doctores</h1>

        <nav class="d-none d-sm-flex align-items-center" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?php echo TemplateController::path() ?>home" class="breadcrumb-item">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Doctores</li>
            </ol>
        </nav>
    </section>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3">

        <div class="header">
            <button type="button" class="btn background-primary btn-lg text-white fw-medium" data-bs-toggle="modal" data-bs-target="#modal-register-doctors">Registrar un Doctor</button>
        </div>


        <div class="body">

            <div class="table-responsive">

                <table class="table table-striped rounded-1 data-table" id="table-doctors">

                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Documento</th>
                            <th>Nombre/s</th>
                            <th>Apellido/s</th>
                            <th>Genero</th>
                            <th>Consultorio</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($doctors as $key => $doctor) : ?>

                            <tr id=<?php echo $doctor["id_doctor"]; ?> >

                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $doctor["document_doctor"]; ?></td>
                                <td><?php echo $doctor["name_doctor"]; ?></td>
                                <td><?php echo $doctor["lastname_doctor"]; ?></td>
                                <td><?php echo $doctor["gender_doctor"]; ?></td>
                                <td><?php echo $doctor["name_consulting_room"]; ?></td>

                                <?php if ($doctor["picture_doctor"] !== null) : ?>
                                    <td><img src="<?php TemplateController::path(); ?>views/assets/img/doctor/<?php echo $doctor["picture_doctor"]; ?>" alt="<?php echo $doctor["name_doctor"] . " " . $doctor["lastname_doctor"]; ?>" class="img-fluid rounded-circle" width="50px"></td>
                                <?php else : ?>
                                    <td><img src="<?php TemplateController::path(); ?>views/assets/img/default.jpg" alt="<?php echo $doctor["name_doctor"] . " " . $doctor["lastname_doctor"]; ?>" class="img-fluid rounded-circle" width="50px"></td>
                                <?php endif; ?>

                                <td>
                                    <button class="btn btn-success mb-2 my-tooltip button-edit-doctor" data-bs-toggle="modal" data-bs-target="#modal-edit-doctors">
                                        <span class="tooltip-text">
                                            Editar
                                        </span>
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <button class="btn btn-danger mb-2 my-tooltip button-delete-doctor" data-bs-toggle="modal" data-bs-target="#modal-delete-doctors">
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

<!-- Modal para registrar doctores -->
<div class="modal fade" id="modal-register-doctors" tabindex="-1" aria-labelledby="modal-register-doctorsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-register-doctorsLabel">Registrar Doctor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-register-doctor" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="document-register" class="form-label fw-semibold">Documento</label>
                        <input type="number" class="form-control form-control-lg" id="document-register" name="document" placeholder="Numero de Documento del doctor" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="name-register" class="form-label fw-semibold">Nombre/s</label>
                        <input type="text" class="form-control form-control-lg" id="name-register" name="name" placeholder="Nombre/s del doctor" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="lastname-register" class="form-label fw-semibold">Apellido/s</label>
                        <input type="text" class="form-control form-control-lg" id="lastname-register" name="lastname" placeholder="Apellido/s del doctor" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="gender-register" class="form-label fw-semibold">Genero</label>

                        <select class="form-select form-select-lg" id="gender-register" name="gender" aria-label="Large select example" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>

                        <div class="invalid-feedback">Debes seleccionar un genero</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="consulting-room-register" class="form-label fw-semibold">Consultorio</label>

                        <select class="form-select form-select-lg" id="consulting-room-register" name="id_consulting_room" aria-label="Large select example" required>

                            <?php foreach ($consultingRooms as $key => $consultingRoom) : ?>
                                <option value="<?php echo $consultingRoom["id_consulting_room"]; ?>"><?php echo $consultingRoom["name_consulting_room"]; ?></option>
                            <?php endforeach; ?>

                        </select>

                        <div class="invalid-feedback">Debes seleccionar un consultorio</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="password-register" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control form-control-lg" id="password-register" name="password" placeholder="Crea una contraseña para el doctor" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                </div>

                <div class="alert text-center m-2" role="alert" id="alert-register-doctor"></div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn background-primary text-white">Aceptar</button>
                </div>

            </form>
        </div>
    </div>
</div>


<!-- Modal para editar doctor -->
<div class="modal fade" id="modal-edit-doctors" tabindex="-1" aria-labelledby="modal-edit-doctorsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-edit-doctorsLabel">Editar Doctor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-edit-doctor"></div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-edit-doctor" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="name-edit" class="form-label fw-semibold">Nombre/s</label>
                        <input type="text" class="form-control form-control-lg" id="name-edit" name="name" placeholder="Nombre/s del doctor" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="lastname-edit" class="form-label fw-semibold">Apellido/s</label>
                        <input type="text" class="form-control form-control-lg" id="lastname-edit" name="lastname" placeholder="Apellido/s del doctor" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="gender-edit" class="form-label fw-semibold">Genero</label>

                        <select class="form-select form-select-lg" id="gender" name="gender" aria-label="Large select example" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>

                        <div class="invalid-feedback">Debes seleccionar un genero</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="consulting-room-edit" class="form-label fw-semibold">Consultorio</label>

                        <select class="form-select form-select-lg" id="consulting-room-edit" name="id_consulting_room" aria-label="Large select example" required>

                            <?php foreach ($consultingRooms as $key => $consultingRoom) : ?>
                                <option value="<?php echo $consultingRoom["id_consulting_room"]; ?>"><?php echo $consultingRoom["name_consulting_room"]; ?></option>
                            <?php endforeach; ?>

                        </select>

                        <div class="invalid-feedback">Debes seleccionar un consultorio</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="password-edit" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control form-control-lg" id="password-edit" name="password" placeholder="Cambiar la contraseña del doctor" required>

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


<!-- Modal para eliminar doctor -->
<div class="modal modal-sm fade" id="modal-delete-doctors" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-delete-doctorsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-delete-doctorsLabel">Eliminar Doctor</h1>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-delete-doctor"></div>

            <div class="modal-body text-center">
                ¿Esta seguro/a que desea eliminar a este doctor?
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn background-danger text-white" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn background-primary text-white" id="button-confirm-delete">Aceptar</button>
            </div>
        </div>
    </div>
</div>