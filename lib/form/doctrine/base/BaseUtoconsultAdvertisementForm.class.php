<?php

/**
 * UtoconsultAdvertisement form base class.
 *
 * @method UtoconsultAdvertisement getObject() Returns the current form's model object
 *
 * @package    uto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUtoconsultAdvertisementForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'), 'add_empty' => false)),
      'title'       => new sfWidgetFormInputText(),
      'content'     => new sfWidgetFormTextarea(),
      'link'        => new sfWidgetFormTextarea(),
      'photo'       => new sfWidgetFormInputText(),
      'photoicon'   => new sfWidgetFormInputText(),
      'visitnumber' => new sfWidgetFormInputText(),
      'isdeleted'   => new sfWidgetFormInputCheckbox(),
      'isvalid'     => new sfWidgetFormInputCheckbox(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
      'slug'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UtoconsultUser'))),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'content'     => new sfValidatorString(array('max_length' => 4000)),
      'link'        => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'photo'       => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'photoicon'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'visitnumber' => new sfValidatorInteger(array('required' => false)),
      'isdeleted'   => new sfValidatorBoolean(array('required' => false)),
      'isvalid'     => new sfValidatorBoolean(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
      'slug'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'UtoconsultAdvertisement', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('utoconsult_advertisement[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UtoconsultAdvertisement';
  }

}
