<?php

if ($_SESSION["rol"] === "secretary") {

    // Trayendo los pacientes
    $patients = PatientsController::viewPatients(null, null);
} else {
    echo "<script>window.location = '" . Template::path() . "home'</script>";
    return;
}

?>

<div class="container-fluid">

    <section class="d-flex align-items-center justify-content-between p-2">
        <h1 class="fs-2">Gestor de pacientes</h1>

        <nav class="d-flex align-items-center" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo Template::path() ?>home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pacientes</li>
            </ol>
        </nav>
    </section>

    <section class="p-3 border bg-white d-flex flex-column gap-3">

        <div class="box-header">

            <a href="<?php Template::path() ?>create-patient" class="btn btn-primary btn-lg">Registrar un Paciente</a>

        </div>

        <div class="box-body">

            <table class="table table-bordered table-hover table-striped data-table">

                <thead>

                    <tr>

                        <th>N°</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Genero</th>
                        <th>Foto</th>
                        <th>Editar / Borrar</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($patients as $key => $patient) : ?>

                        <tr>

                            <td><?php echo ($key + 1); ?></td>
                            <td><?php echo $patient["document_patient"]; ?></td>
                            <td><?php echo $patient["name_patient"]; ?></td>
                            <td><?php echo $patient["lastname_patient"]; ?></td>
                            <td><?php echo $patient["gender_patient"]; ?></td>

                            <?php if ($patient["picture_patient"] !== null) : ?>

                                <td><img style="cursor: pointer;" src="<?php echo Template::path(); ?>views/assets/img/<?php echo $patient["rol_patient"]; ?>/<?php echo $patient["picture_patient"]; ?>" class="img-responsive img-circle" alt="<?php echo $patient["name_patient"] . " " . $patient["lastname_patient"]; ?>" width="30" onclick="openImage(this)"></td>

                            <?php else : ?>

                                <td><img src="<?php echo Template::path(); ?>views/assets/img/default.jpg" class="img-responsive img-circle" alt="<?php echo $patient["name_patient"] . " " . $patient["lastname_patient"]; ?>" width="30"></td>

                            <?php endif ?>

                            <td>

                                <a href="<?php echo Template::path(); ?>edit-patient&id=<?php echo $patient["id_patient"] ?>&edit=patient" class="btn btn-success" style="margin-right: 8px;">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="<?php echo Template::path(); ?>patients&id=<?php echo $patient["id_patient"]; ?>&current-picture=<?php echo explode(".", $patient["picture_patient"])[0]; ?>&delete=patient" class="btn btn-danger">
                                    <i class="fa fa-times"></i>

                                    <?php

                                    $deletePatient = new PatientsController();
                                    $deletePatient->deletePatient();

                                    ?>
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>
    </section>

</div>