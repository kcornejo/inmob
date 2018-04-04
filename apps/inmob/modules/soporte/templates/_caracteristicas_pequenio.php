<table class="table" style="padding: 0;">
    <tr>

        <td style="padding: 0;text-align: right;width: 10%">
            <b><?php echo $objeto->getArea() ?>&nbsp;&nbsp;</b>
        </td>
        <td style="padding: 0;width: 10%">
            <img style="max-width: 18px;margin-top:-10px;"
                 src="/assets/img/caracteristicas/Area-01.png"/>
        </td>
        <?php if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento" || $objeto->getTipoInmueble() == "Edificio"): ?>
            <td style="padding: 0;text-align: right;width: 10%">
                <b><?php echo $objeto->getNiveles() ?>&nbsp;&nbsp;</b>
            </td>
            <td style="padding: 0;width: 10%">
                <img style="max-width: 18px;margin-top:-10px;"
                     src="/assets/img/caracteristicas/Niveles-01.png"/>
            </td>
        <?php endif; ?>
        <?php if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento"): ?>
            <td style="padding: 0;text-align: right;width: 10%">
                <b><?php echo $objeto->getCantidadHabitacion() ?>&nbsp;&nbsp;</b>
            </td>
            <td style="padding: 0;width: 10%">
                <img style="max-width: 18px;margin-top:-10px;"
                     src="/assets/img/caracteristicas/Habitaciones-01.png"/>
            </td>
        <?php endif; ?>
        <?php if ($objeto->getTipoInmueble() != "Bodega" && $objeto->getTipoInmueble() != "Terreno"): ?>
            <td style="padding: 0;text-align: right;width: 10%">
                <b><?php echo $objeto->getCantidadParqueo() ?>&nbsp;&nbsp;</b>
            </td>
            <td style="padding: 0;width: 10%">
                <img style="max-width: 18px;margin-top:-10px;"
                     src="/assets/img/caracteristicas/Parqueos-01.png"/>
            </td>
        <?php endif; ?>
        <?php if ($objeto->getTipoInmueble() != "Bodega" && $objeto->getTipoInmueble() != "Terreno"): ?>
            <td style="padding: 0;text-align: right;width: 10%">
                <b><?php echo $objeto->getCantidadBanio() ?>&nbsp;&nbsp;</b>
            </td>
            <td style="padding: 0;width: 10%">
                <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
            </td>
        <?php endif; ?>
    </tr>
</table>