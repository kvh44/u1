<?php
class UtoconsultFileForm2 extends UtoconsultFileForm
{

  public function configure()
  {
  	$this->useFields(array('title','category_id','description','imageicon','user_id','isuto','lang','level'));
  
  	 
  	
  	
  	 $this->setWidget('category_id', new sfWidgetFormDoctrineChoice(array('model' => 'UtoconsultFileCategory',
  	                              'add_empty' => '分类'
  	)));
  	
  	if(sfContext::getInstance()->getUser('user')->getAttribute('user')){
    	$this->setWidget('user_id',new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser('user')->getAttribute('user')->getId())));
    }

    
    if(sfContext::getInstance()->getUser('user')->getAttribute('user')->getIsadmin()){
    	$this->setWidget('isuto',new sfWidgetFormInputHidden(array(), array('value' => 1)));
    }
    else{
    	$this->setWidget('isuto',new sfWidgetFormInputHidden(array(), array('value' => 0)));
    }
  
    $this->setWidget('lang', new sfWidgetFormSelect(array('choices' => parent::$subjects)));
  
    $this->setWidget('level', new sfWidgetFormSelect(array('choices' => parent::$levels)));
    
    $this->setWidget('imageicon',new sfWidgetFormInputHidden());
    
  }
  
    
	
	
}




?>