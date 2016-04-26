<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->setWebDir($this->getRootDir());
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfThumbnailPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfImageTransformPlugin');
    $this->enablePlugins('sfAdminThemejRollerPlugin');
    $this->enablePlugins('sfCaptchaGDPlugin');
  }
  
  public function configureDoctrine(Doctrine_Manager $manager)
  {
    $manager->setCollate('utf8_unicode_ci');
    $manager->setCharset('utf8');
  }
  
  static protected $zendLoaded = false;
 
  static public function registerZend()
  {
    if (self::$zendLoaded)
    {
      return;
    }
 
    set_include_path(sfConfig::get('sf_lib_dir').'/vendor'.PATH_SEPARATOR.get_include_path());
    require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Loader/Autoloader.php';
    Zend_Loader_Autoloader::getInstance();
    self::$zendLoaded = true;
  }
}
