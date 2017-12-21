[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]
<div class="panel">
    <div class="panel-header bg-blue">
        <h3>
            <i class="fa fa-pencil"></i>[?php echo <?php echo $this->getI18NString('edit.title') ?> ?]
        </h3>
    </div>
    <div class="panel-content">
        [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

        <div id="sf_admin_header">
            [?php include_partial('<?php echo $this->getModuleName() ?>/form_header', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
        </div>

        <div id="sf_admin_content">
            [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
        </div>
        <div id="sf_admin_footer">
            [?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
        </div>
    </div>
</div>