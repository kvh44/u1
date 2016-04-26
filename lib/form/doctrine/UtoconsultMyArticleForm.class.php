<?php

/**
 * UtoconsultMyArticle form.
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultMyArticleForm extends BaseUtoconsultMyArticleForm
{
  public function configure()
  {
  	
  	  unset($this['visitnumber'],$this['created_at'], $this['updated_at'],$this['slug']);
    
    $this->widgetSchema['category1_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory1'), 'add_empty' => '分类1'));
    
    $this->widgetSchema['category2_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory2'), 'add_empty' => '分类2'));
  	
    
    /*
  	  $this->widgetSchema['content'] =  new sfWidgetFormTextareaTinyMCE(
      array(
        'width'=>575,
        'height'=>400,
        'config'=>'skin : "o2k7",skin_variant : "silver",language : "ch"',
        'theme'   =>  sfConfig::get('app_tinymce_theme','advanced'),
        'plugins' => "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",

      ),
      array(
        'class'   =>  'tiny_mce'
      )
    );
    $js_path = '/js/tinymce/jscripts/tiny_mce/tiny_mce.js';
    sfContext::getInstance()->getResponse()->addJavascript($js_path);
    */
    // 
    
    $this->widgetSchema['keywords'] = new sfWidgetFormTextarea();
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
    
   
    if(sfContext::getInstance()->getUser('user')){
       //if (!$this->getObject()->get('id')) {
       	
       	  $userId=sfContext::getInstance()->getUser()->getAttribute('user')->id;
          $this->widgetSchema['user_id']= new sfWidgetFormInputHidden(array(), array('value' => $userId));
          $this->validatorSchema['user_id']=new sfValidatorChoice(array('choices' => array($userId), 'empty_value' => $userId, 'required' => false));
       	
      //}

       	
    }
    
  }
}
