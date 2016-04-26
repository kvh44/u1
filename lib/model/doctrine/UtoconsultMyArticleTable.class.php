<?php


/**
 * UtoconsultMyArticleTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UtoconsultMyArticleTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object UtoconsultMyArticleTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('UtoconsultMyArticle');
    }
    
    
   static public function getLuceneIndex()
   {
     ProjectConfiguration::registerZend();
     
     if (file_exists($index = self::getLuceneIndexFile()))
     {
       return Zend_Search_Lucene::open($index);
        
     }

     return Zend_Search_Lucene::create($index);
   }
   
   static public function getLuceneIndexFile()
   {
     return sfConfig::get('sf_data_dir').DIRECTORY_SEPARATOR.'article.'.sfConfig::get('sf_environment').'.index';
   }
   
   
public function getForLuceneQuery($query)
{
  ProjectConfiguration::registerZend();	

  setlocale(LC_ALL, 'zh-cn.UTF-8');
  
  require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Search/Lucene/Analysis/CN_Lucene_Analyzer.php';
  Zend_Search_Lucene_Analysis_Analyzer::setDefault( new CN_Lucene_Analyzer() ); 

  
  /*
  require_once sfConfig::get('sf_lib_dir').'/vendor/pscws4/pscws4.class.php';
  $cws = new PSCWS4();
  $cws->set_charset('utf8');
  $cws->set_multi(3);
  $cws->set_duality(true);
  $cws->set_dict('etc/dict.xdb');
  $cws->set_rule(sfConfig::get('sf_lib_dir').'/vendor/pscws4/etc/rules.utf8.ini');
  $cws->send_text($query);
  while ($some = $cws->get_result()){
    foreach ($some as $word){
     $array_words .= '"'.$word['word'].'" '; //mb_substr($word['word'],0,4, 'utf-8');
    }
  }
  */
  
  
  $query = Zend_Search_Lucene_Search_QueryParser::parse($query, "UTF-8");

  $hits = self::getLuceneIndex()->find($query); 

  
  /*
  $pks = array();
  foreach ($hits as $hit)
  {
    $pks[] = $hit->pk;
    $string_pks .= $hit->pk;
    if(count($pks)!=count($hits)){
    	$string_pks .= ',';
    }
  }
  
  if (empty($pks))
  {
    return array();
  }
 
  $q = $this->createQuery('u')
    ->select('u.*,FIELD(u.id,'.$string_pks.') AS pks')
    ->whereIn('u.id', $pks)
    ->andWhere('u.isdeleted != 1')
    ->orderBy('pks')
    ->limit(20);
   */

  //return $q->execute();   
  return  $hits;
}

public function getForLuceneQueryAutocomplete($query)
{
	ProjectConfiguration::registerZend();	
    setlocale(LC_ALL, 'zh-cn.UTF-8');
  
    require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Search/Lucene/Analysis/CN_Lucene_Analyzer.php';
    Zend_Search_Lucene_Analysis_Analyzer::setDefault( new CN_Lucene_Analyzer() ); 

    Zend_Search_lucene::setResultSetLimit(10);
    $query = Zend_Search_Lucene_Search_QueryParser::parse($query, "UTF-8");
    Zend_Search_Lucene::setDefaultSearchField('title');

    $hits = self::getLuceneIndex()->find($query);
    
    return  $hits;
}




}