<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <?php if (isset($_SESSION["rol"]) && $_SESSION["rol"] === "secretary") : ?>

            <ul class="sidebar-menu">

                <li>
                    <a href="<?php echo Template::path(); ?>home">
                        <i class="fa fa-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo Template::path(); ?>doctors">
                        <i class="fa fa-user-md"></i>
                        <span>Doctores</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo Template::path(); ?>consulting-rooms">
                        <i class="fa fa-medkit"></i>
                        <span>Consultorios</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo Template::path(); ?>patients">
                        <i class="fa fa-users"></i>
                        <span>Pacientes</span>
                    </a>
                </li>

            </ul>

        <?php endif; ?>

    </section>
    <!-- /.sidebar -->
</aside>