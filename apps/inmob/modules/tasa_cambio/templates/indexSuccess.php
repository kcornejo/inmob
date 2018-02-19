<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header"  style="background-color:#305da8;color:white;font-size:14pt;">
                <h3 face="Helvetica">
                    Tasa de Cambio
                </h3>
            </div>
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-8">
                        <?php echo $form->renderFormTag(url_for("tasa_cambio/index")) ?>
                        <?php echo $form ?>
                        <hr/>
                        <button type="submit" class="btn" style="background-color:#305da8;color:white">
                            Guardar
                        </button>
                        <?php echo "</form>"; ?>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <?php foreach ($tasaCambio as $fila): ?>
                                    <tr>
                                        <td>
                                            <?php echo $fila->getMonedaRelatedByMonedaOrigen()->getCodigo(); ?> 1.00 = <?php echo $fila->getMonedaRelatedByMonedaDestino()->getCodigo() . " " . number_format($fila->getMonto(), 4); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>