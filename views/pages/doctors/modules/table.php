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

                <tr id="<?php echo $doctor["id_doctor"]; ?>" class="update-success">

                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $doctor["document_doctor"]; ?></td>
                    <td><?php echo $doctor["name_doctor"]; ?></td>
                    <td><?php echo $doctor["lastname_doctor"]; ?></td>
                    <td><?php echo $doctor["gender_doctor"]; ?></td>
                    <td><?php echo $doctor["name_consulting_room"]; ?></td>

                    <?php if ($doctor["picture_doctor"] !== null) : ?>

                        <td><img src="<?php TemplateController::path(); ?>views/assets/img/doctor/<?php echo $doctor["picture_doctor"]; ?>" class="img-fluid rounded-circle image-user cursor-pointer" width="50px" alt="<?php echo $doctor["name_doctor"]." ".$doctor["lastname_doctor"] ?>"></td>

                    <?php else : ?>

                        <td><img src="<?php TemplateController::path(); ?>views/assets/img/default.jpg" class="img-fluid rounded-circle" width="50px" alt="<?php echo $doctor["name_doctor"]." ".$doctor["lastname_doctor"] ?>"></td>

                    <?php endif; ?>

                    <td>
                        <button class="btn btn-success mb-2 my-tooltip button-update-doctor" data-bs-toggle="modal" data-bs-target="#modal-update-doctor">
                            <span class="tooltip-text">
                                Editar
                            </span>
                            <i class="bi bi-pencil-square"></i>
                        </button>

                        <button class="btn btn-danger mb-2 my-tooltip button-delete-doctor">
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