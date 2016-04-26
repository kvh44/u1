<?php

/**
 * UtoconsultFile form base class.
 *
 * @method UtoconsultFile getObject() Returns the current form's model object
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultFileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'), 'add_empty' => false)),
      'category_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultFileCategory'), 'add_empty' => true)),
      'title'         => new sfWidgetFormInputText(),
      'keywords'      => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'file'          => new sfWidgetFormInputText(),
      'file_original' => new sfWidgetFormInputText(),
      'visitnumber'   => new sfWidgetFormInputText(),
      'image'         => new sfWidgetFormInputText(),
      'imageicon'     => new sfWidgetFormInputText(),
      'lang'          => new sfWidgetFormInputText(),
      'level'         => new sfWidgetFormInputText(),
      'isuto'         => new sfWidgetFormInputCheckbox(),
      'type'          => new sfWidgetFormInputText(),
      'isvalid'       => new sfWidgetFormInputCheckbox(),
      'isdeleted'     => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'slug'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'))),
      'category_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultFileCategory'), 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 255)),
      'keywords'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'file'          => new sfValidatorString(array('max_length' => 255)),
      'file_original' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'visitnumber'   => new sfValidatorInteger(array('required' => false)),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'imageicon'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lang'          => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'level'         => new sfValidatorInteger(array('required' => false)),
      'isuto'         => new sfValidatorBoolean(array('required' => false)),
      'type'          => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'isvalid'       => new sfValidatorBoolean(array('required' => false)),
      'isdeleted'     => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'UtoconsultFile', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('utoconsult_file[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultFile';
  }

}
