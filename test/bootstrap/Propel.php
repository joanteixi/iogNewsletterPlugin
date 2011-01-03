<?php // initializes testing framework
//$sf_root_dir = realpath(dirname(__FILE__).'/../../../');

// initialize database manager
require_once('unit.php');

$configuration = ProjectConfiguration::getApplicationConfiguration( 'front', 'test', true);

new sfDatabaseManager($configuration);


$loader = new sfPropelData();
$loader->loadData(sfConfig::get('sf_plugins_dir').'/iogNewsletterPlugin/test/fixtures');

