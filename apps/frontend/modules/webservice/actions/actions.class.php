<?php 


/**
 * webservice actions.
 *
 * @package    uto
 * @subpackage webservice
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class webserviceActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	
  	error_reporting( E_ALL | E_STRICT );
    ini_set( "display_errors", "on" );
    
    ProjectConfiguration::registerZend();	
    require_once sfConfig::get('sf_lib_dir'). '/vendor/Zend/Amf/Server.php';
    require_once sfConfig::get('sf_lib_dir'). '/vendor/browser/ZendAmfServiceBrowser.php';
    $server = new Zend_Amf_Server();
    //$server->setSession();
    
    $server->addDirectory(sfConfig::get('sf_lib_dir').'/models/amf');

    $server->setClass('pdf');
    $server->setClass('ZendAmfServiceBrowser');
    
    $server->setClass('Zend_Amf_Adobe_Introspector', '', array("config" => "", "server" => $server));
    ob_end_clean();

    ZendAmfServiceBrowser::$ZEND_AMF_SERVER = $server;
        
    header('Content-type: text/html; charset=UTF-8');
    echo $server->handle();
  }
  
  
  
  public function executePdfservice(sfWebRequest $request){	
  	$this->setLayout(false);
  	
    if (!$this->getUser()->getAttribute('user')){
  		$this->redirect('/home/login');
  	}
  	
  	$this->forward404Unless($this->utoconsult_file = Doctrine_Core::getTable('UtoconsultFile')->find(array($request->getParameter('id'))), sprintf('Object utoconsult_file does not exist (%s).', $request->getParameter('id')));
  	
    

  	$this->getResponse()->addHttpMeta('content-type', 'application/pdf');

    header("Content-Disposition: attachment; filename=".$this->utoconsult_file->getFile_original());
    
  	readfile("uploads/usersharedfile/".$this->utoconsult_file->getFile());

  	return sfView::NONE;
  }
  
  public function executeExportareadata(sfWebRequest $request){
  	$output = "";
  	$provinces = province::getProvinceCityAreaExport();
  	foreach ($provinces as $province){
  		$auto_city = 1;
  		echo $province['id']."=".$province['province']."<br>";
  		$citys = city::getCityByProvinceId($province['provinceID']);

  		foreach ($citys as $city){
  			$auto_area = 1;
  			echo $province['id'].".".$auto_city."=".$city['city']."<br>";
  			$areas = area::getAreaByCityId($city['cityID']);
  			foreach ($areas as $area){
  				echo $province['id'].".".$auto_city.".".$auto_area."=".$area['area']."<br>";
  				$auto_area++;
  			}
  			$auto_city++;
  		}
  	}
  	return sfView::NONE;
  }
  
  public function executeSavemyarticleinsearch(sfWebRequest $request){
  	$this->utoconsult_my_articles = Doctrine_Core::getTable('UtoconsultMyArticle')->findAll();
  	
  	foreach ($this->utoconsult_my_articles as $utoconsult_my_article){
  		if($utoconsult_my_article->isdeleted != 1){
  		$utoconsult_my_article->save();
  		}
  	}
  	$index = UtoconsultMyArticleTable::getLuceneIndex();
  	$index->optimize();
  	return sfView::NONE;
  }
}
