<?php
/*  optimizado */
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('inmob', 'prod', true);
sfContext::createInstance($configuration)->dispatch();