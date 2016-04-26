<?php
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';
/**
 * home actions.
 *
 * @package    uto
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
  public function preExecute(){
   siteActions::getUserInformation($this);
  }

  
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	     //$this->utoconsult_articles = UtoconsultMyArticle::getArticleByCategory2Max(null,null);

             $this->utoconsult_articles_1 = UtoconsultMyArticle::getArticleByCategory2Max(null,1);
             $this->utoconsult_articles_2 = UtoconsultMyArticle::getArticleByCategory2Max(null,2);
             $this->utoconsult_articles_3 = UtoconsultMyArticle::getArticleByCategory2Max(null,3);
             $this->utoconsult_articles_4 = UtoconsultMyArticle::getArticleByCategory2Max(null,4);
             $this->utoconsult_articles_5 = UtoconsultMyArticle::getArticleByCategory2Max(null,5);
             $this->utoconsult_articles_6 = UtoconsultMyArticle::getArticleByCategory2Max(null,6);
             $this->utoconsult_articles_7 = UtoconsultMyArticle::getArticleByCategory2Max(null,7);
             
             $this->utoconsult_article_category1s = Doctrine_Core::getTable('UtoconsultArticleCategory1')
             ->createQuery('a')
             ->execute();
             
  	     $this->utoconsult_files = UtoconsultFile::getFiles()->limit(10)->execute();
  	     $this->setLayout('layout_home');
  }

  public function executeLogin(sfWebRequest $request){
  	     $this->setLayout('layout_login');
  }
  
  public function executeGetcitybyprovinceid(sfWebRequest $request)
  {
  	if(!$request->getParameter('id'))
  	return;
  	$citys=city::getCityByProvinceId($request->getParameter('id'));
  	if ($citys==null)
  	return ;
  	$this->getResponse()->setHttpHeader('Content-type', 'application/json');
        echo  json_encode($citys);
        return sfView::HEADER_ONLY;
  }
  
  public function executeGetareabycityid(sfWebRequest $request)
  {
  	if(!$request->getParameter('id'))
  	return;
  	$areas=area::getAreaByCityId($request->getParameter('id'));
  	if ($areas==null)
  	return ;
  	$this->getResponse()->setHttpHeader('Content-type', 'application/json');
    echo  json_encode($areas);
    return sfView::HEADER_ONLY;
  }
  
  public function executeGetcategory2bycategory1(sfWebRequest $request){
  	$categoey2=UtoconsultArticleCategory2::getCategory2ByCategory1($request->getParameter('category1'));
  	$this->getResponse()->setHttpHeader('Content-type', 'application/json');
    echo  json_encode($categoey2);
    return sfView::HEADER_ONLY;
  }
  
  public function executeEmail(sfWebRequest $request) {

    
    $message = sfContext::getInstance()->getMailer()->compose(
      array('bryant.qin@gmail.com' => 'Jobeet Bot'),
      'bryant.qin@gmail.com',
      'Jobeet affiliate token',
      "hahaha"
    );
    $mailer = sfContext::getInstance()->getMailer();
    $mailer->send($message);
      
/*
$mailer = Swift_Mailer::newInstance(Swift_MailTransport::newInstance());


$message = Swift_Message::newInstance('Subject')
  ->setFrom(array('bryant.qin@gmail.com' => 'Username'))
  ->setTo(array('bryant.qin@gmail.com' => 'Receiver name'))
  ->setBody('Email content')
;

$mailer->send($message);
*/
      return sfView::HEADER_ONLY;
  }
}
