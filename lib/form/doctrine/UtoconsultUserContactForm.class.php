<?php

/**
 * UtoconsultUserContact form.
 *
 * @package    utoconsult
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultUserContactForm extends BaseUtoconsultUserContactForm
{
  public function configure()
  {
  	unset(
      $this['created_at'], $this['updated_at']
    );
    
    $userId=sfContext::getInstance()->getUser()->getAttribute('user')->id;
    $this->widgetSchema['user_id']= new sfWidgetFormInputHidden();
    $this->validatorSchema['user_id']=new sfValidatorChoice(array('choices' => array($userId), 'empty_value' => $userId, 'required' => false));
    
  }
}
