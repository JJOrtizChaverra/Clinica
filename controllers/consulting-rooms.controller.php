<?php

class ConsultingRoomsController {

    // Crear un consultorio
    public function createConsultingRoom() {

        if(isset($_POST["new-consulting"])) {

            $data = array(
                "name" => $_POST["new-consulting"]
            );

            $result = ConsultingRoomsModel::createConsultingRoom($data);

            if($result) {
                echo "<script>window.location = '".Template::path()."consulting-room'</script>";
            }

        }

    }

}