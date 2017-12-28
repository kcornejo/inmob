
<ul id="myTab6" class="nav nav-tabs">
    <li class="active"><a href="#tab6_1" data-toggle="tab" aria-expanded="true">Vender Propiedad</a></li>
    <li class=""><a href="#tab6_2" data-toggle="tab" aria-expanded="false">Comprar Propiedad</a></li>
    <li class=""><a href="#tab6_3" data-toggle="tab" aria-expanded="false">Negocio</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade active in" id="tab6_1">
        <?php echo $formulario_vender->renderFormTag("inicio/index"); ?>
        <div class="row">
            <div class="col-md-6">
                <h3>Tipo de Operacion</h3>
                <?php echo $formulario_vender["tipo_operacion"]; ?>
            </div>
            <div class="col-md-6">
                <h3>Tipo de Inmueble</h3>
                <?php echo $formulario_vender["tipo_inmueble"]; ?>
            </div>
            <div class="col-md-12">
                <h3>Caracteristicas de Inmueble</h3>
                <div class="row">
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Habitaciones<br/><br/><img width="25%" src="/assets/img/iconos/habitaciones.png"/></h3>
                        <?php echo $formulario_vender["habitacion"] ?>
                    </div>
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Baño<br/><br/><img width="25%" src="/assets/img/iconos/baños.png"/></h3>
                        <?php echo $formulario_vender["banio"] ?>
                    </div>
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Parqueo<br/><br/><img width="25%" src="/assets/img/iconos/parqueos.png"/></h3>
                        <?php echo $formulario_vender["parqueo"] ?>
                    </div>
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Comedor<br/><br/><img width="25%" src="/assets/img/iconos/comedores.png"/></h3>
                        <?php echo $formulario_vender["comedor"] ?>
                    </div>
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Salas<br/><br/><img width="25%" src="/assets/img/iconos/comedores.png"/></h3>
                        <?php echo $formulario_vender["sala"] ?>
                    </div>
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Cocina<br/><br/><img width="25%" src="/assets/img/iconos/comedores.png"/></h3>
                        <?php echo $formulario_vender["cocina"] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Dormitorio de Servicio<br/><br/><img width="25%" src="/assets/img/iconos/comedores.png"/></h3>
                        <div style="text-align: center">
                            <?php echo $formulario_vender["dormitorio_servicio"] ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Estudio<br/><br/><img width="25%" src="/assets/img/iconos/comedores.png"/></h3>
                        <div style="text-align: center">
                            <?php echo $formulario_vender["estudio"] ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Cisterna<br/><br/><img width="25%" src="/assets/img/iconos/comedores.png"/></h3>
                        <div style="text-align: center">
                            <?php echo $formulario_vender["cisterna"] ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Jardin<br/><br/><img width="25%" src="/assets/img/iconos/comedores.png"/></h3>
                        <?php echo $formulario_vender["jardin"] ?>
                    </div>
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Patio<br/><br/><img width="25%" src="/assets/img/iconos/comedores.png"/></h3>
                        <?php echo $formulario_vender["patio"] ?>
                    </div>
                    <div class="col-md-2">
                        <h3 style="text-align: center;">Lavanderia<br/><br/><img width="25%" src="/assets/img/iconos/comedores.png"/></h3>
                        <div style="text-align: center">
                            <?php echo $formulario_vender["lavanderia"] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo "</form>"; ?>
    </div>
    <div class="tab-pane fade" id="tab6_2">
        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
    </div>
    <div class="tab-pane fade" id="tab6_3">
        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
    </div>
</div>
