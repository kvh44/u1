<?php

/**
 * UtoconsultPhoto form.
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultPhotoForm extends BaseUtoconsultPhotoForm
{
  public function configure()
  {
  	$this->useFields(array('user_id','category_id','title','content','photo','link'));
  	$this->widgetSchema['user_id']= new sfWidgetFormInputHidden();
    $this->validatorSchema['user_id']=new sfValidatorString();
    
    $this->widgetSchema['category_id']= new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultPhotoCategory'), 'add_empty' => '选择类别'));
    
    $this->setWidget('photo', new sfWidgetFormInputFile());
    $this->setValidator('photo', new sfValidatorFile(array(
           'required'   => true,
           'path'       => 'uploads'.DIRECTORY_SEPARATOR.'usersharedphoto', 
           'mime_types' => 'web_images',
    )));
    
    

    
    
     $this->setWidget('link', new sfWidgetFormInputText());
    
    
  }
}
