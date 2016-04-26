<?php require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';

/**
 * category2 actions.
 *
 * @package    uto
 * @subpackage category2
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class category2Actions extends sfActions
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
    $this->utoconsult_article_category2s = Doctrine_Core::getTable('UtoconsultArticleCategory2')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UtoconsultArticleCategory2Form();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UtoconsultArticleCategory2Form();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($utoconsult_article_category2 = Doctrine_Core::getTable('UtoconsultArticleCategory2')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_article_category2 does not exist (%s).', $request->getParameter('id')));
    $this->form = new UtoconsultArticleCategory2Form($utoconsult_article_category2);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($utoconsult_article_category2 = Doctrine_Core::getTable('UtoconsultArticleCategory2')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_article_category2 does not exist (%s).', $request->getParameter('id')));
    $this->form = new UtoconsultArticleCategory2Form($utoconsult_article_category2);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $utoconsult_article_category2 = $form->save();

      $this->redirect('/category2');
    }
  }
}
