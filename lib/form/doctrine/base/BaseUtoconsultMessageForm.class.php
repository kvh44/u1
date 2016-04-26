<?php

/**
 * UtoconsultMessage form base class.
 *
 * @method UtoconsultMessage getObject() Returns the current form's model object
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'email'      => new sfWidgetFormInputText(),
      'fromid'     => new sfWidgetFormInputText(),
      'toid'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'), 'add_empty' => false)),
      'content'    => new sfWidgetFormTextarea(),
      'isread'     => new sfWidgetFormInputCheckbox(),
      'isdeleted'  => new sfWidgetFormInputCheckbox(),
      'isvalid'    => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 255)),
      'fromid'     => new sfValidatorInteger(),
      'toid'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'))),
      'content'    => new sfValidatorString(),
      'isread'     => new sfValidatorBoolean(array('required' => false)),
      'isdeleted'  => new sfValidatorBoolean(array('required' => false)),
      'isvalid'    => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('utoconsult_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultMessage';
  }

}
