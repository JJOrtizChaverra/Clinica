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

                <tr id="<?php echo $patient["id_patient"]; ?>">

                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $patient["document_patient"]; ?></td>
                    <td><?php echo $patient["name_patient"]; ?></td>
                    <td><?php echo $patient["lastname_patient"]; ?></td>
                    <td><?php echo $patient["gender_patient"]; ?></td>

                    <?php if ($patient["picture_patient"] !== null) : ?>

                        <td><img src="<?php TemplateController::path(); ?>views/assets/img/patient/<?php echo $patient["picture_patient"]; ?>" class="img-fluid rounded-circle image-user cursor-pointer" width="50px" alt="<?php echo $patient["name_patient"]." ".$patient["lastname_patient"] ?>"></td>

                    <?php else : ?>

                        <td><img src="<?php TemplateController::path(); ?>views/assets/img/default.jpg" class="img-fluid rounded-circle" width="50px" alt="<?php echo $patient["name_patient"]." ".$patient["lastname_patient"] ?>"></td>

                    <?php endif; ?>

                    <td>
                        <button class="btn btn-success mb-2 my-tooltip button-update-patient" data-bs-toggle="modal" data-bs-target="#modal-update-patient">
                            <span class="tooltip-text">
                                Editar
                            </span>
                            <i class="bi bi-pencil-square"></i>
                        </button>

                        <button class="btn btn-danger mb-2 my-tooltip button-delete-patient">
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