<?php

/**
 * annoncement actions.
 *
 * @package    uto
 * @subpackage annoncement
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class annoncementActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->utoconsult_annoncements = Doctrine_Core::getTable('UtoconsultAnnoncement')
      ->createQuery('a')->limit(1)
      ->execute();
      if ($request->isXmlHttpRequest()){
      	$this->getResponse()->setHttpHeader('Content-type', 'application/json');
      	$output= array('content'=>$this->utoconsult_annoncements[0]['content'],'updated_at'=>date('Y年m月d日',strtotime($this->utoconsult_annoncements[0]['updated_at'])));
      	echo  json_encode($output);
        return sfView::HEADER_ONLY;
      }
      else{
      	die();
      }  
  }
 /*
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UtoconsultAnnoncementForm();
  }
 */
  /*
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UtoconsultAnnoncementForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
 */
  /*
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($utoconsult_annoncement = Doctrine_Core::getTable('UtoconsultAnnoncement')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_annoncement does not exist (%s).', $request->getParameter('id')));
    $this->form = new UtoconsultAnnoncementForm($utoconsult_annoncement);
  }
  */
  /*
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($utoconsult_annoncement = Doctrine_Core::getTable('UtoconsultAnnoncement')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_annoncement does not exist (%s).', $request->getParameter('id')));
    $this->form = new UtoconsultAnnoncementForm($utoconsult_annoncement);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  */
  /*
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($utoconsult_annoncement = Doctrine_Core::getTable('UtoconsultAnnoncement')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_annoncement does not exist (%s).', $request->getParameter('id')));
    $utoconsult_annoncement->delete();

    $this->redirect('annoncement/index');
  }
  */
  /*
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $utoconsult_annoncement = $form->save();

      $this->redirect('annoncement/edit?id='.$utoconsult_annoncement->getId());
    }
  }
  */
}
