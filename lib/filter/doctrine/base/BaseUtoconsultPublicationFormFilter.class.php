<?php

/**
 * UtoconsultPublication filter form base class.
 *
 * @package    uto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultPublicationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'), 'add_empty' => true)),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultFileCategory'), 'add_empty' => true)),
      'title'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'keywords'    => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'binaryData'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'filename'    => new sfWidgetFormFilterInput(),
      'size'        => new sfWidgetFormFilterInput(),
      'mime'        => new sfWidgetFormFilterInput(),
      'visitnumber' => new sfWidgetFormFilterInput(),
      'image'       => new sfWidgetFormFilterInput(),
      'imageicon'   => new sfWidgetFormFilterInput(),
      'lang'        => new sfWidgetFormFilterInput(),
      'level'       => new sfWidgetFormFilterInput(),
      'isuto'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'type'        => new sfWidgetFormFilterInput(),
      'isvalid'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'isdeleted'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UtoconsultUser'), 'column' => 'id')),
      'category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UtoconsultFileCategory'), 'column' => 'id')),
      'title'       => new sfValidatorPass(array('required' => false)),
      'keywords'    => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'binaryData'  => new sfValidatorPass(array('required' => false)),
      'filename'    => new sfValidatorPass(array('required' => false)),
      'size'        => new sfValidatorPass(array('required' => false)),
      'mime'        => new sfValidatorPass(array('required' => false)),
      'visitnumber' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'image'       => new sfValidatorPass(array('required' => false)),
      'imageicon'   => new sfValidatorPass(array('required' => false)),
      'lang'        => new sfValidatorPass(array('required' => false)),
      'level'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'isuto'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'type'        => new sfValidatorPass(array('required' => false)),
      'isvalid'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'isdeleted'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('utoconsult_publication_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultPublication';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'user_id'     => 'ForeignKey',
      'category_id' => 'ForeignKey',
      'title'       => 'Text',
      'keywords'    => 'Text',
      'description' => 'Text',
      'binaryData'  => 'Text',
      'filename'    => 'Text',
      'size'        => 'Text',
      'mime'        => 'Text',
      'visitnumber' => 'Number',
      'image'       => 'Text',
      'imageicon'   => 'Text',
      'lang'        => 'Text',
      'level'       => 'Number',
      'isuto'       => 'Boolean',
      'type'        => 'Text',
      'isvalid'     => 'Boolean',
      'isdeleted'   => 'Boolean',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
      'slug'        => 'Text',
    );
  }
}
