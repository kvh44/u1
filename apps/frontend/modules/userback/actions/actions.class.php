<?php require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';

/**
 * userback actions.
 *
 * @package    uto
 * @subpackage userback
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userbackActions extends sfActions
{
  public function preExecute(){
  	 siteActions::getUserInformation($this);
         if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/');
  	}
  	if(!$this->getUser()->getAttribute('user')->isAdmin){
  		$this->redirect('/');
  	}
  }     
    
  public function executeIndex(sfWebRequest $request)
  {
    $this->utoconsult_users = Doctrine_Core::getTable('UtoconsultUser')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UtoconsultUserForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UtoconsultUserForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($utoconsult_user = Doctrine_Core::getTable('UtoconsultUser')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_user does not exist (%s).', $request->getParameter('id')));
    $this->form = new UtoconsultUserForm($utoconsult_user);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($utoconsult_user = Doctrine_Core::getTable('UtoconsultUser')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_user does not exist (%s).', $request->getParameter('id')));
    $this->form = new UtoconsultUserForm($utoconsult_user);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $utoconsult_user = $form->save();

      $this->redirect('/userback');
    }
  }
}
