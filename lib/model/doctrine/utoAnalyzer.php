<?php

require_once ('lib/vendor/symfony/lib/plugins/sfDoctrinePlugin/lib/vendor/doctrine/Doctrine/Search/Analyzer/Interface.php');

class utoAnalyzer implements Doctrine_Search_Analyzer_Interface {
    public function analyze($text){
    	return $text;
    }
    
    public static function removeStopWordsFromArray($words){
    	$stop_words = array(
    	 ",", "/", "\\", ".", ";", ":", "\"", "!", "~", "`", "^", "(", ")",
    	 "?", "-", "'", "<", ">", "$", "&", "%", "#", "@", "+", "=", "{", "}",
    	 "[", "]", "：", "）", "（", "．", "。", "，", "！", "；", "“", "”", "‘", "’",
    	 "［", "］", "、", "—", "　", "《", "》", "－", "…", "【", "】",
    	 "的","我们","我们的","你","你们","你们的","他","他们","他们的",
    	 "她","她们","她们的","它们","它们的","这个","那个","这些","那些","是",
    	 "不是","谁","一个","每个","所有","只有","因为","所以","非常","但是");
    	
    	return array_diff($words, $stop_words);
    }
    
   public static function stemPhrase($phrase)
   {
    // split into words
    $words = str_word_count(strtolower($phrase), 1);

    // ignore stop words
    $words = self::removeStopWordsFromArray($words);

    // stem words
    $stemmed_words = array();
    foreach ($words as $word)
    {
      // ignore 1 and 2 letter words
      if (strlen($word) < 2)
      {
        continue;
      }

      $stemmed_words[] = $word; //PorterStemmer::stem($word, true);
    }

    return $stemmed_words;
  }
    
}

?>