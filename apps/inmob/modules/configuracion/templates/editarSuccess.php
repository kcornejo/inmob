<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header" style="background-color:#305da8;color:white;font-size:14pt;">
                <h3 face="Helvetica">
                    <a href="#" data-toggle="modal" data-target="#modal-basic" style="color:white;">
                        <i class="icon icons-arrows-03"></i>
                    </a>
                    Configuracion de Formato "<?php echo $tipo ?>"
                </h3>
            </div>
            <div class="panel-content">
                <?php echo form_tag(url_for("configuracion/editar") . "?tipo=" . $tipo) ?>
                <?php echo $form ?>
                <hr/>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i>
                        Guardar
                    </button>
                </div>
                <?php echo "</form>"; ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                <h4 class="modal-title"><strong>Aviso!</strong></h4>
            </div>
            <div class="modal-body">
                Desea guardar antes de Salir?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-embossed" data-dismiss="modal" onclick="$('form').submit();">Guardar</button>
                <button type="button" class="btn btn-danger btn-embossed" data-dismiss="modal" onclick="location.href = '<?php echo url_for("configuracion/index") ?>'">Salir</button>
                <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>