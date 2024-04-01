<?php

session_start();

?>

<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clinica Medica</title>

    <!-- CSS Bootstrap 5.3.3 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo TemplateController::path(); ?>views/dist/bootstrap/css/bootstrap.min.css">

    <!-- Iconos Bootstrap 5.3.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS Bootstrap DataTable 2.0.3 -->
    <!-- <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css" /> -->
    <link rel="stylesheet" href="<?php echo TemplateController::path(); ?>views/dist/datatables/css/datatables.min.css">

    <!-- CSS Propio -->
    <link rel="stylesheet" href="<?php echo TemplateController::path(); ?>views/css/style.css">

    <!-- CSS para el modo oscuro -->
    <link rel="stylesheet" href="<?php echo TemplateController::path(); ?>views/css/dark-mode.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Script unico y necesario para funcionar el dark mode -->
    <script>
        const storageTheme = localStorage.getItem("theme");
        const systemColorScheme = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";

        const newTheme = storageTheme ?? systemColorScheme;

        document.documentElement.setAttribute("data-theme", newTheme);
    </script>

</head>

<body class="disable-interaction">

    <!-- Loading -->
    <div id="loading" class="disable-interaction" style="display: block;">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden"></span>
        </div>
    </div>

    <!-- Site wrapper -->

    <?php

    if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {

        // Header
        include "modules/header.php";

        // Validamos si viene una variable get url
        if (isset($_GET["url"])) {

            // Dividimos el contenido de la variable get
            $url = explode("/", $_GET["url"])[0];

            if ($url === "home") {
                include "pages/$url/$url.php";
            } else if (
                $url === "consulting-rooms" ||
                $url === "doctors" ||
                $url === "patients" ||
                $url === "secretarys" ||
                $url === "horarys" ||
                $url === "configurations"
            ) {
                include "pages/$url/$url.php";
            } else if ($url === "quotes" && ($_SESSION["role"] === "patient" || $_SESSION["role"] === "doctor")) {
                include "pages/quotes/{$_SESSION["role"]}s/quotes.php";
            } else if ($url === "history") {
                include "pages/quotes/$url/$url.php";
            } else if ($url === "profile" || $url === "logout") {
                include "pages/account/$url/$url.php";
            } else {
                include "pages/404/404.php";
            }
        } else {
            include "modules/home/home.php";
        }
    } else {

        if (isset($_GET["url"])) {

            if ($_GET["url"] === "login") {
                include "pages/account/login/login.php";
            } else {
                include "modules/dashboard.php";
            }
        } else {
            include "modules/dashboard.php";
        }
    }

    ?>

    <!-- JS Bootstrap 5.3.3 -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <script src="<?php TemplateController::path(); ?>views/dist/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JQuery DataTable 3.7.1 -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" type="text/Javascript"></script> -->
    <!-- JS DataTable 2.0.3 -->
    <!-- <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js" type="text/Javascript"></script> -->
    <!-- JS Bootstrap DataTable 2.0.3 -->
    <!-- <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js" type="text/Javascript"></script> -->
    <script src="<?php TemplateController::path(); ?>views/dist/datatables/js/datatables.min.js"></script>

    <!-- JS Full calendar -->
    <!-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script> -->
    <script src="<?php echo TemplateController::path(); ?>views/dist/fullcalendar/js/index.global.min.js"></script>
    <script src="<?php echo TemplateController::path(); ?>views/js/plugins/full-calendar.mjs" type="module"></script>

    <!-- JS Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php TemplateController::path(); ?>views/js/plugins/sweet-alert.mjs" type="module"></script>

    <!-- JS propio -->
    <script src="<?php echo TemplateController::path(); ?>views/js/main.mjs" type="module"></script>

    <!-- JS para validar formularios -->
    <script src="<?php echo TemplateController::path(); ?>views/js/form-validation.js"></script>
</body>

</html>