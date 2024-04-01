<div class="modal fade" id="modal-insert-doctor" tabindex="-1" aria-labelledby="modal-insert-doctorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-insert-doctorLabel">Registrar Doctor</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-insert-doctor" novalidate>

                <div class="modal-body">

                    <div class="mb-3 has-validation col-12">
                        <label for="document-doctor" class="form-label fw-semibold">Documento</label>
                        <input type="number" class="form-control form-control-lg" id="document-doctor" name="document-doctor" placeholder="Numero de Documento del Doctor" required>

                        <div class="invalidation-message">El campo solo debe contener numeros y una longitud de 6 a 14 caratceres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="name-doctor" class="form-label fw-semibold">Nombre/s</label>
                        <input type="text" class="form-control form-control-lg" id="name-doctor" name="name-doctor" placeholder="Nombre/s del Doctor" required>

                        <div class="invalidation-message">El campo solo debe contener texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="lastname-doctor" class="form-label fw-semibold">Apellido/s</label>
                        <input type="text" class="form-control form-control-lg" id="lastname-doctor" name="lastname-doctor" placeholder="Apellido/s del Doctor" required>

                        <div class="invalidation-message">El campo solo debe contener texto y una longitud de 4 a 25 caracteres</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="gender-doctor" class="form-label fw-semibold">Genero</label>

                        <select class="form-select form-select-lg" id="gender-doctor" name="gender-doctor" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>

                        <div class="invalidation-message">Debes seleccionar Masculino o Femenino</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="consulting-room-doctor" class="form-label fw-semibold">Consultorio</label>

                        <select class="form-select form-select-lg" id="consulting-room-doctor" name="id-consulting-room-doctor" required>

                            <?php foreach ($consultingRooms as $key => $consultingRoom) : ?>
                                <option value="<?php echo $consultingRoom["id_consulting_room"]; ?>"><?php echo $consultingRoom["name_consulting_room"]; ?></option>
                            <?php endforeach; ?>

                        </select>

                        <div class="invalidation-message">Debes seleccionar un consultorio</div>
                    </div>

                    <div class="mb-3 has-validation col-12">
                        <label for="password-doctor" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control form-control-lg" id="password-doctor" name="password-doctor" placeholder="Crea una contraseña para el Doctor" required>

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