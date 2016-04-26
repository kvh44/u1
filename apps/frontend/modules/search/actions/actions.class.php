<?php
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';
/**
 * search actions.
 *
 * @package    uto
 * @subpackage search
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
	
	
  public function preExecute(){
   siteActions::getUserInformation($this);
  }	
  
  public function executeIndex(sfWebRequest $request)
  {

     $this->setLayout('layout');
     $this->forwardUnless($this->query = $request->getParameter('query'), 'home', 'index');
     $this->articles = Doctrine_Core::getTable('UtoconsultMyArticle')->getForLuceneQuery($this->query);
     $this->total=count($this->articles);
         
  }
  
  
   public function executeSearchautocomplete(sfWebRequest $request){
  	$this->getResponse()->setContentType('application/json');
  	$string = $request->getParameter('q');
  	$limit = 10;
  	
  	$this->articles = Doctrine_Core::getTable('UtoconsultMyArticle')->getForLuceneQueryAutocomplete($string);
  	
  	$results = array();

  	foreach ($this->articles as $article){
  		$results[] = array('title'=>$article->title,'id'=>$article->article_cn_pk);
  	}
  	
  	echo json_encode($results);
    return sfView::HEADER_ONLY;
  }
  
  
  
  
  
}
