<?php

/**
 * UtoconsultAboutus form.
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultAboutusForm extends BaseUtoconsultAboutusForm
{
  public function configure()
  {
  	unset(
      $this['created_at'], $this['updated_at'] 
    );
    
    
     $this->widgetSchema['content'] =
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
}
