<!-- Modal para cambiar contraseña -->
<div class="modal fade" id="modal-insert-horary" tabindex="-1" aria-labelledby="modal-insert-horarysLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-insert-horarysLabel">Crear horario</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-insert-horary" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="date-horary-insert" class="form-label fw-semibold">Fecha</label>
                        <input type="date" class="form-control form-control-lg" id="date-horary-insert" name="date-horary" required>

                        <div class="invalidation-message">Debes seleccionar una fecha valida</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="time-start-horary-insert" class="form-label fw-semibold">Hora de entrada</label>
                        <input type="time" class="form-control form-control-lg" id="time-start-horary-insert" name="time-start-horary" required>

                        <div class="invalidation-message">Debes seleccionar una hora valida</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="time-end-horary-insert" class="form-label fw-semibold">Hora de salida</label>
                        <input type="time" class="form-control form-control-lg" id="time-end-horary-insert" name="time-end-horary" required>

                        <div class="invalidation-message">Debes seleccionar una hora valida</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="minutes-range-horary-insert" class="form-label fw-semibold">Rango de minutos por cada cita</label>

                        <select class="form-select form-select-lg" id="minutes-range-horary-insert" name="minutes-range-horary" aria-label="Large select example" required>
                            <option value="10">10 Minutos</option>
                            <option value="15">15 Minutos</option>
                            <option value="20">20 Minutos</option>
                            <option value="25">25 Minutos</option>
                            <option value="30">30 Minutos</option>
                        </select>

                        <div class="invalidation-message">Debes seleccionar un rango de tiempo</div>
                    </div>


                    <input type="hidden" name="id-doctor-horary" value="<?php echo $_SESSION["id"]; ?>">

                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <input type="submit" class="btn background-primary text-white" id="button-confirm-insert-horary" value="Aceptar">
                </div>

            </form>
        </div>
    </div>
</div>