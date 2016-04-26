<?php
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';
/**
 * userprofilephoto actions.
 *
 * @package    utoconsult
 * @subpackage userprofilephoto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userprofilephotoActions extends sfActions
{
  public function preExecute(){
  	 siteActions::getUserInformation($this);
  }	
	
  public function executeIndex(sfWebRequest $request)
  {
  	if (is_numeric($request->getParameter('id'))){
  		$id=$request->getParameter('id');
  	}
  	else{
  		$user=UtoconsultUser::getUserByUsername($request->getParameter('id'));
  		$id=$user->getId();

  	}
  	  		
  	$this->userpp=Doctrine_Core::getTable('UtoconsultUserProfilePhoto')->findOneByuser_id($id);
  	
  	if(isset($this->user)){
  		if($this->user->getId() == $id){
  			//$this->redirect('/userprofilephoto/new');
  			
  			$this->form = new UtoconsultUserProfilePhotoForm();
  			if($this->userpp->id!=null){
  				$this->form = new UtoconsultUserProfilePhotoForm($this->userpp);
  				$this->form->setWidget('id', new sfWidgetFormInputHidden(array(), array('value' => $this->userpp->getId())));
                $this->form->setValidator('id', new sfValidatorPass());
  			}
            $this->form->setWidget('user_id', new sfWidgetFormInputHidden(array(), array('value' => $this->user->getId())));
            $this->form->setValidator('user_id', new sfValidatorPass());
  			
  		}
  	}
  	
  	$this->setLayout('layout_photo');

  	
  }

  public function executeNew(sfWebRequest $request)
  {
  	
  	if (!isset($this->user))
    $this->redirect('/user');
    
    $id= $this->user->getId();

    /*
    if ($request->getParameter('id'))
    if (is_numeric($request->getParameter('id'))){
    	$id=$request->getParameter('id');
  	}
  	else{
  		$user=UtoconsultUser::getUserByUsername($request->getParameter('id'));
  		$id=$user->getId();
  	}
  	*/
  	$this->userpp=Doctrine_Core::getTable('UtoconsultUserProfilePhoto')->findOneByuser_id($id);

  	
    	
      if ($this->userpp!=null) {
      	if($this->userpp->getUser_id() == $this->user->getId())
    	$this->redirect('/userprofilephoto/edit');
      }
    	
    $this->form = new UtoconsultUserProfilePhotoForm();
    
    $this->form->setWidget('user_id', new sfWidgetFormInputHidden(array(), array('value' => $this->user->getId())));
    $this->form->setValidator('user_id', new sfValidatorPass());
    
    $this->setLayout('layout_photo');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UtoconsultUserProfilePhotoForm();

    $this->form->setWidget('user_id', new sfWidgetFormInputHidden(array(), array('value' => $this->user->getId())));
    $this->form->setValidator('user_id', new sfValidatorPass());
    
    
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
    $this->setLayout('layout_photo');
  }

  public function executeEdit(sfWebRequest $request)
  {
  	if (!isset($this->user))
  	$this->redirect('/user');
  	
  	$this->userpp=Doctrine_Core::getTable('UtoconsultUserProfilePhoto')->findOneByuser_id($this->user->getId());
  	if ($this->userpp==null) {
  		$this->redirect('/userprofilephoto/new');
  	}
  	//var_dump(sfConfig::get('sf_upload_dir'));
  	$this->forward404Unless($utoconsult_user_profile_photo = $this->userpp);
    $this->form = new UtoconsultUserProfilePhotoForm($utoconsult_user_profile_photo);
    $this->form->setWidget('user_id', new sfWidgetFormInputHidden(array(), array('value' => $this->user->getId())));
    $this->form->setValidator('uer_id', new sfValidatorPass());
    
    $this->setLayout('layout_photo');
  }

  public function executeUpdate(sfWebRequest $request)
  {
  	if (!isset($this->user))
  	  $this->redirect('/user');
  	$utoconsult_user_profile_photo = Doctrine_Core::getTable('UtoconsultUserProfilePhoto')->findOneByuser_id($this->user->getId());
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($utoconsult_user_profile_photo);
    $this->form = new UtoconsultUserProfilePhotoForm($utoconsult_user_profile_photo);

    $this->form->setWidget('user_id', new sfWidgetFormInputHidden(array(), array('value' => $this->user->getId())));
    $this->form->setValidator('user_id', new sfValidatorPass()); 
    
    $this->processForm($request, $this->form);

    $this->setLayout('layout_photo');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $utoconsult_user_profile_photo = Doctrine_Core::getTable('UtoconsultUserProfilePhoto')->findOneByuser_id($this->user->getId()) ;
    $this->forward404Unless($utoconsult_user_profile_photo);
    
    /*
    if (file_exists('/uploads/userprofilephoto/'.$utoconsult_user_profile_photo->getPhoto()))
    unlink('/uploads/userprofilephoto/'.$utoconsult_user_profile_photo->getPhoto()); 
    if (file_exists('/uploads/userprofilephotothumbnail/'.$utoconsult_user_profile_photo->getPhotoicon()))
    unlink('/uploads/userprofilephotothumbnail/'.$utoconsult_user_profile_photo->getPhotoicon()); 
    */
    
    $utoconsult_user_profile_photo->delete();
     $this->getUser()->setAttribute('userprofilephoto',null);
    $this->redirect('/user/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  { 
  	
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
       
       $photo = $request->getFiles($form->getName());

       $filename = "_".date("YmdHis").rand(0, 999999).".jpg";
       $thumbnail = new sfThumbnail(50, 50);
       $thumbnail-> loadFile($photo['photo']['tmp_name']);
       $thumbnail->save('uploads/userprofilephotothumbnail/'.$filename, 'image/png');
      /* 
      $utoconsult_user_profile_photo = UtoconsultUserProfilePhoto::getUtoconsultUserProfilePhotoById($this->user->getId());
      if ($utoconsult_user_profile_photo && $utoconsult_user_profile_photo->getPhotoicon()){
        if (file_exists('/uploads/userprofilephotothumbnail/'.$utoconsult_user_profile_photo->getPhotoicon()))
      	unlink('/uploads/userprofilephotothumbnail/'.$utoconsult_user_profile_photo->getPhotoicon());
      }
      */
      $this->utoconsult_user_profile_photo = $form->save();
      
      
      $this->utoconsult_user_profile_photo->setPhotoicon($filename);
      $this->utoconsult_user_profile_photo->save();

      
      $this->getUser()->setAttribute('userprofilephoto',$this->utoconsult_user_profile_photo);
      
      $this->redirect('/user/index');
      
    }

    
  }
}
