<?php

/**
 * 
 */
class sfValidatorFileMultiple extends sfValidatorBase {

    // Options passed to sfValidatorFile
    // 
    // NOTE: We cannot just extend sfValidatorFile (as would be preferrable)
    //       due to magic in the Form Framework which specifically checks for
    //       the sfValidatorFile widget

    protected function configure($options = array(), $messages = array()) {
        if (!ini_get('file_uploads')) {
            throw new LogicException(sprintf('Unable to use a file validator as "file_uploads" is disabled in your php.ini file (%s)', get_cfg_var('cfg_file_path')));
        }

        $this->addOption('max_size');
        $this->addOption('mime_types');
        $this->addOption('mime_categories', array(
            'web_images' => array(
                'image/jpeg',
                'image/pjpeg',
                'image/png',
                'image/x-png',
                'image/gif',
        )));
        $this->addOption('validated_file_class', 'sfValidatedFile');
        $this->addOption('path', null);
        $this->addOption('max', 5);

        $this->addMessage('max_size', 'File is too large (maximum is %max_size% bytes).');
        $this->addMessage('mime_types', 'Invalid mime type (%mime_type%).');
        $this->addMessage('partial', 'The uploaded file was only partially uploaded.');
        $this->addMessage('no_tmp_dir', 'Missing a temporary folder.');
        $this->addMessage('cant_write', 'Failed to write file to disk.');
        $this->addMessage('extension', 'File upload stopped by extension.');
        $this->addMessage('max', 'Only %max% uploads allowed - %actual% provided');
    }

    public function doClean($value) {
        $clean = array();
        $max = $this->getOption('max');

        $messages = $this->messages;
        $options = $this->options;
        unset($messages['max'], $options['max'], $options['disable_js']);
        $fileVal = new sfValidatorFile((array) $options, (array) $messages);

        // Observe "remove" checkbox, if present
        if (isset($value['remove'])) {
            $remove = $value['remove'];
            unset($value['remove']);
            $value = array_diff_key($value, $remove);
        }

        $count = 0;

        foreach ((array) $value as $key => $file) {
            if (!is_array($file)) {
                // This file has already been uploaded
                $clean[$key] = $file;
            } elseif ($validatedFile = $fileVal->clean($file)) {
                $validatedFile->save();
                $clean[$validatedFile->getOriginalName()] = basename($validatedFile->getSavedName());
            }
        }

        if ($max && count($clean) > $max) {
            throw new sfValidatorError($this, 'max', array('max' => $max, 'actual' => count($clean)));
        }

        return $clean;
    }

}
