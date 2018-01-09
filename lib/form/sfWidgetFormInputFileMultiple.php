<?php

/**
 * 
 */
class sfWidgetFormInputFileMultiple extends sfWidgetFormInputFile {

    public function configure($options = array(), $attributes = array()) {
        // Widget gracefully degrades w/o javascript
        $this->addOption('disable_js', false);
        $this->addOption('max', 5);

        parent::configure($options, $attributes);
    }

    public function render($name, $value = null, $attributes = array(), $errors = array()) {
        $widget = $this->getFileWidget($name);
        $prototype = $widget->render($name . '[]', null, array_merge(array('disabled' => true), $attributes));

        $html = $this->renderContentTag('div', $prototype, array('class' => 'prototype', 'style' => 'display:none'));

        foreach ((array) $value as $key => $uploadValue) {
            if (is_int($key)) { // This means the file has already been uploaded
                $html .= $this->renderFileWidget($name, $uploadValue, $attributes, $errors);
            } else {
                // Hide upload field
                $widget = new sfWidgetFormInputHidden();
                $checkbox = new sfWidgetFormInputCheckbox();
                $inner = $widget->render(sprintf('%s[%s]', $name, $key), $uploadValue);
                $checkbox = $checkbox->render(sprintf('%s[remove][%s]', $name, $key), null, array('class' => 'checkbox')) . $this->renderContentTag('label', 'Remove ' . $this->renderContentTag('span', $key));
                $html .= $this->renderContentTag('div', $inner . $checkbox, array('class' => 'upload'));
            }
        }

        $numAvailable = $this->getOption('max') - count((array) $value);

        if ($this->getOption('disable_js')) {
            for ($i = 0; $i < $numAvailable; $i++) {
                $html .= $this->renderFileWidget($name, null, $attributes, $errors);
            }
        } else {
            // Add one empty guy
            $html .= $this->renderFileWidget($name, null, $attributes, $errors);

            // Add "Add Another" link
//            $html .= $this->renderContentTag('a', '+ Add Another File', array('class' => 'upload-another', 'href' => '#'));
        }

        $html = $this->renderContentTag('div', $html, array('class' => 'uploads', 'max' => $this->getOption('max')));

        return $html;
    }

    /**
     * Gets the JavaScript paths associated with the widget.
     *
     * @return array An array of JavaScript paths
     */
    public function getJavaScripts() {
        return array('/sfUploadPlugin/js/upload.js' => 'all');
    }

    protected function getFileWidget($name) {
        $options = $this->options;
        unset($options['disable_js'], $options['max']);
        return new sfWidgetFormInputFile($options, $this->attributes);
    }

    protected function renderFileWidget($name, $uploadValue, $attributes, $errors) {
        $widget = $this->getFileWidget($name);
        $inner = $widget->render($name . '[]', $uploadValue, $attributes, $errors);
        return $this->renderContentTag('div', $inner, array('class' => 'upload'));
    }

}
