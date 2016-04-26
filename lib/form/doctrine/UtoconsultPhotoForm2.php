<?php
class UtoconsultPhotoForm2 extends BaseUtoconsultPhotoForm
{
  public function configure()
  {
  	$this->useFields(array('user_id','category_id','title','content','link'));
  	$this->widgetSchema['user_id']= new sfWidgetFormInputHidden();
    $this->validatorSchema['user_id']=new sfValidatorString();
    
    $this->setWidget('link', new sfWidgetFormInputText());
    
  }
}
  