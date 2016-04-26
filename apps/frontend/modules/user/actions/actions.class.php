<?php
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';
/**
 * user actions.
 *
 * @package    utoconsult
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
  public function preExecute(){  	
   siteActions::getUserInformation($this);
  }	
	
  public function executeIndex(sfWebRequest $request)
  {
        if ($request->getParameter('tab')) {
  		$this->tabid=$request->getParameter('tab');
  	}
  	else{
  		$this->tabid=0;
  	}
    
  	if($request->getParameter('id')){
  		$this->request_id=$request->getParameter('id');
  	}
  	elseif (isset($this->user)){
  		if ($this->user!=null)
  		$this->request_id=$this->user->getId();
  		
  	}
  	
 	
  	$this->form = new UtoconsultUserForm(); 
  	$this->setLayout('layout_article');
 	
  }
  


  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UtoconsultUserForm();
    
    if (isset($this->company)) {
    	$type='company';
    }
    else{
    	$type='user';
    }

    $this->form->setWidget('type', new sfWidgetFormInputHidden(array(), array('value' => $type)));
    $this->form->setValidator('type', new sfValidatorPass());

    $this->setLayout('layout_article');
  }

  public function executeCreate(sfWebRequest $request)
  {
  	
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    
    
    if (isset($this->company)) {
    	$type='company';
    }
    else{
    	$type='user';
    }

    

    $this->form = new UtoconsultUserForm();
    $this->form->setWidget('type', new sfWidgetFormInputHidden(array(), array('value' => $type)));
    $this->form->setValidator('type', new sfValidatorPass());
    $this->processForm($request, $this->form);
    
    $this->setTemplate('new');
    $this->setLayout('layout_article');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    /*
    $form->bind(array(
     'captcha'   => $request->getParameter('captcha'),
    ));
    */
    if ($form->isValid())
    {

       $utoconsult_user = $form->save();
       $this->getUser()->setAttribute('user',$utoconsult_user);
       $this->getUser()->setAuthenticated(true);
       $this->getUser()->addCredential('user');
      
      if (isset($this->company)) {
      	$this->company->user_id=$utoconsult_user->getId();
      	$company=UtoconsultCompany::addCompany($this->company);
      	$this->getUser()->setAttribute('company',$company);
        $this->redirect('/company/index/id/'.$company->id);
      }
      
      
      $this->redirect('/user/index/id/'.$utoconsult_user->getId());
    }
  }
  
  
  
public function executeLogin(sfWebRequest $request){

    $this->getUser()->clearCredentials();
    $this->getUser()->setAuthenticated(FALSE);
    
    
    
                
    if ($request->isMethod('get')) {
    
            }
        	/*
    	 * verify the get method
    	 */
        /*    
    	$this->loginform->bind($request->getParameter('login'));
        $this->username=$this->loginform['username']->getValue();
        $this->password=$this->loginform['password']->getValue();
        */
            
        $this->username=$this->getRequestParameter('username');
        $this->password=$this->getRequestParameter('password');    
         
            
            
      if (1)//($this->loginform->isValid()) 
      {
      	/*
      	 * valid the login form
      	 */
      	
      	    
        $this->user=UtoconsultUser::getUserByUsername($this->username);      
        
      

      	
      	
        if ($this->user) {
        	/*
        	 * if the username exists
        	 */
            
            if ($this->user->password==md5($this->password)) {
            	/*
            	 * verify the password
            	 */

            	$this->getUser()->setAttribute('user',$this->user);
                $this->getUser()->setAuthenticated(true);
                $this->getUser()->addCredential('user');
                sfContext::getInstance()->getResponse()->setCookie('userslug',$this->user->slug, time()+60*60*24*150, '/');
                /*
                if ($this->user->type=='company') {
                	$this->company=UtoconsultCompany::getCompanyByUserId($this->user->getId());
                    $this->getUser()->setAttribute('company',$this->company);
                    $this->redirect('/company/index/id/'.$this->company->id);
                }
                */
                 if ($request->isXmlHttpRequest()){
                	$output=array('state'=>'ok');
                	$this->getResponse()->setHttpHeader('Content-type', 'application/json');
                	echo  json_encode($output);
                    return sfView::HEADER_ONLY;
                 }	
                //$this->redirect('user/index');
                
            }
            else{
            	/*
            	 * wrong password
            	 */
            	if ($request->isXmlHttpRequest()){
                	$output=array('state'=>'error','loginerror'=>'密码错误');
                	$this->getResponse()->setHttpHeader('Content-type', 'application/json');
                	echo  json_encode($output);
                    return sfView::HEADER_ONLY;
                 }	
            	//$this->getUser()->setFlash('loginerror','wrong password');
            }
        }
        else{
        	/*
        	 * no such a username
        	 */ 
        	if ($request->isXmlHttpRequest()){
                	$output=array('state'=>'error','loginerror'=>'用户名不存在');
                	$this->getResponse()->setHttpHeader('Content-type', 'application/json');
                	echo  json_encode($output);
                    return sfView::HEADER_ONLY;
                 }	
        	//$this->getUser()->setFlash('loginerror','no such a username');
        }
        
      	
      }
        /*
         * if not. we go back to the index
         */
        $this->redirect('/home');
      
  	
    }
  
  
  public function executeLogout(){
  	$this->getUser()->clearCredentials();
    $this->getUser()->setAuthenticated(false);
    $this->getUser()->setAttribute('user',null);
    $this->getUser()->setAttribute('userprofilephoto',null);
    /*
    if ($this->getUser()->getAttribute('company')) {
    	$this->getUser()->setAttribute('company',null);
    }
    */
    sfContext::getInstance()->getResponse()->setCookie('userslug', '', time() - 3600, '/');
    $this->redirect('/home');
  	
  }

  
  
  
  
}
