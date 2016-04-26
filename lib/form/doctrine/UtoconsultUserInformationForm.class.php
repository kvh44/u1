<?php

/**
 * UtoconsultUserInformation form.
 *
 * @package    utoconsult
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultUserInformationForm extends BaseUtoconsultUserInformationForm
{
  public function configure()
  {
    unset(
      $this['country'],$this['created_at'], $this['updated_at']
    );
    
    $userId=sfContext::getInstance()->getUser()->getAttribute('user')->id;
    $this->widgetSchema['user_id']= new sfWidgetFormInputHidden();
    $this->validatorSchema['user_id']=new sfValidatorChoice(array('choices' => array($userId), 'empty_value' => $userId, 'required' => false));
    
    $this->widgetSchema['province']= new sfWidgetFormChoice(array(
  'choices' => Doctrine_Core::getTable('province')->getProvince(),
  'expanded' => false,
));
     $this->validatorSchema['province']=new sfValidatorChoice(array(
  'choices' => array_keys(Doctrine_Core::getTable('province')->getProvince()),
));
    

    $object=$this->getObject();
    if(isset($object['_data']['province']))
    {
    	$provinceID=$object['_data']['province'];
    }
    else{
    	$provinceID=0;
    }
    
    $this->widgetSchema['city']= new sfWidgetFormChoice(array(
  'choices' => Doctrine_Core::getTable('city')->getCity($provinceID),
  'expanded' => false,
));
    /*
    $this->validatorSchema['city']=new sfValidatorChoice(array(
  'choices' => array_keys(Doctrine_Core::getTable('city')->getCity($provinceID)),
));
    */
    $object=$this->getObject();
    if(isset($object['_data']['city']))
    {
    	$cityID=$object['_data']['city'];
    }
    else{
    	$cityID=0;
    }

    $this->widgetSchema['area']= new sfWidgetFormChoice(array(
  'choices' => Doctrine_Core::getTable('area')->getArea($cityID),
  'expanded' => false,
));
   /*
     $this->validatorSchema['area']=new sfValidatorChoice(array(
  'choices' => array_keys(Doctrine_Core::getTable('area')->getArea($cityID)),
));
   */

    $this->widgetSchema['web'] = new sfWidgetFormInputText();
    
    $this->widgetSchema['description'] =
      new sfWidgetFormTextareaTinyMCE(
      array(      
        'width'=>400,
        'height'=>350,
        'config'=>'skin : "o2k7" ,language : "ch" ',
        'theme'   =>  sfConfig::get('app_tinymce_theme','advanced'),

      ),
      array(
        'class'   =>  'tiny_mce'
      )
    );
    $js_path = sfConfig::get('sf_rich_text_js_dir') ? '/'.sfConfig::get('sf_rich_text_js_dir').'/tiny_mce.js' : '/js/tinymce/jscripts/tiny_mce/tiny_mce.js';
    sfContext::getInstance()->getResponse()->addJavascript($js_path);
    
  }
  
  public function __toString(){
  	return "";
  }
}
