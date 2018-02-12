<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Acceso</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link href="/assets/global/css/style.css" rel="stylesheet">
        <link href="/assets/global/css/ui.css" rel="stylesheet">
        <link href="/assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="/assets/img/logo.png" type="image/png">
    </head>
    <body class="sidebar-top account separate-inputs" data-page="login" style="color:white;">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <div class="row">
                <div class="col-sm-6 col-md-8 hidden-sm hidden-xs">
                    <span style="color:black;">
                        <center>
                            <h3><b>Conectando asesores inmobiliarios <br/></b></h3>
                            <h2><b>en toda Guatemala</b></h2>
                        </center>
                    </span>
                    <img src="/assets/img/mac.png" alt="" width="100%" style="display: initial"/>
                    <video controls class="col-md-12" style="margin-top:-55%;width:80%;margin-left:10%;">
                        <source src="video.mp4" type="video/mp4">
                        <source src="video.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    <span style="color:black;">
                        <br/>
                        <center>
                            <h2><b>5512 8282 | info@bex.com.gt</b></h2>
                        </center>
                    </span>
                </div>
                <div class="col-sm-6 col-md-4 nav-tabs3" style="margin-top:30px;">
                    <ul class="nav nav-tabs">
                        <?php if (sfContext::getInstance()->getUser()->hasFlash('error_registro')): ?>
                            <li class=""><a aria-expanded="true" href="#tab1_1" data-toggle="tab">Acceso</a></li>
                            <li class="active"><a aria-expanded="false" href="#tab1_2" data-toggle="tab">Registro</a></li>
                        <?php else: ?>
                            <li class="active"><a aria-expanded="true" href="#tab1_1" data-toggle="tab">Acceso</a></li>
                            <li class=""><a aria-expanded="false" href="#tab1_2" data-toggle="tab">Registro</a></li>
                        <?php endif; ?>
                    </ul>
                    <div class="tab-content" style="background-color:transparent;">
                        <div class="tab-pane fade <?php
                        if (!sfContext::getInstance()->getUser()->hasFlash('error_registro')) {
                            echo "active in";
                        }
                        ?>" id="tab1_1">
                            <div class="account-wall" style="margin-top:15%;">
                                <center>
                                    <img src="/assets/img/logo.png" width="50%"/>
                                    <br/><br/>
                                </center>
                                <?php echo $form->renderFormTag(url_for("seguridad/login"), array("class" => "form-signin")) ?>
                                <?php if ($form['usuario']->hasError()): ?>
                                    <div class="alert alert-danger media fade in">
                                        <p><strong>Error</strong> <?php echo $form['usuario']->getError() ?>.</p>
                                    </div>
                                <?php endif; ?>
                                <?php if (sfContext::getInstance()->getUser()->hasFlash('exito_registro')): ?>
                                    <div class="alert alert-success media fade in">
                                        <p><strong>Error</strong> <?php echo sfContext::getInstance()->getUser()->getFlash('exito_registro') ?>.</p>
                                    </div>
                                <?php endif; ?>
                                <div class="append-icon">
                                    <?php echo $form["usuario"] ?>
                                    <i class="icon-user"></i>
                                </div>
                                <div class="append-icon">
                                    <?php echo $form["clave"] ?>
                                    <i class="icon-lock"></i>
                                </div>

                                <a class="m-b-20" href="<?php echo url_for("seguridad/recuperaclave") ?>" style="position:relative;float:right;color:#C5C5C5;">
                                    <b>Olvidaste tu clave?</b>
                                </a>
                                <button style="background:#2E57A7;" name="btn_login" type="submit" id="btn_login" class="btn btn-lg btn-block ladda-button m-b-10" data-style="expand-left">
                                    <i class="fa fa-sign-in"></i>
                                    Ingreso
                                </button>
                                <?php echo $form->renderHiddenFields() ?>
                                <?php echo "</form>"; ?>
                            </div>
                            <p class="account-copyright">
                                <span>Copyright © <?php echo date("Y") ?>
                            </p>
                        </div>
                        <div class="tab-pane fade <?php
                        if (sfContext::getInstance()->getUser()->hasFlash('error_registro')) {
                            echo "active in";
                        }
                        ?>" id="tab1_2">
                            <div class="account-wall" style="margin-top:15%;">
                                <center>
                                    <img src="/assets/img/logo.png" width="50%"/>
                                    <br/><br/>
                                </center>
                                <?php echo $form_registro->renderFormTag(url_for("seguridad/login"), array("class" => "form-signin")) ?>
                                <?php if ($form_registro['correo']->hasError()): ?>
                                    <div class="alert alert-danger media fade in">
                                        <p><strong>Error</strong> <?php echo $form_registro['correo']->getError() ?>.</p>
                                    </div>
                                <?php endif; ?>
                                <div class="append-icon m-b-10">
                                    <?php echo $form_registro["perfil"] ?>
                                    <i class="icon-shield"></i>
                                </div>
                                <div class="append-icon">
                                    <?php echo $form_registro["numero_telefono"] ?>
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="append-icon">
                                    <?php echo $form_registro["correo"] ?>
                                    <i class="fa fa-inbox"></i>
                                </div>
                                <div class="append-icon">
                                    <?php echo $form_registro["usuario"] ?>
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="append-icon">
                                    <?php echo $form_registro["contrasenia"] ?>
                                    <i class="fa fa-key"></i>
                                </div>
                                <div class="append-icon">
                                    <?php echo $form_registro["contrasenia_2"] ?>
                                    <i class="fa fa-refresh"></i>
                                </div>
                                <button style="background:#2E57A7;"  name="btn_registro" type="submit" id="btn_registro" class="btn btn-lg btn-block ladda-button m-b-10" data-style="expand-left">
                                    <i class="fa fa-user"></i>
                                    Registro
                                </button>
                                <?php echo $form_registro->renderHiddenFields() ?>
                                <?php echo "</form>"; ?>
                            </div>
                            <p class="account-copyright">
                                <span>Copyright © <?php echo date("Y") ?>
                            </p>
                        </div>
                    </div>


                </div>
            </div>


        </div>
        <script src="/assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="/assets/global/plugins/jquery/jquery-migrate-3.0.0.min.js"></script>
        <script src="/assets/global/plugins/gsap/main-gsap.min.js"></script>
        <script src="/assets/global/plugins/tether/js/tether.min.js"></script>
        <script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/global/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="/assets/global/js/pages/login-v1.js"></script>
    </body>
</html>