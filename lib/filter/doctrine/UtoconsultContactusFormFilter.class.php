<?php

/**
 * UtoconsultContactus filter form.
 *
 * @package    uto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultContactusFormFilter extends BaseUtoconsultContactusFormFilter
{
  public function configure()
  {
  	$this->setValidators(array(
      'email'   => new sfValidatorEmail(array(), array('invalid' => '不合法的EMAIL'))
  	));
  }
}
