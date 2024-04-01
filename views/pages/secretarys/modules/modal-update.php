<div class="modal fade" id="modal-update-secretary" tabindex="-1" aria-labelledby="modal-update-secretaryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-update-secretaryLabel">Editar Secretaria</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-update-secretary" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="name-secretary-update" class="form-label fw-semibold">Nombre/s</label>
                        <input type="text" class="form-control form-control-lg" id="name-secretary-update" name="name-secretary" placeholder="Nombre/s de la Secretaria" required>

                        <div class="invalidation-message">El campo solo debe contener texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="lastname-secretary-update" class="form-label fw-semibold">Apellido/s</label>
                        <input type="text" class="form-control form-control-lg" id="lastname-secretary-update" name="lastname-secretary" placeholder="Apellido/s de la Secretaria" required>

                        <div class="invalidation-message">El campo solo debe contener texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn background-primary text-white" value="Guardar cambios">
                </div>

            </form>
        </div>
    </div>
</div>