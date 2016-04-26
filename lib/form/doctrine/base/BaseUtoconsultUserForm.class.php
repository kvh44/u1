<?php

/**
 * UtoconsultUser form base class.
 *
 * @method UtoconsultUser getObject() Returns the current form's model object
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'username'   => new sfWidgetFormInputText(),
      'password'   => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'type'       => new sfWidgetFormChoice(array('choices' => array('user' => 'user', 'company' => 'company'))),
      'level'      => new sfWidgetFormInputText(),
      'isAdmin'    => new sfWidgetFormInputCheckbox(),
      'active'     => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'slug'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'   => new sfValidatorString(array('max_length' => 30)),
      'password'   => new sfValidatorString(array('max_length' => 255)),
      'email'      => new sfValidatorString(array('max_length' => 255)),
      'type'       => new sfValidatorChoice(array('choices' => array(0 => 'user', 1 => 'company'))),
      'level'      => new sfValidatorInteger(array('required' => false)),
      'isAdmin'    => new sfValidatorBoolean(array('required' => false)),
      'active'     => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'UtoconsultUser', 'column' => array('username'))),
        new sfValidatorDoctrineUnique(array('model' => 'UtoconsultUser', 'column' => array('email'))),
        new sfValidatorDoctrineUnique(array('model' => 'UtoconsultUser', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('utoconsult_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultUser';
  }

}
