<?php
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';
/**
 * aboutus actions.
 *
 * @package    uto
 * @subpackage aboutus
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class aboutusActions extends sfActions
{
  public function preExecute(){
   siteActions::getUserInformation($this);
  }
  	
  public function executeIndex(sfWebRequest $request)
  {
    $this->utoconsult_aboutuss = Doctrine_Core::getTable('UtoconsultAboutus')
      ->createQuery('a')->limit(1)
      ->execute();
    $this->setLayout('layout_article');  
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UtoconsultAboutusForm();
  }
  
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UtoconsultAboutusForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
   
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($utoconsult_aboutus = Doctrine_Core::getTable('UtoconsultAboutus')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_aboutus does not exist (%s).', $request->getParameter('id')));
    $this->form = new UtoconsultAboutusForm($utoconsult_aboutus);
  }
  
  
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($utoconsult_aboutus = Doctrine_Core::getTable('UtoconsultAboutus')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_aboutus does not exist (%s).', $request->getParameter('id')));
    $this->form = new UtoconsultAboutusForm($utoconsult_aboutus);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
   
 
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($utoconsult_aboutus = Doctrine_Core::getTable('UtoconsultAboutus')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_aboutus does not exist (%s).', $request->getParameter('id')));
    $utoconsult_aboutus->delete();

    $this->redirect('aboutus/index');
  }
  
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $utoconsult_aboutus = $form->save();

      $this->redirect('aboutus/edit?id='.$utoconsult_aboutus->getId());
    }
  }
  
}
