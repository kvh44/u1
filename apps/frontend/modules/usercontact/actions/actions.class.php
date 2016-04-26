<?php
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';
/**
 * usercontact actions.
 *
 * @package    utoconsult
 * @subpackage usercontact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usercontactActions extends sfActions
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
  		$this->usercontact=UtoconsultUserContact::getUtoconsultUserContactById($this->request_id);
  		}
  		else{ 
        $this->usercontact=UtoconsultUserContact::getUtoconsultUserContactByUsername($this->request_id);
  		}
  		
  		
  		if (!$this->usercontact) {
  			
  		       if (isset($this->user)) { 
  		        	if ($this->request_id == $this->user->getUsername() || $this->request_id==$this->user->getId()) {
  		        		$this->nousercontact= true;
  		        	}
        	    }
        	 
        	echo "无联络方式";
        }
  	}
  	/*
  	 * if the user doesn't want to visit others'page
  	 */
  	else {
  	  /* visit his or her own profil  */	
  	  if (isset($this->user)) { /*  if the user session exists     */
  		if ($this->user!=null) {

           $this->usercontact=UtoconsultUserContact::getUtoconsultUserContactById($this->user->getId());
  		   if ($this->usercontact==null) {
  		   	  $this->nousercontact = true;
              $this->redirect('/usercontact/new');
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
  		  $this->usercontact= UtoconsultUserContact::getUtoconsultUserContactById($this->user->getId());
           if ($this->usercontact!=null) {
           	$this->redirect('/usercontact/edit');
           }  	
  		}
  	}

    $this->form = new UtoconsultUserContactForm();
    $this->form->setWidget('user_id', new sfWidgetFormInputHidden(array(), array('value' => $this->user->getId())));
    $this->form->setValidator('user_id', new sfValidatorPass());
    
    $this->setLayout('layout_photo');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UtoconsultUserContactForm();

    $this->processForm($request, $this->form);

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
  			
           $this->usercontact=UtoconsultUserContact::getUtoconsultUserContactById($this->user->getId());
           if ($this->usercontact==null) {
           	$this->redirect('/usercontact/new');
           }  	
          $this->forward404Unless($utoconsult_user_contact = Doctrine_Core::getTable('UtoconsultUserContact')->find(array($this->usercontact->getId())), sprintf('Object utoconsult_user_contact does not exist (%s).', $request->getParameter('id')));
          $this->form = new UtoconsultUserContactForm($utoconsult_user_contact);
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
  			$this->usercontact=UtoconsultUserContact::getUtoconsultUserContactById($this->user->getId());
            if ($this->usercontact==null) {
             	$this->redirect('/usercontact/new');
            }  	
  			$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
            $this->forward404Unless($utoconsult_user_contact = Doctrine_Core::getTable('UtoconsultUserContact')->find(array($this->usercontact->getId())), sprintf('Object utoconsult_user_contact does not exist (%s).', $request->getParameter('id')));
            $this->form = new UtoconsultUserContactForm($utoconsult_user_contact);

            $this->processForm($request, $this->form);

            $this->setTemplate('edit');
  		}
  		
  	}
  	
  	$this->setLayout('layout_photo');
  	
  	
  	

  }
/*
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($utoconsult_user_contact = Doctrine_Core::getTable('UtoconsultUserContact')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_user_contact does not exist (%s).', $request->getParameter('id')));
    $utoconsult_user_contact->delete();

    $this->redirect('usercontact/index');
  }
*/
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $utoconsult_user_contact = $form->save();

      $this->redirect('/user/index/tab/1');
    }
    else{
    	$this->getUser()->setFlash('notice',"保存失败");
    }
  }
}
