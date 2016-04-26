<?php 
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';

/**
 * file actions.
 *
 * @package    uto
 * @subpackage file
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fileActions extends sfActions
{
  public function preExecute(){
   ini_set('upload_max_filesize', '50M');	
   siteActions::getUserInformation($this);
  }	
	
  public function executeIndex(sfWebRequest $request)
  {
    $this->category = $request->getParameter('category');
  	
    $this->pager=new sfDoctrinePager('UtoconsultFile', 20);
    $this->pager->setQuery(UtoconsultFile::getFiles(null,$this->category));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
      
    $this->setLayout('layout_article');  
  }
  
  
  public function executeListhome(sfWebRequest $request){
  	$this->utoconsult_files = UtoconsultFile::getFiles()->limit(10)->execute();
  	$this->setLayout(false); 
  }
  
  public function executeListadmin(sfWebRequest $request){
       if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/file');
  	}

  	$this->pager=new sfDoctrinePager('UtoconsultFile', 20);
  	if($this->getUser()->getAttribute('user')->isAdmin){
          $this->pager->setQuery(UtoconsultFile::getFiles());
  	}
  	else{
  	  $this->pager->setQuery(UtoconsultFile::getFiles($this->getUser()->getAttribute('user')->getId()));	
  	}
       $this->pager->setPage($request->getParameter('page', 1));
       $this->pager->init();
    
       $this->setLayout('layout_article');
  }
  
  /*
  public function executeSingle(sfWebRequest $request)
  {
  	 $this->forward404Unless($this->utoconsult_file = Doctrine_Core::getTable('UtoconsultFile')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_file does not exist (%s).', $request->getParameter('id')));
  	 $this->setLayout('layout_file');
  }
  */
  public function executeSingle2(sfWebRequest $request)
  {
    if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/home/login');
    }
  	
  	
    $this->forward404Unless($this->utoconsult_file = Doctrine_Core::getTable('UtoconsultFile')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_file does not exist (%s).', $request->getParameter('id')));
    $this->setLayout('layout_file2');
  }
  
  
  

  public function executeNew(sfWebRequest $request)
  {
   if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/file');
   }
    $this->form = new UtoconsultFileForm();
    $this->form->setWidget('imageicon',new sfWidgetFormInputHidden());
    
    $this->form->setWidget('category_id', new sfWidgetFormDoctrineChoice(array('model' => 'UtoconsultFileCategory',
    		'add_empty' => '分类'
    )));
    
    $this->setLayout('layout_article');  

  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    
    if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/file');
  	}
    
    $this->form = new UtoconsultFileForm();
    $this->form->setWidget('imageicon',new sfWidgetFormInputHidden());
    
    $this->form->setWidget('category_id', new sfWidgetFormDoctrineChoice(array('model' => 'UtoconsultFileCategory',
    		'add_empty' => '分类'
    )));
    
    $this->processForm($request, $this->form);

    $this->setTemplate('new');
    $this->setLayout('layout_article');  
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($this->utoconsult_file = Doctrine_Core::getTable('UtoconsultFile')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_file does not exist (%s).', $request->getParameter('id')));
    
    if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/file');
  	}
  	
  	if($this->utoconsult_file->user_id != $this->getUser()->getAttribute('user')->getId()){
  		$this->redirect('/file');
  	}
    
    $this->form = new UtoconsultFileForm2($this->utoconsult_file);
    $this->form->setWidget('imageicon',new sfWidgetFormInputHidden());
    
    $this->form->setWidget('category_id', new sfWidgetFormDoctrineChoice(array('model' => 'UtoconsultFileCategory',
    		'add_empty' => '分类'
    )));
    
    $this->setLayout('layout_article');  
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->utoconsult_file = Doctrine_Core::getTable('UtoconsultFile')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_file does not exist (%s).', $request->getParameter('id')));
    
    if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/file');
  	}
  	
  	if($this->utoconsult_file->user_id != $this->getUser()->getAttribute('user')->getId()){
  		$this->redirect('/file');
  	}
    
    $this->form = new UtoconsultFileForm2($this->utoconsult_file);
    $this->form->setWidget('imageicon',new sfWidgetFormInputHidden());
    
    $this->form->setWidget('category_id', new sfWidgetFormDoctrineChoice(array('model' => 'UtoconsultFileCategory',
    		'add_empty' => '分类'
    )));
    
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
    $this->setLayout('layout_article');  
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($utoconsult_file = Doctrine_Core::getTable('UtoconsultFile')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_file does not exist (%s).', $request->getParameter('id')));
    
    if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/file');
  	}

  	if ($utoconsult_file->user_id !=$this->getUser()->getAttribute('user')->getId()){
  		$this->redirect('/file');
  	}
    
    
    $utoconsult_file->setIsdeleted(1);
    $utoconsult_file->save();
    
    $this->redirect('/file/listadmin');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $utoconsult_file = $form->save();
      if($request->getParameter('category_id'))
      {
      $utoconsult_file->setCategoryId($request->getParameter('category_id'));
      $utoconsult_file->save();
      }
      
      $files = $request->getFiles($form->getName());

      if($files['image']['tmp_name']!=null){

      	$sizeinformation=getimagesize($files['image']['tmp_name']);

      	$filename2 = "_".date("YmdHis").rand(0, 999999).".jpg";
        if ((int)$sizeinformation[0] > 150){
          $thumbnail2 = new sfThumbnail(150);
        }
        else{
          $thumbnail2 = new sfThumbnail((int)$sizeinformation[0]);	
        }
        $thumbnail2->loadFile($files['image']['tmp_name']);
        $thumbnail2->save('uploads/usersharedfileimageicon/'.$filename2, 'image/png'); 	

         if ($form->isNew()){	
           $utoconsult_file->setImageicon($filename2);
           $utoconsult_file->save();
         }
        


        

       }
       
       

      $this->redirect('/file/listadmin');
    }
    
    

  }
}
