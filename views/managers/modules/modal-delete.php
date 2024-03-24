<div class="modal modal-sm fade" id="modal-delete-<?php echo $url; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-delete-<?php echo $url; ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-delete-<?php echo $url; ?>Label">Eliminar <?php echo $url; ?></h1>
            </div>

            <div class="alert text-center m-2" role="alert" id="alert-delete-<?php echo $url; ?>"></div>

            <form id="form-delete-<?php echo $url; ?>" novalidate>

                <div class="modal-body text-center">

                    ¿Esta seguro/a que desea eliminar a este <?php echo $url; ?>?

                    <input type="hidden" name="id">
                    <input type="hidden" name="delete" value="<?php echo $url; ?>">


                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn background-primary text-white" id="button-confirm-delete">Aceptar</button>
                    <button type="button" class="btn background-danger text-white" data-bs-dismiss="modal">Cancelar</button>
                </div>

            </form>

        </div>
    </div>
</div>