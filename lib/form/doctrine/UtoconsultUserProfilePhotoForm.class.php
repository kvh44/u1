<?php

/**
 * UtoconsultUserProfilePhoto form.
 *
 * @package    utoconsult
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultUserProfilePhotoForm extends BaseUtoconsultUserProfilePhotoForm
{
	
  public function configure()
  {
    
  	unset(
      $this['created_at'], $this['updated_at']
    );
    
    
    
    
    $this->setWidget('photo', new sfWidgetFormInputFile());
    $this->setValidator('photo', new sfValidatorFile(array(
  'required'   => true,
  'path'       => sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR.'userprofilephoto',
  'mime_types' => 'web_images',
)));
   
   
  }
}
