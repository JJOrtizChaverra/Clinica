<div class="modal fade" id="modal-insert-secretary" tabindex="-1" aria-labelledby="modal-insert-secretaryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-insert-secretaryLabel">Registrar Secretaria</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-insert-secretary" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="document-secretary-insert" class="form-label fw-semibold">Documento</label>
                        <input type="number" class="form-control form-control-lg" id="document-secretary-insert" name="document-secretary" placeholder="Numero de Documento de la Secretaria" required>

                        <div class="invalidation-message">El campo solo debe contener numeros y una longitud de 6 a 14 caracteres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="name-secretary-insert" class="form-label fw-semibold">Nombre/s</label>
                        <input type="text" class="form-control form-control-lg" id="name-secretary-insert" name="name-secretary" placeholder="Nombre/s de la Secretaria" required>

                        <div class="invalidation-message">El campo solo debe contener texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="lastname-secretary-insert" class="form-label fw-semibold">Apellido/s</label>
                        <input type="text" class="form-control form-control-lg" id="lastname-secretary-insert" name="lastname-secretary" placeholder="Apellido/s de la Secretaria" required>

                        <div class="invalidation-message">El campo solo debe contener texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="password-secretary-insert" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control form-control-lg" id="password-secretary-insert" name="password-secretary" placeholder="Crea una contraseña para la Secretaria" required>

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