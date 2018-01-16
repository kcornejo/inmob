<?php

class EnvioCorreoTask extends sfBaseTask {

    protected function configure() {
        // // add your own arguments here
        // $this->addArguments(array(
        //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
        // ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
                // add your own options here
        ));

        $this->namespace = 'Tarea';
        $this->name = 'EnvioCorreo';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [EnvioCorreo|INFO] task does things.
Call it with:

  [php symfony EnvioCorreo|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

        $config = ProjectConfiguration::getApplicationConfiguration("kunesweb", "prod", true);
        sfContext::createInstance($config);

        CorreoPeer::EnvioCorreo();
        // add your code here
    }

}
