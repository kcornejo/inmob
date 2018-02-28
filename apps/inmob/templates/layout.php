<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="admin-themes-lab">
        <meta name="author" content="themes-lab">
        <link rel="shortcut icon" href="/assets/img/logo.png" type="image/png">
        <title>BEX</title>
        <link href="/assets/global/css/style.css" rel="stylesheet">
        <link href="/assets/global/css/theme.css" rel="stylesheet">
        <link href="/assets/global/css/ui.css" rel="stylesheet">
        <link href="/assets/global/plugins/rateit/rateit.css" rel="stylesheet">
        <link href="/assets/admin/layout4/css/layout.css" rel="stylesheet">
        <link href="/js/css-stars.css" rel="stylesheet">
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
        <link rel="stylesheet" href="/css/chat.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="/css/kenStyle.css" type="text/css" media="screen" />
        <script src="/assets/global/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <!-- LAYOUT: Apply "submenu-hover" class to body element to have sidebar submenu show on mouse hover -->
    <!-- LAYOUT: Apply "sidebar-collapsed" class to body element to have collapsed sidebar -->
    <!-- LAYOUT: Apply "sidebar-top" class to body element to have sidebar on top of the page -->
    <!-- LAYOUT: Apply "sidebar-hover" class to body element to show sidebar only when your mouse is on left / right corner -->
    <!-- LAYOUT: Apply "submenu-hover" class to body element to show sidebar submenu on mouse hover -->
    <!-- LAYOUT: Apply "fixed-sidebar" class to body to have fixed sidebar -->
    <!-- LAYOUT: Apply "fixed-topbar" class to body to have fixed topbar -->
    <!-- LAYOUT: Apply "rtl" class to body to put the sidebar on the right side -->
    <!-- LAYOUT: Apply "boxed" class to body to have your page with 1200px max width -->

    <!-- THEME STYLE: Apply "theme-sdtl" for Sidebar Dark / Topbar Light -->
    <!-- THEME STYLE: Apply  "theme sdtd" for Sidebar Dark / Topbar Dark -->
    <!-- THEME STYLE: Apply "theme sltd" for Sidebar Light / Topbar Dark -->
    <!-- THEME STYLE: Apply "theme sltl" for Sidebar Light / Topbar Light -->

    <!-- THEME COLOR: Apply "color-default" for dark color: #2B2E33 -->
    <!-- THEME COLOR: Apply "color-primary" for primary color: #319DB5 -->
    <!-- THEME COLOR: Apply "color-red" for red color: #C9625F -->
    <!-- THEME COLOR: Apply "color-green" for green color: #18A689 -->
    <!-- THEME COLOR: Apply "color-orange" for orange color: #B66D39 -->
    <!-- THEME COLOR: Apply "color-purple" for purple color: #6E62B5 -->
    <!-- THEME COLOR: Apply "color-blue" for blue color: #4A89DC -->
    <!-- BEGIN BODY -->
    <body class="sidebar-top fixed-topbar fixed-sidebar color-blue theme-sltd">
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section>
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar">
                <!--<img src="/assets/img/logo_v2.png" width="30%" class="logopanel"/>-->
                <div class="logopanel"  style="-webkit-box-shadow:none;">
                    <img src="/assets/img/logo_v2.png" width="20%" onclick="location.replace('<?php echo url_for('inicio/index') ?>');"/>
                    <!--                                    <h1>
                                                            <a href="<?php echo url_for("inicio/index") ?>"></a>
                                                        </h1>-->
                </div>
                <div class="sidebar-inner no-scrollbar" style="background-color:#4A89DC;">
                    <ul class="nav nav-sidebar">
                        <li><a href="<?php echo url_for("vender/index") ?>"><i class="icon-home"></i><span>Propiedades</span></a></li>
                        <li><a href="<?php echo url_for("requerimiento/index") ?>"><i class="icon-check"></i><span>Requerimientos</span></a></li>
                        <li>
                            <a href="<?php echo url_for("negocio/index") ?>">
                                <span class="pull-right badge badge-primary">
                                    <?php
                                    $usuario_id = sfContext::getInstance()->getUser()->getAttribute('usuario', null, 'seguridad');
                                    $Negocio = NegocioQuery::create()
                                            ->where("usuario_req = $usuario_id or usuario_prop = $usuario_id")
                                            ->groupByUsuarioReq()
                                            ->groupByUsuarioProp()
                                            ->find();
                                    $Usuario = UsuarioQuery::create()->findOneById($usuario_id);
                                    echo sizeof($Negocio);
                                    ?>
                                </span>
                                <i class="icon-diamond"></i>
                                <span>Negocios</span>
                            </a>
                        </li>
                        <?php if ($Usuario->getAdministrador()): ?>
                            <li><a href="<?php echo url_for("tasa_cambio/index") ?>"><i class="icon-refresh"></i><span>Tasa de Cambio</span></a></li>
                            <li><a href="<?php echo url_for("usuario/index") ?>"><i class="icon-users"></i><span>Usuarios</span></a></li>
                            <li><a href="<?php echo url_for("perfil/index") ?>"><i class="icon-lock"></i><span>Perfiles</span></a></li>
                            <li><a href="<?php echo url_for("configuracion/index") ?>"><i class="icon-settings"></i><span>Configuracion</span></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <!-- END SIDEBAR -->
            <div class="main-content">
                <!-- BEGIN TOPBAR -->
                <div class="topbar" style="-webkit-box-shadow:none;">
                    <div class="header-left">
                        <div class="topnav">
                            <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
                        </div>
                    </div>
                    <div class="header-right">
                        <ul class="header-menu nav navbar-nav">
                            <!-- BEGIN USER DROPDOWN -->
                            <li class="dropdown" id="user-header">
                                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img src="/assets/global/images/avatars/avatar1.png" alt="user image">
                                    <span class="username"><?php echo sfContext::getInstance()->getUser()->getAttribute("usuarioNombre", null, "seguridad") ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo url_for("seguridad/cambioclave") ?>"><i class="icon-refresh"></i><span>Cambiar Clave</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo url_for("seguridad/logout") ?>"><i class="icon-logout"></i><span>Cerrar Sesión</span></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER DROPDOWN -->
                        </ul>
                    </div>
                    <!-- header-right -->
                </div>
                <!-- END TOPBAR -->
                <!-- BEGIN PAGE CONTENT -->
                <div class="page-content">
                    <?php include_partial("soporte/avisos") ?>
                    <?php echo $sf_content; ?>
                    <div class="footer">
                        <div class="copyright">
                            <p class="pull-left sm-pull-reset">
                                <span>Copyright <span class="copyright">©</span> <?php echo date("Y") ?> </span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT -->
            </div>
            <!-- END MAIN CONTENT -->
        </section>
        <!-- BEGIN PRELOADER -->
        <div class="loader-overlay">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!-- END PRELOADER -->
        <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
        <script src="/assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="/assets/global/plugins/jquery/jquery-migrate-3.0.0.min.js"></script>
        <script src="/assets/global/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="/assets/global/plugins/gsap/main-gsap.min.js"></script>
        <script src="/assets/global/plugins/tether/js/tether.min.js"></script>
        <script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/global/plugins/appear/jquery.appear.js"></script>
        <script src="/assets/global/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
        <script src="/assets/global/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
        <script src="/assets/global/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
        <script src="/assets/global/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
        <script src="/assets/global/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
        <script src="/assets/global/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
        <script src="/assets/global/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
        <script src="/assets/global/plugins/select2/dist/js/select2.full.min.js"></script> <!-- Select Inputs -->
        <script src="/assets/global/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
        <script src="/assets/global/plugins/rateit/jquery.rateit.min.js"></script>
        <script src="/assets/global/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
        <script src="/assets/global/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
        <script src="/assets/global/plugins/charts-chartjs/Chart.min.js"></script>
        <script src="/assets/global/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="/assets/global/plugins/switchery/switchery.min.js"></script> <!-- IOS Switch -->
        <script src="/assets/global/js/builder.js"></script> <!-- Theme Builder -->
        <script src="/assets/global/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
        <script src="/assets/global/js/widgets/notes.js"></script> <!-- Notes Widget -->
        <script src="/assets/global/js/quickview.js"></script> <!-- Chat Script -->
        <script src="/assets/global/js/pages/search.js"></script> <!-- Search Script -->
        <!--<script src="/assets/global/js/pages/form_plugins.js"></script>-->
        <script src="/assets/global/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
        <script src="/assets/global/js/application.js"></script> <!-- Main Application Script -->
        <script src="/assets/admin/layout4/js/layout.js"></script> <!-- Main Application Script -->
        <script src="/js/bootstrap-rating-input.js"></script>
        <script type="text/javascript" src="/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.7"></script>
        <script src="/assets/global/plugins/cke-editor/ckeditor.js"></script>
        <script src="/assets/global/plugins/noty/jquery.noty.packaged.min.js"></script>  <!-- Notifications -->
        <script src="/assets/global/js/pages/notifications.js"></script>
        <script src="/js/kenScript.js"></script>
    </body>
</html>