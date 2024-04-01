<div class="table-responsive">
    <table class="table table-striped rounded-1 data-table" id="table-quotes">

        <thead>
            <tr>
                <th>N°</th>
                <th>Documento del paciente</th>
                <th>Nombres/s del paciente</th>
                <th>Apellido/s del paciente</th>
                <th>Fecha de la cita</th>
                <th>Hora de la cita</th>
                <th>Consultorio</th>
                <th>Foto del/a paciente</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($quotes as $key => $quote) : ?>

                <tr id="<?php echo $quote["id_quote"]; ?>">

                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $quote["document_patient"]; ?></td>
                    <td><?php echo $quote["name_patient"]; ?></td>
                    <td><?php echo $quote["lastname_patient"]; ?></td>
                    <td><?php echo $quote["date_quote"]; ?></td>
                    <td><?php echo $quote["time_quote"]; ?></td>
                    <td><?php echo $quote["name_consulting_room"]; ?></td>

                    <?php if ($quote["picture_patient"] !== null) : ?>

                        <td><img src="<?php TemplateController::path(); ?>views/assets/img/<?php echo $quote["role_patient"] ?>/<?php echo $quote["picture_patient"]; ?>" class="img-fluid rounded-circle image-user cursor-pointer" alt="<?php echo $quote["name_patient"] . " " . $quote["lastname_patient"]; ?>" width="50px"></td>

                    <?php else : ?>

                        <td><img src="<?php TemplateController::path(); ?>views/assets/img/default.jpg" class="img-fluid rounded-circle" alt="<?php echo $quote["name_patient"] . " " . $quote["lastname_patient"]; ?>" width="50px"></td>

                    <?php endif; ?>
                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>
</div>