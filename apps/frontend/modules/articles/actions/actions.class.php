<?php
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';
/**
 * article actions.
 *
 * @package    utoconsult
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class articlesActions extends sfActions
{


  public function preExecute(){
   siteActions::getUserInformation($this);
  }
  
  public function executeListhome(sfWebRequest $request){
  	$this->utoconsult_articles = UtoconsultMyArticle::getArticleByCategory2Max(null); 
  	$this->setLayout(false); 
  }
  
  public function executeListotherarticle(sfWebRequest $request){
  	$this->utoconsult_articles = UtoconsultMyArticle::getArticleByCategory2(null,null,$request->getParameter('article_id'))->limit(10)->execute();
  	$this->setLayout(false); 
  }

  
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager=new sfDoctrinePager('UtoconsultMyArticle', 10);
    $this->pager->setQuery(UtoconsultMyArticle::getArticleByCategory2($request->getParameter('category2'),$request->getParameter('category')));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    
    
    if ($request->getParameter('category2')) {
    	$this->category2_request=true;
    	$this->categorys=UtoconsultArticleCategory2::getCategorys($request->getParameter('category2'),null);
    	$this->categorys2 = UtoconsultArticleCategory2::getCategory2ByCategory1($this->categorys[0]['UtoconsultArticleCategory1']['id']);
    }
    else{
    	$this->category2_request=false;
    }
    
    if ($request->getParameter('category')) {
    	$this->category_request=true;
    	$this->categorys=UtoconsultArticleCategory2::getCategorys(null,$request->getParameter('category'));
    	
    	$this->categorys2 = UtoconsultArticleCategory2::getCategory2ByCategory1($request->getParameter('category'));
    }
    else{
    	$this->category_request=false;
    }
    if ($this->categorys)
    $this->getRequest()->setAttribute('categorys', $this->categorys);
    
    if ($this->categorys2)
    $this->getRequest()->setAttribute('categorys2', $this->categorys2);
    
    $this->setLayout('layout_category');
    
  }
  
  public function executeIndex2(sfWebRequest $request)
  {
  	var_dump($request->getParameter('category'));
  	$this->setLayout(false); 
  	sfView::NONE;
  }
  
  public function executeListadmin(sfWebRequest $request){
        if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/articles');
  	}
  	if(!$this->getUser()->getAttribute('user')->isAdmin){
  		$this->redirect('/articles');
  	}
  	
  	
  	$this->pager=new sfDoctrinePager('UtoconsultMyArticle', 10);
        $this->pager->setQuery(UtoconsultMyArticle::getArticleByCategory2($request->getParameter('category2')));
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    
        $this->setLayout('layout_article');
  }
  
  
  public function executeSingle(sfWebRequest $request)
  {
  	$this->setLayout('layout_article');
  	if ($request->getParameter('id')) {
        $this->article=UtoconsultMyArticle::getArticleById($request->getParameter('id'));
  	}
  	elseif ($request->getParameter('slug')){
        $this->article=UtoconsultMyArticle::getArticleBySlug($request->getParameter('slug'));
  	}
  	
  	$this->articleNext=UtoconsultMyArticle::getNextArticleById($request->getParameter('id'));

        $this->articlePrev=UtoconsultMyArticle::getPrevArticleById($request->getParameter('id'));
  	
  	$this->getRequest()->setAttribute('article', $this->article);
    
    if (!$this->article)
  	$this->forward('forward404', 'error');
  }
  

  

  public function executeNew(sfWebRequest $request)
  {
  	if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/articles');
  	}
  	if(!$this->getUser()->getAttribute('user')->isAdmin){
  		$this->redirect('/articles');
  	}
  	
    $this->form = new UtoconsultMyArticleForm();
    $this->setLayout('layout_article');
  }

  public function executeCreate(sfWebRequest $request)
  {
    if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/articles');
  	}
    if(!$this->getUser()->getAttribute('user')->isAdmin){
  		$this->redirect('/articles');
  	}
  	
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UtoconsultMyArticleForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
    $this->setLayout('layout_article');
  }

  public function executeEdit(sfWebRequest $request)
  {
   $this->setLayout('layout_article');	
   if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/articles');
  	}
   if(!$this->getUser()->getAttribute('user')->isAdmin){
  		$this->redirect('/articles');
  	}
  	
    $this->forward404Unless($this->utoconsult_article = Doctrine_Core::getTable('UtoconsultMyArticle')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_article does not exist (%s).', $request->getParameter('id')));
    
    $this->user=Doctrine::getTable('UtoconsultUser')->find($this->utoconsult_article->getUser_id());
    $this->form = new UtoconsultMyArticleForm($this->utoconsult_article);
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
  	$this->setLayout('layout_article');
    if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/articles');
  	}
    if(!$this->getUser()->getAttribute('user')->isAdmin){
  		$this->redirect('/articles');
  	}
  	
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($this->utoconsult_article = Doctrine_Core::getTable('UtoconsultMyArticle')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_article does not exist (%s).', $request->getParameter('id')));
    $this->user=Doctrine::getTable('UtoconsultUser')->find($this->utoconsult_article->getUser_id());
    $this->form = new UtoconsultMyArticleForm($this->utoconsult_article);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
    
  }

  public function executeDelete(sfWebRequest $request)
  {
   if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/articles');
  	}
   if(!$this->getUser()->getAttribute('user')->isAdmin){
  		$this->redirect('/articles');
  	}
    $request->checkCSRFProtection();

    $this->forward404Unless($utoconsult_article = Doctrine_Core::getTable('UtoconsultMyArticle')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_article does not exist (%s).', $request->getParameter('id')));
    //$utoconsult_article->setisdeleted(1);
    //$utoconsult_article->save();
    $utoconsult_article->delete();
    
    $this->redirect('/articles/listadmin');
  }
  
  public function executeEmail(sfWebRequest $request){
  	
  	$this->article=UtoconsultMyArticle::getArticleById($request->getParameter('article_id'));
  	
  	$title = $this->article->getTitle();
  	
  	$body = "<h2><a href='/articles/single/id/". $this->article->getId() ." .html'>". $this->article->getTitle() ."</a></h2>";
  	
  	if($this->article->getDescription())
  	$body .= $this->article->getDescription();
  	else 
  	$body .= mb_substr(strip_tags(htmlspecialchars_decode($this->article->getContent(),ENT_QUOTES)),0,200, 'utf-8').'...';
  	
  	
  	
  	$this->getResponse()->setContentType('application/json');
  	$message = $this->getMailer()->compose(
      array('utoconsult@163.com' => '优拓'),
      $request->getParameter('email'),
      '优拓推荐--'.$title,
      $body
    );
    $mailer = sfContext::getInstance()->getMailer();
    $mailer->send($message);
    return sfView::HEADER_ONLY;
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $utoconsult_article = $form->save();

      $this->redirect('/articles/listadmin'); //('/articles/edit?id='.$utoconsult_article->getId());
    }
  }
  
}
