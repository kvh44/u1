<?php

/**
 * UtoconsultMyArticle filter form base class.
 *
 * @package    uto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultMyArticleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category1_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory1'), 'add_empty' => true)),
      'category2_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory2'), 'add_empty' => true)),
      'keywords'       => new sfWidgetFormFilterInput(),
      'description'    => new sfWidgetFormFilterInput(),
      'title'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pdf'            => new sfWidgetFormFilterInput(),
      'keywords_en'    => new sfWidgetFormFilterInput(),
      'description_en' => new sfWidgetFormFilterInput(),
      'title_en'       => new sfWidgetFormFilterInput(),
      'content_en'     => new sfWidgetFormFilterInput(),
      'pdf_en'         => new sfWidgetFormFilterInput(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'), 'add_empty' => true)),
      'visitnumber'    => new sfWidgetFormFilterInput(),
      'comment'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'level'          => new sfWidgetFormChoice(array('choices' => array('' => '', 1 => '1', 2 => '2', 3 => '3'))),
      'isdeleted'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'isvalid'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'category1_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UtoconsultArticleCategory1'), 'column' => 'id')),
      'category2_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UtoconsultArticleCategory2'), 'column' => 'id')),
      'keywords'       => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'title'          => new sfValidatorPass(array('required' => false)),
      'content'        => new sfValidatorPass(array('required' => false)),
      'pdf'            => new sfValidatorPass(array('required' => false)),
      'keywords_en'    => new sfValidatorPass(array('required' => false)),
      'description_en' => new sfValidatorPass(array('required' => false)),
      'title_en'       => new sfValidatorPass(array('required' => false)),
      'content_en'     => new sfValidatorPass(array('required' => false)),
      'pdf_en'         => new sfValidatorPass(array('required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UtoconsultUser'), 'column' => 'id')),
      'visitnumber'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comment'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'level'          => new sfValidatorChoice(array('required' => false, 'choices' => array(1 => '1', 2 => '2', 3 => '3'))),
      'isdeleted'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'isvalid'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('utoconsult_my_article_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultMyArticle';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'category1_id'   => 'ForeignKey',
      'category2_id'   => 'ForeignKey',
      'keywords'       => 'Text',
      'description'    => 'Text',
      'title'          => 'Text',
      'content'        => 'Text',
      'pdf'            => 'Text',
      'keywords_en'    => 'Text',
      'description_en' => 'Text',
      'title_en'       => 'Text',
      'content_en'     => 'Text',
      'pdf_en'         => 'Text',
      'user_id'        => 'ForeignKey',
      'visitnumber'    => 'Number',
      'comment'        => 'Boolean',
      'level'          => 'Enum',
      'isdeleted'      => 'Boolean',
      'isvalid'        => 'Boolean',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'slug'           => 'Text',
    );
  }
}
