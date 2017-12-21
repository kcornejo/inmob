[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]
<div class="panel">
    <div class="panel-header bg-red">
        <h3>
            <i class="fa fa-check"></i>
            Filtros
        </h3>
    </div>
    <div class="panel-content">
        [?php if ($form->hasGlobalErrors()): ?]
        [?php echo $form->renderGlobalErrors() ?]
        [?php endif; ?]

        <form class="form" action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" method="post">
            <div class="table-responsive">
                <table cellspacing="0" class="table table-striped table-bordered">
                    <tbody>
                        [?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?]
                        [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
                        [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
                        'name'       => $name,
                        'attributes' => $field->getConfig('attributes', array()),
                        'label'      => $field->getConfig('label'),
                        'help'       => $field->getConfig('help'),
                        'form'       => $form,
                        'field'      => $field,
                        'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
                        )) ?]
                        [?php endforeach; ?]
                    </tbody>
                </table>
            </div>
            <div class="form-actions">
                [?php echo $form->renderHiddenFields() ?]
                [?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'btn btn-circle btn-warning')) ?]
                <input class="btn btn-circle btn-info" type="submit" value="[?php echo __('Filter', array(), 'sf_admin') ?]" />
            </div>
        </form>
    </div>
</div>