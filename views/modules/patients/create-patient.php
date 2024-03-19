<?php

if ($_SESSION["rol"] !== "secretary") {

    echo "<script>window.location = '" . Template::path() . "home'</script>";
    return;
}

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>Registrar Paciente</h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo Template::path(); ?>home"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="<?php echo Template::path(); ?>patients"> Pacientes</a></li>
            <li class="active"> Crear paciente</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">

            <div class="box-body">

                <form method="post" enctype="multipart/form-data">

                    <div class="col-md-6 col-xs-12">

                        <div class="form-group">

                            <label for="name-patient">Nombre<sup class="text-red">*</sup></label>
                            <input type="text" class="form-control input-lg invalid-input" name="name-patient" id="name-patient" placeholder="Ingrese el/los nombres" required>
                            
                            
                            <span class="invalid-input-message">No puede contener numeros ni caracteres especiales</span>
                        </div>
                        
                    </div>

                    <div class="col-md-6 col-xs-12 container-input">

                        <div class="form-group">

                            <label for="lastname-patient">Apellido<sup class="text-red">*</sup></label>
                            <input type="text" class="form-control input-lg" name="lastname-patient" id="lastname-patient" placeholder="Ingrese el/los apellidos" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12 container-input">

                        <div class="form-group">

                            <label for="document-patient">Documento<sup class="text-red">*</sup></label>
                            <input type="number" class="form-control input-lg" name="document-patient" id="document-patient" placeholder="Ingrese el numero de documento" onchange="noRepeatUser(this, 'patient')" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12 container-input">

                        <div class="form-group">

                            <label for="password-patient">Contraseña<sup class="text-red">*</sup></label>
                            <input type="password" class="form-control input-lg" name="password-patient" id="password-patient" placeholder="Ingrese una contraseña" required>

                        </div>

                    </div>

                    <div class="col-md-6 col-xs-12 container-input">

                        <div class="form-group">

                            <label for="gender-patient">Genero<sup class="text-red">*</sup></label>

                            <select name="gender-patient" id="gender-patient" class="form-control input-lg" required>

                                <option value="" disabled selected>Seleccione un genero</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>

                            </select>
                        </div>

                    </div>

                    <div class="col-12 text-center">

                        <button style="margin-right: 8px;" type="submit" class="btn btn-primary">Registrar</button>
                        <a href="<?php echo Template::path() ?>patients" class="btn btn-danger">Cancelar</a>

                    </div>

                    <?php

                    $createPatient = new PatientsController();
                    $createPatient->createPatient();

                    ?>
                </form>
            </div>
        </div>
    </section>
</div>