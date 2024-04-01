<div class="table-responsive">
    <table class="table table-striped rounded-1 data-table" id="table-horarys">

        <thead>
            <tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Hora de entrada</th>
                <th>Hora de salida</th>
                <th>Rango de minutos por cita</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($horarys as $key => $horary) : ?>

                <tr id="<?php echo $horary["id_horary"]; ?>">

                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $horary["date_horary"]; ?></td>
                    <td><?php echo substr($horary["start_horary"], 0, -3); ?></td>
                    <td><?php echo substr($horary["end_horary"], 0, -3); ?></td>
                    <td><?php echo $horary["minutes_range_horary"]; ?> Minutos</td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>
</div>