<?php foreach ($archivos as $archivo): ?>
    <div class="table-responsive">
        <table style="cursor:pointer;" onclick="window.location.href = '<?php echo url_for('archivo/detalle') . '?id=' . $archivo->getId() ?>'">
            <tr>
                <td style ="width:20%">
                    <?php if ($archivo->getUsuario()->getImagen()): ?>
                        <img alt="" style="width:40%;float:right;margin-right: 10px"  class="img-circle float-right" src="<?php echo$archivo->getUsuario()->getImagen() ?>"/>
                    <?php else: ?>
                        <img alt="" style="width:40%;float:right;margin-right: 10px"  class="img-circle" src="/assets/admin/layout/img/avatar.png"/>
                    <?php endif; ?>
                </td>
                <td style="width:50%">
                    <h4><?php echo $archivo->getUsuario() ? $archivo->getUsuario()->getUsuario() : '[SIN USUARIO]' ?></h4>
                </td>
                <td  style="width:30%;" align="right">
                    <i><?php echo $archivo->getCreatedAt('d/m/Y H:i') ?></i>&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            <tr style="height:40px">
                <td></td>
                <td colspan="2">
                    subio
                    <b><?php echo $archivo->getNombreArchivoOriginal() ?></b>
                </td>
            </tr>
        </table>
    </div>
<?php endforeach; ?>
