<?php

/**
 * UtoconsultArticleCategory2 form base class.
 *
 * @method UtoconsultArticleCategory2 getObject() Returns the current form's model object
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultArticleCategory2Form extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'category1_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory1'), 'add_empty' => false)),
      'orders'       => new sfWidgetFormInputText(),
      'name'         => new sfWidgetFormInputText(),
      'keywords'     => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category1_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory1'))),
      'orders'       => new sfValidatorInteger(array('required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 15)),
      'keywords'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'UtoconsultArticleCategory2', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('utoconsult_article_category2[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultArticleCategory2';
  }

}
