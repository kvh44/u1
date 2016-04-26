<?php

/**
 * UtoconsultArticleCategory1 form.
 *
 * @package    utoconsult
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultArticleCategory1Form extends BaseUtoconsultArticleCategory1Form
{
  public function configure()
  {
      unset(
        $this['created_at'], $this['updated_at']
      );
      
      $this->setWidget('photo1', new sfWidgetFormInputFile());
      $this->setValidator('photo1', new sfValidatorFile(array(
           'required'   => true,
           'path'       => 'uploads'.DIRECTORY_SEPARATOR.'category1photo1', 
           'mime_types' => 'web_images',
    )));
  }
}
