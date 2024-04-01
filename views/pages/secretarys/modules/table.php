<div class="table-responsive">
    <table class="table table-striped rounded-1 data-table" id="table-secretarys">

        <thead>
            <tr>
                <th>N°</th>
                <th>Documento</th>
                <th>Nombre/s</th>
                <th>Apellido/s</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($secretarys as $key => $secretary) : ?>

                <tr id="<?php echo $secretary["id_secretary"]; ?>">

                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $secretary["document_secretary"]; ?></td>
                    <td><?php echo $secretary["name_secretary"]; ?></td>
                    <td><?php echo $secretary["lastname_secretary"]; ?></td>

                    <?php if ($secretary["picture_secretary"] !== null) : ?>

                        <td><img src="<?php TemplateController::path(); ?>views/assets/img/secretary/<?php echo $secretary["picture_secretary"]; ?>" class="img-fluid rounded-circle image-user cursor-pointer" width="50px" alt="<?php echo $secretary["name_secretary"]." ".$secretary["lastname_secretary"] ?>"></td>

                    <?php else : ?>

                        <td><img src="<?php TemplateController::path(); ?>views/assets/img/default.jpg" class="img-fluid rounded-circle" width="50px" alt="<?php echo $secretary["name_secretary"]." ".$secretary["lastname_secretary"] ?>"></td>

                    <?php endif; ?>

                    <td>
                        <button class="btn btn-success mb-2 my-tooltip button-update-secretary" data-bs-toggle="modal" data-bs-target="#modal-update-secretary">
                            <span class="tooltip-text">
                                Editar
                            </span>
                            <i class="bi bi-pencil-square"></i>
                        </button>

                        <button class="btn btn-danger mb-2 my-tooltip button-delete-secretary">
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