<?php

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clinica Medica</title>

    <!-- CSS Bootstrap 5.3.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Iconos Bootstrap 5.3.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Bootstrap DataTable 2.0.3 -->
    <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css" />

    <!-- CSS Propio -->
    <link rel="stylesheet" href="<?php echo TemplateController::path(); ?>views/css/style.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="disable-interaction">

    <!-- Loading -->
    <div id="loading" class="disable-interaction">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden"></span>
        </div>
    </div>

    <!-- Site wrapper -->

    <?php

    if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {

        echo '<div class="wrapper">';

        // Header
        include "modules/header.php";

        // Left side column. contains the sidebar
        // include "modules/menu.php";


        $url = array();

        // Validamos si viene una variable get url
        if (isset($_GET["url"])) {

            // Dividimos el contenido de la variable get
            $url = explode("/", $_GET["url"])[0];

            // Preguntamos si en el indice 0 esta el dashboard
            if (
                $url === "home" ||
                $url === "logout" ||
                $url === "profile"
            ) {
                include "modules/$url/$url.php";
            } else if($url === "consulting-rooms" || $url === "doctors" || $url === "patients") {
                include "managers/manager.php";
            } else {
                include "modules/404/404.php";
            }
        } else {
            include "modules/home/home.php";
        }

        echo "</div>";
    } else {

        if (isset($_GET["url"])) {

            if ($_GET["url"] === "login") {
                include "modules/login/login.php";
            } else {
                include "modules/dashboard.php";
            }
        } else {
            include "modules/dashboard.php";
        }
    }

    ?>

    <!-- JS Bootstrap 5.3.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- JQuery DataTable 3.7.1 -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" type="text/Javascript"></script>
    <!-- JS DataTable 2.0.3 -->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js" type="text/Javascript"></script>
    <!-- JS Bootstrap DataTable 2.0.3 -->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js" type="text/Javascript"></script>

    <!-- JS propio -->
    <script src="<?php echo TemplateController::path(); ?>views/js/main.mjs" type="module"></script>

    <!-- JS para validar formularios -->
    <script src="<?php echo TemplateController::path(); ?>views/js/form-validation.js"></script>
</body>

</html>