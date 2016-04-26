<?php

/**
 * area filter form base class.
 *
 * @package    uto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseareaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'areaID'   => new sfWidgetFormFilterInput(),
      'area'     => new sfWidgetFormFilterInput(),
      'fatherID' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'areaID'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'area'     => new sfValidatorPass(array('required' => false)),
      'fatherID' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('area_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'area';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'areaID'   => 'Number',
      'area'     => 'Text',
      'fatherID' => 'Number',
    );
  }
}
