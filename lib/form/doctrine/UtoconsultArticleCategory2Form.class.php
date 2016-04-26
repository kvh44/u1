<?php

/**
 * UtoconsultArticleCategory2 form.
 *
 * @package    utoconsult
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultArticleCategory2Form extends BaseUtoconsultArticleCategory2Form
{
  public function configure()
  {
  	unset(
      $this['created_at'], $this['updated_at']
      );
      
    $this->widgetSchema['category1_id']= new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory1'), 'add_empty' => false));
    $this->validatorSchema['category1_id']=new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory1')));  
  }
}
