<?php foreach ($archivos as $archivo): ?>
    <li>
        <a href="<?php echo url_for('archivo/validar') . '?id=' . $archivo->getId() ?>">
            <span class="time">
                <?php
                if ($archivo->getCreatedAt('Y-m-d') == date('Y-m-d')) {
                    echo $archivo->getCreatedAt('H:i');
                } else {
                    echo $archivo->getCreatedAt('Y-m-d');
                }
                ?>
            </span>
            <span class="details">
                <span class="label label-sm label-icon label-warning">
                    <i class="fa fa-flash"></i>
                </span>
                <b>Nuevo Archivo</b> "<?php echo truncate_text($archivo->getDescripcion(), 30) ?>"
            </span>
        </a>
    </li>
<?php endforeach; ?>