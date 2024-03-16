<header class="main-header">
    <!-- Logo -->
    <a href="./views/index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b> M</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Clinica</b> Medica</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <?php if ($_SESSION["picture"] !== null) : ?>

                            <img src="<?php echo Template::path(); ?>views/assets/img/users/<?php echo $_SESSION["picture"]; ?>" class="user-image" alt="<?php echo $_SESSION["displayname"]; ?>">

                        <?php else : ?>

                            <img src="<?php echo Template::path(); ?>views/assets/img/default.jpg" class="user-image" alt="User Image">

                        <?php endif; ?>

                        <span class="hidden-xs"><?php echo $_SESSION["displayname"]; ?></span>
                    </a>
                    <ul class="dropdown-menu" style="width: 100px;">
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo Template::path(); ?>profile" class="btn btn-primary btn">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo Template::path(); ?>logout" class="btn btn-danger btn">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>