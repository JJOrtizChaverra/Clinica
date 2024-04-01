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

                <tr id="<?php echo $consultingRoom["id_consulting_room"]; ?>">

                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $consultingRoom["name_consulting_room"]; ?></td>

                    <td>
                        <button class="btn btn-success mb-2 my-tooltip button-update-consulting-room" data-bs-toggle="modal" data-bs-target="#modal-update-consulting-room">
                            <span class="tooltip-text">
                                Editar
                            </span>
                            <i class="bi bi-pencil-square"></i>
                        </button>

                        <button class="btn btn-danger mb-2 my-tooltip button-delete-consulting-room">
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