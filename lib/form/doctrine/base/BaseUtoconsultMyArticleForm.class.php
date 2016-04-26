<?php

/**
 * UtoconsultMyArticle form base class.
 *
 * @method UtoconsultMyArticle getObject() Returns the current form's model object
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultMyArticleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'category1_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory1'), 'add_empty' => false)),
      'category2_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory2'), 'add_empty' => false)),
      'keywords'       => new sfWidgetFormInputText(),
      'description'    => new sfWidgetFormTextarea(),
      'title'          => new sfWidgetFormInputText(),
      'content'        => new sfWidgetFormTextarea(),
      'pdf'            => new sfWidgetFormInputText(),
      'keywords_en'    => new sfWidgetFormInputText(),
      'description_en' => new sfWidgetFormTextarea(),
      'title_en'       => new sfWidgetFormInputText(),
      'content_en'     => new sfWidgetFormTextarea(),
      'pdf_en'         => new sfWidgetFormInputText(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'), 'add_empty' => false)),
      'visitnumber'    => new sfWidgetFormInputText(),
      'comment'        => new sfWidgetFormInputCheckbox(),
      'level'          => new sfWidgetFormChoice(array('choices' => array(1 => '1', 2 => '2', 3 => '3'))),
      'isdeleted'      => new sfWidgetFormInputCheckbox(),
      'isvalid'        => new sfWidgetFormInputCheckbox(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'slug'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category1_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory1'))),
      'category2_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultArticleCategory2'))),
      'keywords'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'    => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'title'          => new sfValidatorString(array('max_length' => 255)),
      'content'        => new sfValidatorString(),
      'pdf'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'keywords_en'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description_en' => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'title_en'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content_en'     => new sfValidatorString(array('required' => false)),
      'pdf_en'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'))),
      'visitnumber'    => new sfValidatorInteger(array('required' => false)),
      'comment'        => new sfValidatorBoolean(array('required' => false)),
      'level'          => new sfValidatorChoice(array('choices' => array(0 => '1', 1 => '2', 2 => '3'))),
      'isdeleted'      => new sfValidatorBoolean(array('required' => false)),
      'isvalid'        => new sfValidatorBoolean(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
      'slug'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'UtoconsultMyArticle', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('utoconsult_my_article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultMyArticle';
  }

}
