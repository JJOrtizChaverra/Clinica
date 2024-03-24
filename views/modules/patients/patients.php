<?php

if (isset($_SESSION["rol"]) && $_SESSION["rol"] === "secretary") {

    $table1 = "patients";
    $table2 = null;
    $column = "id";
    $value = null;
    $select = "id_patient,document_patient,name_patient,lastname_patient,gender_patient,picture_patient";

    $patients = Controller::get($table1, $table2, $column, $value, $select);
} else {
    echo "<script>window.location = '" . TemplateController::path() . "home'</script>";
    return;
}

?>


<div class="container-xl">

    <section class="d-flex align-items-center justify-content-between p-3">
        <h1 class="fs-2">Gestor de Pacientes</h1>

        <nav class="d-none d-sm-flex align-items-center" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?php echo TemplateController::path() ?>home" class="breadcrumb-item">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pacientes</li>
            </ol>
        </nav>
    </section>

    <section class="p-3 border bg-white d-flex flex-column gap-3 rounded-3">

        <div class="header">
            <button type="button" class="btn background-primary btn-lg text-white fw-medium" data-bs-toggle="modal" data-bs-target="#modal-register-patients">Registrar un Paciente</button>
        </div>


        <div class="body">

            <div class="table-responsive">

                <table class="table table-striped rounded-1 data-table" id="table-patients">

                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Documento</th>
                            <th>Nombre/s</th>
                            <th>Apellido/s</th>
                            <th>Genero</th>
                            <th>Foto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($patients as $key => $patient) : ?>

                            <tr id=<?php echo $patient["id_patient"]; ?>>

                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $patient["document_patient"]; ?></td>
                                <td><?php echo $patient["name_patient"]; ?></td>
                                <td><?php echo $patient["lastname_patient"]; ?></td>
                                <td><?php echo $patient["gender_patient"]; ?></td>

                                <?php if ($patient["picture_patient"] !== null) : ?>
                                    <td><img src="<?php TemplateController::path(); ?>views/assets/img/patient/<?php echo $patient["picture_patient"]; ?>" alt="<?php echo $patient["name_patient"] . " " . $patient["lastname_patient"]; ?>" class="img-fluid rounded-circle" width="50px"></td>
                                <?php else : ?>
                                    <td><img src="<?php TemplateController::path(); ?>views/assets/img/default.jpg" alt="<?php echo $patient["name_patient"] . " " . $patient["lastname_patient"]; ?>" class="img-fluid rounded-circle" width="50px"></td>
                                <?php endif; ?>

                                <td>
                                    <button class="btn btn-success mb-2 my-tooltip button-edit-patient" data-bs-toggle="modal" data-bs-target="#modal-edit-patients">
                                        <span class="tooltip-text">
                                            Editar
                                        </span>
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <button class="btn btn-danger mb-2 my-tooltip button-delete-patient" data-bs-toggle="modal" data-bs-target="#modal-delete-patients">
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

<!-- Modal para registrar paciente -->
<div class="modal fade" id="modal-register-patients" tabindex="-1" aria-labelledby="modal-register-patientsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-register-patientsLabel">Registrar Paciente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-register-patient"></div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-register-patient" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="document-register" class="form-label fw-semibold">Documento</label>
                        <input type="number" class="form-control form-control-lg" id="document-register" name="document" placeholder="Numero de Documento del paciente" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="name-register" class="form-label fw-semibold">Nombre/s</label>
                        <input type="text" class="form-control form-control-lg" id="name-register" name="name" placeholder="Nombre/s del paciente" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="lastname-register" class="form-label fw-semibold">Apellido/s</label>
                        <input type="text" class="form-control form-control-lg" id="lastname-register" name="lastname" placeholder="Apellido/s del paciente" required>

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
                        <label for="password-register" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control form-control-lg" id="password-register" name="password" placeholder="Crea una contraseña para el paciente" required>

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


<!-- Modal para editar paciente -->
<div class="modal fade" id="modal-edit-patients" tabindex="-1" aria-labelledby="modal-edit-patientsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-edit-patientsLabel">Editar Paciente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-edit-patient"></div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-edit-patient" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="name-edit" class="form-label fw-semibold">Nombre/s</label>
                        <input type="text" class="form-control form-control-lg" id="name-edit" name="name" placeholder="Nombre/s del paciente" required>

                        <div class="invalid-feedback">El campo no puede estar vacío</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="lastname-edit" class="form-label fw-semibold">Apellido/s</label>
                        <input type="text" class="form-control form-control-lg" id="lastname-edit" name="lastname" placeholder="Apellido/s del paciente" required>

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
                        <label for="password-edit" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control form-control-lg" id="password-edit" name="password" placeholder="Cambiar la contraseña del paciente" required>

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


<!-- Modal para eliminar paciente -->
<div class="modal modal-sm fade" id="modal-delete-patients" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-delete-patientsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-delete-patientsLabel">Eliminar Paciente</h1>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-delete-patient"></div>

            <div class="modal-body text-center">
                ¿Esta seguro/a que desea eliminar a este paciente?
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn background-danger text-white" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn background-primary text-white" id="button-confirm-delete">Aceptar</button>
            </div>
        </div>
    </div>
</div>