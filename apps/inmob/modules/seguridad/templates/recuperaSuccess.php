<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Acceso</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="/assets/global/images/favicon.png">
        <link href="/assets/global/css/style.css" rel="stylesheet">
        <link href="/assets/global/css/ui.css" rel="stylesheet">
        <link href="/assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    </head>
    <body class="sidebar-top account separate-inputs" data-page="login">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <center>
                            <img src="/assets/img/logo_v2.png" width="50%"/>
                            <br/><br/>
                        </center>
                        <?php echo $form->renderFormTag(url_for("seguridad/recupera") . "?token=" . $token, array("class" => "form-signin")) ?>
                        <?php if ($form['clave']->hasError()): ?>
                            <div class="alert alert-danger media fade in">
                                <p><strong>Error</strong> <?php echo $form['clave']->getError() ?>.</p>
                            </div>
                        <?php endif; ?>
                        <div class="append-icon">
                            <?php echo $form["clave"] ?>
                            <i class="icon-user"></i>
                        </div>
                        <div class="append-icon">
                            <?php echo $form["clave_2"] ?>
                            <i class="icon-user"></i>
                        </div>
                        <button type="submit" id="submit-form" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left">
                            <i class="fa fa-refresh"></i>
                            Recuperar
                        </button>
                        <?php echo $form->renderHiddenFields() ?>
                        <?php echo "</form>"; ?>
                    </div>
                </div>
            </div>
            <p class="account-copyright">
                <span>Copyright © <?php echo date("Y") ?>
            </p>

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