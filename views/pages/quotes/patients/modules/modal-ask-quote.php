<div class="modal fade" id="modal-ask-quote" tabindex="-1" aria-labelledby="modal-ask-quoteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-ask-quoteLabel">Pedir cita medica</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-ask-quote"></div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-ask-quote" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="id-doctor-quote-insert" class="form-label fw-semibold">Doctor</label>

                        <select class="form-select form-select-lg" id="id-doctor-quote-insert" name="id-doctor-quote" aria-label="Large select example" required>

                            <?php foreach ($doctors as $key => $doctor) : ?>
                                <option value="<?php echo $doctor["id_doctor"]; ?>"><?php echo $doctor["name_doctor"] . " " . $doctor["lastname_doctor"]; ?></option>
                            <?php endforeach; ?>

                        </select>

                        <div class="invalidation-message">Debes seleccionar un doctor</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="consulting-room-quote-insert" class="form-label fw-semibold">Consultorio</label>
                        <input type="text" class="form-control form-control-lg" id="consulting-room-quote-insert" style="cursor: no-drop;" readonly required>

                        <div class="invalidation-message">Debes seleccionar un doctor para ver el consultorio</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="date-quote-insert" class="form-label fw-semibold">Fecha</label>
                        <input type="date" class="form-control form-control-lg" id="date-quote-insert" name="date-quote" required>

                        <div class="invalidation-message">Debes seleccionar una fecha valida</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="time-quote-insert" class="form-label fw-semibold">Hora</label>

                        <select class="form-select form-select-lg" id="time-quote-insert" name="time-quote" aria-label="Large select example" required>

                        </select>

                        <div class="invalidation-message">Debes seleccionar una hora</div>
                    </div>

                </div>

                <input type="hidden" name="id-patient-quote" value="<?php echo $_SESSION["id"]; ?>" readonly>
                <input type="hidden" name="id-horary-quote" readonly>
                <input type="hidden" name="id-consulting-room-quote" readonly>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn background-primary text-white">Pedir cita</button>
                </div>

            </form>
        </div>
    </div>
</div>