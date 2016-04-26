<?php
abstract class BasePhotoFrontForm extends BaseFormDoctrine {
	public function setup()
  {
  	 $this->setWidgets(array(
  	 'category_id' => new sfWidgetFormDoctrineChoice(array(
  	 'model' => $this->getRelatedModelName('UtoconsultPhotoCategory'), 
  	 'add_empty' => '所有类别'))));
     
  	 
  	 $this->setValidators(array(
      'category_id' => new sfValidatorString()
    ));
    
     $this->setupInheritance();

     parent::setup();
  }
  
  public function getModelName()
  {
    return 'UtoconsultPhotoCategory';
  }
}