

<?php

class LoginForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInput(), 
      'password' => new sfWidgetFormInputPassword() 
    ));

    $this->widgetSchema->setNameFormat('login[%s]');
    $this->widgetSchema->setLabels(array(
    'username'    => '用户名',
    'password'   => '密码',
   ));

    $this->setValidators(array(
      'username' => new sfValidatorString(array('required' => true)), 
      'password' => new sfValidatorString(array('required' => true))
    ));
  }
}


?>