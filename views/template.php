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
    <link rel="stylesheet" href="<?php echo TemplateController::path(); ?>views/dist/bootstrap/css/bootstrap.min.css" type="text/css">

    <!-- Iconos Bootstrap 5.3.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" type="text/css">

    <!-- CSS DataTable 2.0.3 -->
    <link rel="stylesheet" href="<?php echo TemplateController::path(); ?>views/dist/datatables/css/datatables.min.css" type="text/css">

    <!-- CSS Propio -->
    <link rel="stylesheet" href="<?php echo TemplateController::path(); ?>views/css/style.css" type="text/css">

    <!-- CSS para el modo oscuro -->
    <link rel="stylesheet" href="<?php echo TemplateController::path(); ?>views/css/dark-mode.css" type="text/css">

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

    <?php

    if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {

        // Header
        include "modules/header.php";

        // Validamos si viene una variable get url
        if (isset($_GET["url"])) {

            // Dividimos el contenido de la variable get
            $url = explode("/", $_GET["url"])[0];

            // Validamos cada url para mostrar o incluir su respectiva pagina
            if (
                $url === "home" ||
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
    <script src="<?php TemplateController::path(); ?>views/dist/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    <!-- JS Bootstrap DataTable 2.0.3 -->
    <script src="<?php TemplateController::path(); ?>views/dist/datatables/js/datatables.min.js" type="text/javascript"></script>

    <!-- JS Full calendar 6.1 -->
    <script src="<?php echo TemplateController::path(); ?>views/dist/fullcalendar/js/index.global.min.js" type="text/javascript"></script>

    <!-- JS Sweet Alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JS propio -->
    <script src="<?php echo TemplateController::path(); ?>views/js/main.mjs" type="module"></script>
</body>

</html>