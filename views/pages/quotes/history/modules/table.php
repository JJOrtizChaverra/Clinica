<div class="table-responsive">
    <table class="table table-striped rounded-1 data-table" id="table-quotes">

        <thead>
            <tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Doctor/a</th>
                <th>Consultorio</th>
                <th>Foto del/a doctor/a</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($quotes as $key => $quote) : ?>

                <tr id="<?php echo $quote["id_quote"]; ?>">

                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $quote["date_quote"]; ?></td>
                    <td><?php echo $quote["time_quote"]; ?></td>
                    <td><?php echo $quote["name_doctor"] . " " . $quote["lastname_doctor"]; ?></td>
                    <td><?php echo $quote["name_consulting_room"]; ?></td>

                    <?php if ($quote["picture_doctor"] !== null) : ?>

                        <td><img src="<?php TemplateController::path(); ?>views/assets/img/<?php echo $quote["role_doctor"] ?>/<?php echo $quote["picture_doctor"]; ?>" class="img-fluid rounded-circle image-user cursor-pointer" alt="<?php echo $quote["name_doctor"] . " " . $quote["lastname_doctor"]; ?>" width="50px"></td>

                    <?php else : ?>

                        <td><img src="<?php TemplateController::path(); ?>views/assets/img/default.jpg" class="img-fluid rounded-circle" alt="<?php echo $quote["name_doctor"] . " " . $quote["lastname_doctor"]; ?>" width="50px"></td>

                    <?php endif; ?>
                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>
</div>