<?php

/**
 * city filter form base class.
 *
 * @package    uto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasecityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cityID'   => new sfWidgetFormFilterInput(),
      'city'     => new sfWidgetFormFilterInput(),
      'fatherID' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cityID'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'city'     => new sfValidatorPass(array('required' => false)),
      'fatherID' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('city_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'city';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'cityID'   => 'Number',
      'city'     => 'Text',
      'fatherID' => 'Number',
    );
  }
}
