<?php

if ($_SESSION["rol"] === "secretary") {

    if (isset($_GET["id"]) && isset($_GET["edit"])) {

        if (is_numeric($_GET["id"]) && $_GET["edit"] === "patient") {

            // Trayendo el paciente a editar
            $patientEdit = PatientsController::viewPatients("id_patient", $_GET["id"]);

            if (!$patientEdit) {
                echo "<script>window.location = '" . Template::path() . "patients'</script>";
                return;
            }
        } else {
            echo "<script>window.location = '" . Template::path() . "patients'</script>";
            return;
        }
    } else {
        echo "<script>window.location = '" . Template::path() . "patients'</script>";
        return;
    }
} else {
    echo "<script>window.location = '" . Template::path() . "home'</script>";
    return;
}
?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Editar Paciente</h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo Template::path(); ?>home"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="<?php echo Template::path(); ?>patients"> Pacientes</a></li>
            <li class="active"> Editar paciente</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-body">

                <form method="post" enctype="multipart/form-data">

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="name-patient">Nombre<sup class="text-red">*</sup></label>
                            <input type="text" class="form-control input-lg" name="name-patient" id="name-patient" value="<?php echo $patientEdit["name_patient"]; ?>" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="lastname-patient">Apellido<sup class="text-red">*</sup></label>
                            <input type="text" class="form-control input-lg" name="lastname-patient" id="lastname-patient" value="<?php echo $patientEdit["lastname_patient"]; ?>" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="document-patient">Documento<sup class="text-red">*</sup></label>
                            <input type="number" class="form-control input-lg" name="document-patient" id="document-patient" value="<?php echo $patientEdit["document_patient"]; ?>" onchange="noRepeatUser(this)" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="password-patient">Contraseña</label>
                            <input type="password" class="form-control input-lg" name="password-patient" id="password-patient">

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="gender-patient">Genero<sup class="text-red">*</sup></label>

                            <select name="gender-patient" id="gender-patient" class="form-control input-lg" required>

                                <?php if ($patientEdit["gender_patient"] === "Masculino") : ?>

                                    <option value="Masculino" selected>Masculino</option>
                                    <option value="Femenino">Femenino</option>

                                <?php else : ?>

                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino" selected>Femenino</option>

                                <?php endif; ?>

                            </select>
                        </div>

                    </div>

                    </div>

                    <div class="col-12 text-center">

                        <button style="margin-right: 8px;" type="submit" class="btn btn-primary">Guardar cambios</button>
                        <a href="<?php echo Template::path() ?>patients" class="btn btn-danger">Cancelar</a>

                    </div>

                    <?php

                    $editPatient = new PatientsController();
                    $editPatient->editPatient();

                    ?>
                </form>
            </div>
        </div>
    </section>
</div>