   <!--Comienzo menu izquierdo-->
   <nav id="sidebar" >
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
                    <a class="font-w700" href="../../">
                        <img src="../../assets/logo/logoMundoEmpleo.png" class="img-fluid" style="width: 150px; height: 50px;">

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
                <a class="img-link" href="cv">
                    <img class="img-avatar" src="../../assets/img/user/<?php echo $FotoUser; ?>" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="cv"><?php echo $PrimerNombre[0] ." ". $PrimerApellido[0];  ?> </a>
                    </li>

                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark" href="../salir-view-candidato.php" title="Cerrar sesión">
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

                <?php  
                $sqlEstadoPerfil="SELECT `Estado` FROM `usuario_perfil` WHERE `IDUsuario` = ?";
                $stmtValidarMenu = $Conexion->ejecutar_consulta_simple_Where($sqlEstadoPerfil , $IDUser);
                while ($item=$stmtValidarMenu->fetch())
                {
                    $verificaEstado = $item['Estado'];
                }

                if($verificaEstado == "Activo"){ 

                    ?>

                    <li>
                        <a href="./"><i class="si si-user"></i><span class="sidebar-mini-hide">Incio del panel</span></a>
                        <a href="../../candidato"><i class="fa fa-briefcase"></i><span class="sidebar-mini-hide">Landing Page</span></a>
                    </li>


                    <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">Mundo Laboral</span></li>

                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Perfil Usuario</span></a>
                        <ul>

                            <li>
                                <a href="perfil-candidato">Perfil Profesional</a>
                            </li>

                            <li>
                                <a href="educacion-academico">Educación Académica</a>
                            </li>

                            <li>
                                <a href="experiencia-laboral">Experiencia laboral</a>
                            </li>

                            <li>
                                <a href="habilidades-usuario">Habilidades Usuario</a>
                            </li>

                            <li>
                                <a href="documentos-usuario">documentos personales</a>
                            </li>


                            <li>
                                <a href="referencia-trabajo">Referencia Trabajos</a>
                            </li>

                            <li>
                                <a href="inbox">Notificaciones</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                     <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-users"></i><span class="sidebar-mini-hide">Empleos</span></a>
                     <ul>

                        <li>
                            <a href="../../todas-las-ofertas">Buscar empleos</a>
                        </li>

                        <li>
                            <a href="postulaciones">Mis postulaciones</a>
                        </li>

                        <li>
                            <a href="favoritos.php">Mis Favoritos</a>
                        </li>

                        <li>
                            <a href="empresas">Áreas de empresas</a>
                        </li>

                        <li>
                            <a href="alertas">Alertas de Trabajo</a>
                        </li>

                        <li>
                            <a href="chats-empresas.php">Chats empresas</a>
                        </li>



                    </ul>
                </li>



                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-user"></i><span class="sidebar-mini-hide">Cuenta</span></a>
                    <ul>
                        <li>
                            <a href="actualizar-cuenta">Actualizar Cuenta</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#EliminarCuenta">Eliminar cuentas</a>
                        </li>
                    </ul>
                </li>

            <?php }else{?>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">TP</span><span class="sidebar-mini-hidden">Termina el proceso</span></li>
                <li class="nav-main-heading"><span class="sidebar-mini-visible">TP</span><span class="sidebar-mini-hidden">para Habilitar el menú</span></li>

            <?php } ?>



            

        </div>
        <!-- END Side Navigation -->
        
    </div>
    <!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->

<!--Fin del menu de izquierdo-->
