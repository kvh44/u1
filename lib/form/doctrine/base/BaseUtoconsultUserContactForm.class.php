<?php

/**
 * UtoconsultUserContact form base class.
 *
 * @method UtoconsultUserContact getObject() Returns the current form's model object
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultUserContactForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'), 'add_empty' => false)),
      'mobile'     => new sfWidgetFormInputText(),
      'fix'        => new sfWidgetFormInputText(),
      'fix2'       => new sfWidgetFormInputText(),
      'qq'         => new sfWidgetFormInputText(),
      'msn'        => new sfWidgetFormInputText(),
      'skype'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'))),
      'mobile'     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'fix'        => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'fix2'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'qq'         => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'msn'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'skype'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'UtoconsultUserContact', 'column' => array('user_id')))
    );

    $this->widgetSchema->setNameFormat('utoconsult_user_contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultUserContact';
  }

}
