   <!--Comienzo menu izquierdo-->
   <nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark" id="titulos">M</span><span class="text-dual-primary-dark" id="titulos">E</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="font-w700" href="../../../index">
                        <img src="../../assets/img/logo/logoMundoEmpleo.png" class="img-fluid" style="width: 150px; height: 50px;">
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent" >
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="../../assets/img/user/<?php echo $FotoUser;?>" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="javascript:void(0)" data-toggle="modal" data-target="#modal-terms8">
                    <img class="img-avatar" src="../../assets/img/user/<?php echo $FotoUser; ?>" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.html"><?php echo $PrimerNombre[0] ." ". $PrimerApellido[0];  ?> </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark" href="../salir-view.php">
                            <i class="si si-logout"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
         
            <ul class="nav-main">
                <li>
                    <a href="./"><i class="si si-cup"></i><span class="sidebar-mini-hide">Panel Principal</span></a>
                </li>

                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Mundo Laboral</span></li>
                <li>
                   <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-puzzle"></i><span class="sidebar-mini-hide">Administración</span></a>
                   <ul>

                    <li>
                        <a href="empresas">Empresas</a>
                    </li>

                    <li>
                        <a href="usuarios">Cuentas de Candidatos</a>
                    </li>

                    <li>
                        <a href="paises-departamentos">Países y departamentos</a>
                    </li>

                    <li>
                        <a href="areas-trabajos">Área de trabajo</a>
                    </li>

                    <li>
                        <a href="facultades">Facultades y Carreras</a>
                    </li>

                     <li>
                        <a href="facultades">Soporte y habilidades</a>
                    </li>

                     <li>
                        <a href="reportes">Reportes</a>
                    </li>

                    <li>
                        <a href="inbox">Notificaciones</a>
                    </li>

                </ul>
            </li>


            

            <li>
                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Cuenta</span></a>
                <ul>
                    <li>
                        <a href="actualizar-cuenta">Actualizar Cuenta</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#EliminarCuenta">Eliminar cuentas</a>
                    </li>
                </ul>
            </li>


            


            

        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->

<!--Fin del menu de izquierdo-->
