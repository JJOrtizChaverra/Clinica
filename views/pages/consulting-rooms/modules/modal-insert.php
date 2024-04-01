<div class="modal fade" id="modal-insert-consulting_room" tabindex="-1" aria-labelledby="modal-insert-consulting_roomLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-insert-consulting_roomLabel">Registrar Consultorio</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-insert-consulting_room" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="name-consulting-room" class="form-label fw-semibold">Nombre</label>
                        <input type="text-number" class="form-control form-control-lg" id="name-consulting-room" name="name-consulting-room" placeholder="Nombre del consultorio" required>

                        <div class="invalidation-message">El campo debe contener solo texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn background-primary text-white" value="Aceptar">
                </div>

            </form>
        </div>
    </div>
</div>