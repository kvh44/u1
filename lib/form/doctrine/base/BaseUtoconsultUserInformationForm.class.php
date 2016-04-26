<?php

/**
 * UtoconsultUserInformation form base class.
 *
 * @method UtoconsultUserInformation getObject() Returns the current form's model object
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultUserInformationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'), 'add_empty' => false)),
      'realname'    => new sfWidgetFormInputText(),
      'web'         => new sfWidgetFormTextarea(),
      'special'     => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'country'     => new sfWidgetFormInputText(),
      'province'    => new sfWidgetFormInputText(),
      'city'        => new sfWidgetFormInputText(),
      'area'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'))),
      'realname'    => new sfValidatorString(array('max_length' => 30)),
      'web'         => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'special'     => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
      'country'     => new sfValidatorInteger(array('required' => false)),
      'province'    => new sfValidatorInteger(array('required' => false)),
      'city'        => new sfValidatorInteger(array('required' => false)),
      'area'        => new sfValidatorInteger(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'UtoconsultUserInformation', 'column' => array('user_id')))
    );

    $this->widgetSchema->setNameFormat('utoconsult_user_information[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultUserInformation';
  }

}
