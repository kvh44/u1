<?php
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';
/**
 * userinfo actions.
 *
 * @package    utoconsult
 * @subpackage userinfo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userinfoActions extends sfActions
{
  public function preExecute(){
  	 siteActions::getUserInformation($this);
  }		
  
  public function executeIndex(sfWebRequest $request)
  { 
  	
  	/*
  	 * verify if the user wants to visit others'page
  	 */
  	if($request->getParameter('id')){
  		/* visit a user's profil page */

  		$this->request_id=$request->getParameter('id');
  		if (is_numeric($this->request_id)){
  		$this->userinfo=UtoconsultUserInformation::getUtoconsultUserInformationById($this->request_id);
  		}
  		else {
        $this->userinfo=UtoconsultUserInformation::getUtoconsultUserInformationByUsername($this->request_id);	
        }
  		
  		if (!$this->userinfo) {
        	
        	   if (isset($this->user)) { 
  		           if ($this->user!=null) {
  		        	if ($this->request_id == $this->user->getUsername() || $this->request_id==$this->user->getId()) {
  		        		//echo $this->request_id;
  		        		//echo $this->user->getId();
  		        		$this->nouserinfo= true;
  		        	}
  		           }
        	    }
        	    echo "无个人信息";
        }
        
  	}
  	/*
  	 * if the user doesn't want to visit others'page
  	 */
  	else {
  	  /* visit his or her own profil  */	
  	  if (isset($this->user)) { /*  if the user session exists     */
  		if ($this->user!=null) {

           $this->userinfo=UtoconsultUserInformation::getUtoconsultUserInformationById($this->user->getId());
           
           if ($this->userinfo==null) {     	
  		      $this->nouserinfo = true;
              $this->redirect('/userinfo/new');
  		   }

  		   	
  		   
  		}
  	    else {
  		   	$this->redirect('/user/index');
  		}
  		

  	  }
  	  else{
  		$this->redirect('/user/index');
  	  }
  		
  		
  	}
  	
  	if ($this->userinfo!=null){
  	$this->userinfo->country="中国";
  	
    $provinceArray=province::getProvinceById($this->userinfo->province);
    $this->userinfo->province=$provinceArray['province'];
    
    $cityArray=city::getCityById($this->userinfo->city);
    $this->userinfo->city=$cityArray['city'];
    
    $areaArray=area::getAreaById($this->userinfo->area);
    $this->userinfo->area=$areaArray['area'];
  	}
  	$this->form = new UtoconsultUserForm();

  }

  public function executeNew(sfWebRequest $request)
  {
  	
  	if (!isset($this->user)) {
       $this->redirect('/user/index');
  	}
  	else {
  	   if ($this->user==null) {
          $this->redirect('/user/index');
  		}
  		else{
  		  $this->userinfo= UtoconsultUserInformation::getUtoconsultUserInformationById($this->user->getId());
           if ($this->userinfo!=null) {
           	$this->redirect('/userinfo/edit?id='.$this->userinfo->getId());
           }  	
  		}
  	}
  	
    
    $this->form = new UtoconsultUserInformationForm();
    $this->form->setWidget('user_id', new sfWidgetFormInputHidden(array(), array('value' => $this->user->getId())));
    $this->form->setValidator('user_id', new sfValidatorPass());

    
    $this->setLayout('layout_photo');
  }

  public function executeCreate(sfWebRequest $request)
  {
    
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $this->form = new UtoconsultUserInformationForm();
    $this->form->setWidget('user_id', new sfWidgetFormInputHidden(array(), array('value' => $this->user->getId())));
    $result=$this->processForm($request, $this->form);
   
    if($request['utoconsult_user_information']['province'])
            	$this->form->setWidget('city',new sfWidgetFormChoice(array(
  'choices' => Doctrine_Core::getTable('city')->getCity((int)$request['utoconsult_user_information']['province']),
  'expanded' => false,
)));
            
            
            
            
            
            if($request['utoconsult_user_information']['city'])
            $this->form->setWidget('area', new sfWidgetFormChoice(array(
  'choices' => Doctrine_Core::getTable('area')->getArea((int)$request['utoconsult_user_information']['city']),
  'expanded' => false,
)));
    $this->setTemplate('new');
    
    $this->setLayout('layout_photo');
  }

  public function executeEdit(sfWebRequest $request)
  {
  	
  	if (!isset($this->user)) {
  		$this->redirect('/user/index');
  		
  	}
  	else{
  		if ($this->user==null) {
  			$this->redirect('/user/index');
  		}
  		else{
  			
           $this->userinfo=UtoconsultUserInformation::getUtoconsultUserInformationById($this->user->getId());
           if ($this->userinfo==null) {
           	$this->redirect('/userinfo/new');
           }  	
          $this->forward404Unless($utoconsult_user_information = Doctrine_Core::getTable('UtoconsultUserInformation')->find(array($this->userinfo->getId())), sprintf('Object utoconsult_user_information does not exist (%s).', $request->getParameter('id')));
          $this->form = new UtoconsultUserInformationForm($utoconsult_user_information);
          $this->form->setWidget('user_id', new sfWidgetFormInputHidden(array(), array('value' => $this->user->getId())));
          $this->form->setValidator('user_id', new sfValidatorPass());
  		}
  	}
  	
  	$this->setLayout('layout_photo');
  }

  public function executeUpdate(sfWebRequest $request)
  {

  	if (!isset($this->user)) {
  		$this->redirect('/user/index');
  	}
  	else{
  		if ($this->user==null) {
  			$this->redirect('/user/index');
  		}
  		else{
  			$this->userinfo=UtoconsultUserInformation::getUtoconsultUserInformationById($this->user->getId());
            if ($this->userinfo==null) {
             	$this->redirect('/userinfo/new');
            }  	
  			$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
            $this->forward404Unless($utoconsult_user_information = Doctrine_Core::getTable('UtoconsultUserInformation')->find(array($this->userinfo->getId())), sprintf('Object utoconsult_user_information does not exist (%s).', $request->getParameter('id')));
            $this->form = new UtoconsultUserInformationForm($utoconsult_user_information);
            $result=$this->processForm($request, $this->form);
            

           
            if($request['utoconsult_user_information']['province'])
            	$this->form->setWidget('city',new sfWidgetFormChoice(array(
  'choices' => Doctrine_Core::getTable('city')->getCity((int)$request['utoconsult_user_information']['province']),
  'expanded' => false,
)));
            
            
            
            
            
            if($request['utoconsult_user_information']['city'])
            $this->form->setWidget('area', new sfWidgetFormChoice(array(
  'choices' => Doctrine_Core::getTable('area')->getArea((int)$request['utoconsult_user_information']['city']),
  'expanded' => false,
)));
             
            
            $this->setTemplate('edit');
  		}
  		
  	}

    
    $this->setLayout('layout_photo');
  }

  
  /*
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($utoconsult_user_information = Doctrine_Core::getTable('UtoconsultUserInformation')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_user_information does not exist (%s).', $request->getParameter('id')));
    $utoconsult_user_information->delete();

    $this->redirect('userinfo/index');
  }
  
  */

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    
    if ($form->isValid())
    {
      $utoconsult_user_information=$form->save();
       $this->redirect('/user/index/tab/0');

    }
    
  }
}
