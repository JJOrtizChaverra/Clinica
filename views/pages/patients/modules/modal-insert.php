<div class="modal fade" id="modal-insert-patient" tabindex="-1" aria-labelledby="modal-insert-patientLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-insert-patientLabel">Registrar Paciente</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-insert-patient" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="document-patient-insert" class="form-label fw-semibold">Documento</label>
                        <input type="number" class="form-control form-control-lg" id="document-patient-insert" name="document-patient" placeholder="Numero de Documento del Paciente" required>

                        <div class="invalidation-message">El campo solo debe contener numeros y una longitud de 6 a 14 caratceres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="name-patient-insert" class="form-label fw-semibold">Nombre/s</label>
                        <input type="text" class="form-control form-control-lg" id="name-patient-insert" name="name-patient" placeholder="Nombre/s del Paciente" required>

                        <div class="invalidation-message">El campo solo debe contener texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="lastname-patient-insert" class="form-label fw-semibold">Apellido/s</label>
                        <input type="text" class="form-control form-control-lg" id="lastname-patient-insert" name="lastname-patient" placeholder="Apellido/s del Paciente" required>

                        <div class="invalidation-message">El campo solo debe contener texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="gender-patient-insert" class="form-label fw-semibold">Genero</label>

                        <select class="form-select form-select-lg" id="gender-patient-insert" name="gender-patient" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>

                        <div class="invalidation-message">Debes seleccionar Masculino o Femenino</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="password-patient-insert" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control form-control-lg" id="password-patient-insert" name="password-patient" placeholder="Crea una contraseña para el Paciente" required>

                        <div class="invalidation-message">La contraseña debe tener una longitud minima de 6 caracteres</div>
                    </div>

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn background-primary text-white" value="Aceptar">
                </div>

            </form>
        </div>
    </div>
</div>