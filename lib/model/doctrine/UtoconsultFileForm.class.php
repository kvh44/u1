<?php

/**
 * UtoconsultFile form.
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultFileForm extends BaseUtoconsultFileForm
{
  protected static $subjects = array('中文'=>'中文','English'=>'English');	
  protected static $levels = array(1,2,3);		
  public function configure()
  {
  	unset($this['category_id'],$this['visitnumber'],$this['isvalid'],$this['isdeleted'],$this['created_at'],$this['updated_at'],$this['slug']);
  
    $this->setValidator('title',new sfValidatorString(array('required'   => true,),array('required'   => '<b class="red2">给它起个名字</b>'))); 
    
  	$this->setWidget('file', new sfWidgetFormInputFileEditable(array(
  	       'file_src' => '/uploads/usersharedfile/'.$this->getObject()->getFile(),
           'is_image' => false,
           'edit_mode' => !$this->isNew(),
           'with_delete' => false,
  	       'delete_label' => '替换以前上传的文件', 
  	)));
    $this->setValidator('file', new sfValidatorFile(array(
           'required'   => true,
           'required'  => '<b class="red2">本地文件路径不能为空</b>',
           'path' => 'uploads'.DIRECTORY_SEPARATOR.'usersharedfile', 
           'mime_categories' => array('pdf' => array('application/pdf', 'application/x-pdf')),
           'mime_types'      => 'pdf',   
           'max_size' => 10000000,
    )));
    
    
    
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
    
    
    if(sfContext::getInstance()->getUser('user')->getAttribute('user')){
    	$this->setWidget('user_id',new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser('user')->getAttribute('user')->getId())));
    }
    
    
    if(sfContext::getInstance()->getUser('user')->getAttribute('user')->getIsadmin()){
    	$this->setWidget('isuto',new sfWidgetFormInputHidden(array(), array('value' => 1)));
    }
    else{
    	$this->setWidget('isuto',new sfWidgetFormInputHidden(array(), array('value' => 0)));
    }
   

    
    $this->setWidget('lang', new sfWidgetFormSelect(array('choices' => self::$subjects)));
     
    $this->setWidget('level', new sfWidgetFormSelect(array('choices' => self::$levels)));
  	
  }
}