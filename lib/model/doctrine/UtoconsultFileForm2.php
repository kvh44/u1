<?php
class UtoconsultFileForm2 extends UtoconsultFileForm
{

  public function configure()
  {
  	unset($this['file'],$this['category_id'],$this['visitnumber'],$this['isvalid'],$this['isdeleted'],$this['created_at'],$this['updated_at'],$this['slug']);
  
  	
  	if(sfContext::getInstance()->getUser('user')->getAttribute('user')){
    	$this->setWidget('user_id',new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser('user')->getAttribute('user')->getId())));
    }
    
    $this->setWidget('image', new sfWidgetFormInputFileEditable(array(
  	       'file_src' => '/uploads/usersharedfileimage/'.$this->getObject()->getImage(),
           'is_image' => true,
           'edit_mode' => !$this->isNew(),
           'with_delete' => false,
           'delete_label' => '替换以前上传的封面图片',
  	)));
    $this->setValidator('image', new sfValidatorFile(array(
           'required'   => false,
           'path' => 'uploads'.DIRECTORY_SEPARATOR.'usersharedfileimage',
           'mime_types' => 'web_images',
    )));
    
    
    if(sfContext::getInstance()->getUser('user')->getAttribute('user')->getIsadmin()){
    	$this->setWidget('isuto',new sfWidgetFormInputHidden(array(), array('value' => 1)));
    }
    else{
    	$this->setWidget('isuto',new sfWidgetFormInputHidden(array(), array('value' => 0)));
    }
  
    $this->setWidget('lang', new sfWidgetFormSelect(array('choices' => parent::$subjects)));
  
    $this->setWidget('level', new sfWidgetFormSelect(array('choices' => parent::$levels)));
    
    
  }
  
    
	
	
}




?>