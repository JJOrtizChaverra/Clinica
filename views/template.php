<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clinica Medica</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo Template::path(); ?>views/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo Template::path(); ?>views/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo Template::path(); ?>views/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo Template::path(); ?>views/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo Template::path(); ?>views/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini login-page">

    <!-- Site wrapper -->

    <?php

    if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {

        echo '<div class="wrapper">';

        // Header
        include "modules/header.php";

        // Left side column. contains the sidebar
        include "modules/menu.php";


        $url = array();

        // Validamos si viene una variable get url
        if (isset($_GET["url"])) {
            // Dividimos el contenido de la variable get
            $url = explode("/", $_GET["url"]);

            // Preguntamos si en el indice 0 esta el dashboard
            if (
                $url[0] === "home" ||
                $url[0] === "logout" ||
                $url[0] === "profile" ||
                $url[0] === "edit-profile" ||
                $url[0] === "consulting-room" ||
                $url[0] === "edit-consulting-room"
            ) {
                include "modules/" . $url[0] . ".php";
            }
        } else {
            include "modules/home.php";
        }

        echo "</div>";
    } else {

        if (isset($_GET["url"])) {

            if ($_GET["url"] === "login") {
                include "modules/login.php";

                return;
            }

            include "modules/dashboard.php";
        } else {
            include "modules/dashboard.php";
        }
    }


    ?>

    <!-- jQuery 3 -->
    <script src="<?php echo Template::path(); ?>views/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo Template::path(); ?>views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- SlimScroll -->
    <script src="<?php echo Template::path(); ?>views/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo Template::path(); ?>views/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo Template::path(); ?>views/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo Template::path(); ?>views/dist/js/demo.js"></script>

    <!-- Javascript propio -->
    <script src="<?php echo Template::path(); ?>views/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        })
    </script>
</body>

</html>