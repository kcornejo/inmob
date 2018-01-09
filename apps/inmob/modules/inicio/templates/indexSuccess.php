
<ul id="myTab6" class="nav nav-tabs">
    <li class="active"><a href="#tab6_1" data-toggle="tab" aria-expanded="true">Vender Propiedad</a></li>
    <li class=""><a href="#tab6_2" data-toggle="tab" aria-expanded="false">Comprar Propiedad</a></li>
    <li class=""><a href="#tab6_3" data-toggle="tab" aria-expanded="false">Negocio</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade active in" id="tab6_1">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <?php foreach ($propiedades as $propiedad): ?>
                        <tr onclick="location.replace('<?php echo url_for('vender/editar') . "?id=" . $propiedad->getId() ?>')">
                            <td style="width:40%">
                                <?php foreach ($propiedad->getPropiedadImagens() as $fila): ?>
                                    <img style="width:100%" src="<?php echo DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $fila->getNombreActual() ?>"/>
                                    <?php break; ?>
                                <?php endforeach; ?>
                                <?php if (sizeof($propiedad->getPropiedadImagens()) == 0): ?>
                                    <div style=";background-color:#f1f3f3; text-align: center;">
                                        <img style="width:100%" src="/assets/img/caracteristicas/casa.png"/>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td style="width:60%">
                                <table style="width:100%;">
                                    <tr>
                                        <td># <?php echo $propiedad->getId() ?></td>
                                        <td style="text-align:right;">
                                            <?php echo $propiedad->getMoneda()->getCodigo() . " " . number_format($propiedad->getPrecio(), 2) ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <hr/>
            <button style="float:right" onclick="location.replace('<?php echo url_for('vender/nueva') ?>');" type="button" class="btn btn-icon btn-rounded btn-primary"><i class="fa fa-plus"></i></button>
        </div>
    </div>
    <div class="tab-pane fade" id="tab6_2">
        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
    </div>
    <div class="tab-pane fade" id="tab6_3">
        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
    </div>
</div>
