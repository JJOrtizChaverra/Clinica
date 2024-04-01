<div class="modal fade" id="modal-update-patient" tabindex="-1" aria-labelledby="modal-update-patientLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-update-patientLabel">Editar Paciente</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-update-patient" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="name-patient-update" class="form-label fw-semibold">Nombre/s</label>
                        <input type="text" class="form-control form-control-lg" id="name-patient-update" name="name-patient" placeholder="Nombre/s del Paciente" required>

                        <div class="invalidation-message">El campo solo debe contener texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="lastname-patient-update" class="form-label fw-semibold">Apellido/s</label>
                        <input type="text" class="form-control form-control-lg" id="lastname-patient-update" name="lastname-patient" placeholder="Apellido/s del Paciente" required>

                        <div class="invalidation-message">El campo solo debe contener texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="gender-patient-update" class="form-label fw-semibold">Genero</label>

                        <select class="form-select form-select-lg" id="gender-patient-update" name="gender-patient" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>

                        <div class="invalidation-message">Debes seleccionar Masculino o Femenino</div>
                    </div>

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn background-primary text-white" value="Guardar cambios">
                </div>

            </form>
        </div>
    </div>
</div>