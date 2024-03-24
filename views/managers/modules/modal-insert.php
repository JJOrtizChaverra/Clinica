<div class="modal fade" id="modal-insert-<?php echo $url; ?>" tabindex="-1" aria-labelledby="modal-insert-<?php echo $url; ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-insert-<?php echo $url; ?>Label">Registrar <?php echo ucfirst($url); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-insert-<?php echo $url; ?>"></div>

            <form class="g-3 needs-validation d-flex flex-column justify-content-evenly" id="form-insert-<?php echo $url; ?>" novalidate>

                <div class="modal-body">

                    <?php if ($url === "consulting_room") : ?>

                        <div class="mb-3 has-validation col-12">
                            <label for="name-register" class="form-label fw-semibold">Nombre</label>
                            <input type="text-number" class="form-control form-control-lg" id="name-register" name="name" placeholder="Nombre del consultorio" required>

                            <div class="invalid-feedback">El campo no puede estar vacío</div>
                        </div>

                    <?php endif; ?>

                    <?php if ($url === "doctor") : ?>

                        <div class="mb-3 has-validation col-12">
                            <label for="document-insert" class="form-label fw-semibold">Documento</label>
                            <input type="number" class="form-control form-control-lg" id="document-insert" name="document" placeholder="Numero de Documento del <?php echo $url; ?>" required>

                            <div class="invalid-feedback">El campo no puede estar vacío</div>
                        </div>

                        <div class="mb-3 has-validation col-12">
                            <label for="name-insert" class="form-label fw-semibold">Nombre/s</label>
                            <input type="text" class="form-control form-control-lg" id="name-insert" name="name" placeholder="Nombre/s del <?php echo $url; ?>" required>

                            <div class="invalid-feedback">El campo no puede estar vacío</div>
                        </div>

                        <div class="mb-3 has-validation col-12">
                            <label for="lastname-insert" class="form-label fw-semibold">Apellido/s</label>
                            <input type="text" class="form-control form-control-lg" id="lastname-insert" name="lastname" placeholder="Apellido/s del <?php echo $url; ?>" required>

                            <div class="invalid-feedback">El campo no puede estar vacío</div>
                        </div>

                        <div class="mb-3 has-validation col-12">
                            <label for="gender-insert" class="form-label fw-semibold">Genero</label>

                            <select class="form-select form-select-lg" id="gender-insert" name="gender" aria-label="Large select example" required>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>

                            <div class="invalid-feedback">Debes seleccionar un genero</div>
                        </div>

                        <div class="mb-3 has-validation col-12">
                            <label for="consulting-room-insert" class="form-label fw-semibold">Consultorio</label>

                            <select class="form-select form-select-lg" id="consulting-room-insert" name="id_consulting_room" aria-label="Large select example" required>

                                <?php foreach ($consultingRooms as $key => $consultingRoom) : ?>
                                    <option value="<?php echo $consultingRoom["id_consulting_room"]; ?>"><?php echo $consultingRoom["name_consulting_room"]; ?></option>
                                <?php endforeach; ?>

                            </select>

                            <div class="invalid-feedback">Debes seleccionar un consultorio</div>
                        </div>

                        <div class="mb-3 has-validation col-12">
                            <label for="password-insert" class="form-label fw-semibold">Contraseña</label>
                            <input type="password" class="form-control form-control-lg" id="password-insert" name="password" placeholder="Crea una contraseña para el <?php echo $url; ?>" required>

                            <div class="invalid-feedback">El campo no puede estar vacío</div>
                        </div>

                    <?php endif; ?>

                    <?php if ($url === "patient") : ?>

                        <div class="mb-3 has-validation col-12">
                            <label for="document-register" class="form-label fw-semibold">Documento</label>
                            <input type="number" class="form-control form-control-lg" id="document-register" name="document" placeholder="Numero de Documento del paciente" required>

                            <div class="invalid-feedback">El campo no puede estar vacío</div>
                        </div>

                        <div class="mb-3 has-validation col-12">
                            <label for="name-register" class="form-label fw-semibold">Nombre/s</label>
                            <input type="text" class="form-control form-control-lg" id="name-register" name="name" placeholder="Nombre/s del paciente" required>

                            <div class="invalid-feedback">El campo no puede estar vacío</div>
                        </div>

                        <div class="mb-3 has-validation col-12">
                            <label for="lastname-register" class="form-label fw-semibold">Apellido/s</label>
                            <input type="text" class="form-control form-control-lg" id="lastname-register" name="lastname" placeholder="Apellido/s del paciente" required>

                            <div class="invalid-feedback">El campo no puede estar vacío</div>
                        </div>

                        <div class="mb-3 has-validation col-12">
                            <label for="gender-register" class="form-label fw-semibold">Genero</label>

                            <select class="form-select form-select-lg" id="gender-register" name="gender" aria-label="Large select example" required>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>

                            <div class="invalid-feedback">Debes seleccionar un genero</div>
                        </div>

                        <div class="mb-3 has-validation col-12">
                            <label for="password-register" class="form-label fw-semibold">Contraseña</label>
                            <input type="password" class="form-control form-control-lg" id="password-register" name="password" placeholder="Crea una contraseña para el paciente" required>

                            <div class="invalid-feedback">El campo no puede estar vacío</div>
                        </div>

                    <?php endif; ?>

                </div>

                <input type="hidden" name="insert" value="<?php echo $url; ?>">

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn background-primary text-white">Aceptar</button>
                </div>

            </form>
        </div>
    </div>
</div>