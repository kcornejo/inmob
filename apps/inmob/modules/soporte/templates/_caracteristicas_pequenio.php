<table class="table" style="padding: 0;">
    <tr>
        <?php // if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento" || $objeto->getTipoInmueble() == "Terreno" || $objeto->getTipoInmueble() == "Oficinas"): ?>
        <td style="padding: 0;text-align: right;">
            <b><?php echo $objeto->getArea() ?>&nbsp;&nbsp;</b>
        </td>
        <td style="padding: 0;">
            <img style="max-width: 18px;margin-top:-10px;"
                 src="/assets/img/caracteristicas/Area-01.png"/>
        </td>
        <?php // endif; ?>
        <?php // if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento"): ?>
        <td style="padding: 0;text-align: right;">
            <b><?php echo $objeto->getNiveles() ?>&nbsp;&nbsp;</b>
        </td>
        <td style="padding: 0;">
            <img style="max-width: 18px;margin-top:-10px;"
                 src="/assets/img/caracteristicas/Niveles-01.png"/>
        </td>
        <?php // endif; ?>
        <?php // if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento"): ?>
        <td style="padding: 0;text-align: right;">
            <b><?php echo $objeto->getCantidadHabitacion() ?>&nbsp;&nbsp;</b>
        </td>
        <td style="padding: 0;">
            <img style="max-width: 18px;margin-top:-10px;"
                 src="/assets/img/caracteristicas/Habitaciones-01.png"/>
        </td>
        <?php // endif; ?>
        <?php // if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento"): ?>
        <td style="padding: 0;text-align: right;">
            <b><?php echo $objeto->getCantidadParqueo() ?>&nbsp;&nbsp;</b>
        </td>
        <td style="padding: 0;">
            <img style="max-width: 18px;margin-top:-10px;"
                 src="/assets/img/caracteristicas/Parqueos-01.png"/>
        </td>
        <?php // endif; ?>
        <?php // if ($objeto->getTipoInmueble() == "Casa" || $objeto->getTipoInmueble() == "Apartamento"): ?>
        <td style="padding: 0;text-align: right;">
            <b><?php echo $objeto->getCantidadBanio() ?>&nbsp;&nbsp;</b>
        </td>
        <td style="padding: 0;">
            <img style="max-width: 18px;margin-top:-10px;" src="/assets/img/caracteristicas/Baños-01.png"/>
        </td>
        <?php // endif; ?>
    </tr>
</table>