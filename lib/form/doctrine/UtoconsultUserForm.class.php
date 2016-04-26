<?php

/**
 * UtoconsultUser form.
 *
 * @package    utoconsult
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UtoconsultUserForm extends BaseUtoconsultUserForm
{
  public function configure()
  {
  	/*
  	unset(
      $this['created_at'], $this['updated_at'],
      $this['slug'],$this['level'],$this['moneytime'],$this['active']
    );
    */
    $this->useFields(array('username','password','email'));
    $this->validatorSchema['username']=new sfValidatorString(array('max_length' => 30,'min_length' => 2),array('required'=>'用户名不能为空','min_length'=>'用户名至少2位','max_length'=>'用户名至少2个字母'));
    $this->widgetSchema['password']= new sfWidgetFormInputPassword();
    $this->validatorSchema['password']=new sfValidatorString(array('min_length' => 4),array('required'=>'密码不能为空','min_length'=>'密码至少4位'));
    $this->widgetSchema['repassword']= new sfWidgetFormInputPassword();
    $this->validatorSchema['repassword']=new sfValidatorString(array('min_length' => 4),array('required'=>'密码不能为空','min_length'=>'密码至少4位'));
    $this->validatorSchema['email']=new sfValidatorEmail(array('max_length' => 255,'min_length' => 8),array('required' => ' EMAIL不能为空','invalid' => '请输入正确的EMAIL','min_length'=>'EMAIL至少8位'));
    $this->validatorSchema->setPostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'repassword',
                                             array(),
                                             array('invalid'=>'两次输入的密码不一样')));


  
                                   
  }
  
  public function __toString(){
  	return "";
  }
}
