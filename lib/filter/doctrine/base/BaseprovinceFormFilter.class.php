<?php

/**
 * province filter form base class.
 *
 * @package    uto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseprovinceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'provinceID' => new sfWidgetFormFilterInput(),
      'province'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'provinceID' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'province'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('province_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'province';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'provinceID' => 'Number',
      'province'   => 'Text',
    );
  }
}
