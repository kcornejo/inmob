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
            </div>
            <!-- END SIDEBAR -->
            <div class="main-content">
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
                                    <img src="/assets/global/images/avatars/avatar12.png" alt="user image">
                                    <span class="username"><?php echo sfContext::getInstance()->getUser()->getAttribute("usuarioNombre", null, "seguridad") ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo url_for("seguridad/login") ?>"><i class="icon-key"></i><span>Iniciar Sesión</span></a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER DROPDOWN -->
                        </ul>
                    </div>
                    <!-- header-right -->
                </div>
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-header"   style="background-color:#305da8;color:white;font-size:14pt;">
                                    <h3 face="Helvetica">
                                        Requerimiento en <?php
                                        switch ($requerimiento->getTipoOperacion()) {
                                            case "Comprar":
                                                echo "Compra";
                                                break;
                                            case "Renta";
                                                echo "Renta";
                                                break;
                                        }
                                        ?>
                                    </h3>
                                </div>
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-7" style=";background-color:#f1f3f3; text-align: center;">
                                            <img style="max-height: 100%" src="<?php echo $requerimiento->getDireccionImagen() ?>"/>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="panel">
                                                <div class="panel-header">
                                                    <h5 style="color:gray;">
                                                        INFORMACION FINANCIERA
                                                    </h5>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td colspan="2">
                                                                Precio: <?php echo $requerimiento->getMoneda()->getCodigo() . " " . number_format($requerimiento->getPresupuestoMin(), 0) . ' - ' . number_format($requerimiento->getPresupuestoMax(), 0) ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                Forma de Pago: <?php echo $requerimiento->getFormaPago() ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div style="float:left;">
                                                <h3>
                                                    <b><?php echo $requerimiento->getMoneda()->getCodigo() ?></b>
                                                    <?php echo number_format($requerimiento->getPresupuestoMin(), 2) ?> - <?php echo number_format($requerimiento->getPresupuestoMax(), 2) ?>
                                                </h3>
                                            </div>
                                            <div style="float:right;">
                                                <h5>
                                                    <?php echo $requerimiento->getCreatedAt("d/m/Y") ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h5 style="color:gray;">
                                            CARACTERISTICAS DEL INMUEBLE
                                        </h5>
                                        <br/>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getArea() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Area-01.png"/>
                                            <br/><br/>
                                        </div>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getNiveles() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Niveles-01.png"/>
                                            <br/><br/>
                                        </div>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getCantidadHabitacion() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Habitaciones-01.png"/>
                                            <br/><br/>
                                        </div>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getCantidadParqueo() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Parqueos-01.png"/>
                                            <br/><br/>
                                        </div>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getCantidadBanio() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Baños-01.png"/>
                                            <br/><br/>
                                        </div>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getAreaX() . "x" . $requerimiento->getAreaY() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dimensiones-01.png"/>
                                            <br/><br/>
                                        </div>
                                        <?php if ($requerimiento->getTieneAgua()): ?>
                                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Agua-01.png"/>
                                                <br/><br/>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($requerimiento->getTieneLuz()): ?>
                                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Energia electrica-01.png"/>
                                                <br/><br/>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getCantidadComedor() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Comedor.png"/>
                                            <br/><br/>
                                        </div>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getCantidadSala() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Sala.png"/>
                                            <br/><br/>
                                        </div>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getCantidadCocina() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cocina.png"/>
                                            <br/><br/>
                                        </div>
                                        <?php if ($requerimiento->getDormitorioServicio()): ?>
                                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Dormitorio de servicio.png"/>
                                                <br/><br/>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($requerimiento->getEstudio()): ?>
                                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Estudio.png"/>
                                                <br/><br/>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($requerimiento->getCisterna()): ?>
                                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Cisterna-01.png"/>
                                                <br/><br/>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getCantidadJardin() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Jardin.png"/>
                                            <br/><br/>
                                        </div>
                                        <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                            <?php echo $requerimiento->getCantidadPatio() ?>
                                            <img style="max-width: 30px;" src="/assets/img/caracteristicas/Patio.png"/>
                                            <br/><br/>
                                        </div>
                                        <?php if ($requerimiento->getLavanderia()): ?>
                                            <div class="col-md-2 col-xs-4 col-sm-4" style="text-align: center;">
                                                <img style="max-width: 30px;" src="/assets/img/caracteristicas/Lavanderia.png"/>
                                                <br/><br/>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md-12">
                                            <?php $contador = 1 ?>
                                            <?php foreach ($requerimiento->getDireccionRequerimientos() as $dir): ?>
                                                <h5 style="color:gray;">
                                                    UBICACION <?php echo $contador ?>
                                                </h5>
                                                <?php $propiedad = $dir; ?>
                                                <?php echo $propiedad->getZona() ? "Zona " . $propiedad->getZona() . ", " : null ?>
                                                <?php echo $propiedad->getCarretera() ? "Carretera " . $propiedad->getCarretera() . ", " : null ?>
                                                <?php echo $propiedad->getKm() ? "Km " . $propiedad->getKm() . ", " : null ?>
                                                <?php echo $propiedad->getMunicipio() ? $propiedad->getMunicipio() . ", " : null ?>
                                                <?php echo $propiedad->getDepartamento() ? $propiedad->getDepartamento() . ", " : null ?>
                                                <?php echo $propiedad->getDireccion() ?>
                                                <?php $contador ++ ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <script src="/js/kenScript.js"></script>
    </body>
</html>
