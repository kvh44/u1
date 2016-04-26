<?php


require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

date_default_timezone_set('europe/paris');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
