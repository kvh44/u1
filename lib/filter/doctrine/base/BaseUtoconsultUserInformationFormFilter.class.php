<?php

/**
 * UtoconsultUserInformation filter form base class.
 *
 * @package    uto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultUserInformationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'), 'add_empty' => true)),
      'realname'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'web'         => new sfWidgetFormFilterInput(),
      'special'     => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'country'     => new sfWidgetFormFilterInput(),
      'province'    => new sfWidgetFormFilterInput(),
      'city'        => new sfWidgetFormFilterInput(),
      'area'        => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UtoconsultUser'), 'column' => 'id')),
      'realname'    => new sfValidatorPass(array('required' => false)),
      'web'         => new sfValidatorPass(array('required' => false)),
      'special'     => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'country'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'province'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'city'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'area'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('utoconsult_user_information_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultUserInformation';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'user_id'     => 'ForeignKey',
      'realname'    => 'Text',
      'web'         => 'Text',
      'special'     => 'Text',
      'description' => 'Text',
      'country'     => 'Number',
      'province'    => 'Number',
      'city'        => 'Number',
      'area'        => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
