<?php

/**
 * area form base class.
 *
 * @method area getObject() Returns the current form's model object
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseareaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'areaID'   => new sfWidgetFormInputText(),
      'area'     => new sfWidgetFormInputText(),
      'fatherID' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'areaID'   => new sfValidatorInteger(array('required' => false)),
      'area'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fatherID' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('area[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'area';
  }

}
