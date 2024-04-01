<div class="modal fade" id="modal-change-password" tabindex="-1" aria-labelledby="modal-change-passwordsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-change-passwordsLabel">Cambiar contraseña</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-change-password" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <input type="password" class="form-control form-control-lg" id="password-profile" name="password-profile" placeholder="Escribe la nueva contraseña" required>

                        <div class="invalidation-message">La contraseña debe tener una longitud minima de 6 caracteres</div>
                    </div>

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn background-primary text-white" id="button-confirm-change-password" value="Aceptar">
                </div>

            </form>
        </div>
    </div>
</div>