<?php 
require_once 'Zend/Search/Lucene/Analysis/Analyzer.php';
require_once 'Zend/Search/Lucene/Analysis/Analyzer/Common.php';
class CN_Lucene_Analyzer extends Zend_Search_Lucene_Analysis_Analyzer_Common {

        private $_position;

        private $_cnStopWords = array();

        public function setCnStopWords($cnStopWords){
                $this->_cnStopWords = $cnStopWords;
        }

        /**
     * Reset token stream 
     */ 
        public function reset()
        {
                $this->_position = 0;
                $search = array(",", "/", "\\", ".", ";", ":", "\"", "!", "~", "`", "^", "(", ")",
                 "?", "-", "'", "<", ">", "$", "&", "%", "#", "@", "+", "=", "{", "}", "[", "]", 
                 "：", "）", "（", "．", "。", "，", "！", "；", "“", "”", "‘", "’", "［", "］", "、", "—",
                 "　", "《", "》", "－", "…", "【", "】",
    	         "的","我们","我们的","你","你们","你们的","他","他们","他们的",
    	         "她","她们","她们的","它们","它们的","这个","那个","这些","那些","是",
    	         "不是","在","不在","不再","再","一次","因此","谁","一个","每个","所有",
    	         "只有","因为","所以","非常","但是"
                );
                $this->_input = str_replace($search,' ',$this->_input);
                $this->_input = str_replace($this->_cnStopWords,' ',$this->_input);
        }

        /**
     * Tokenization stream API 
     * Get next token 
     * Returns null at the end of stream 
     * 
     * @return Zend_Search_Lucene_Analysis_Token|null 
     */ 
        public function nextToken()
        {
                if ($this->_input === null) {
                        return null;
                }
                $len = strlen($this->_input);
				
                while ($this->_position < $len) {
                        while ($this->_position < $len &&
                        $this->_input[$this->_position]==' ' ) {
                                $this->_position++;
                        }
                        $termStartPosition = $this->_position;
                        $temp_char = $this->_input[$this->_position];
                        $isCnWord = false;
                        if(ord($temp_char)>27){
                                $i = 0;
                                while (($this->_position < $len) && ord( $this->_input[$this->_position] )>127) {
                                        $this->_position = $this->_position + 3;
                                        $i ++;
                                        if($i==2){
                                                $isCnWord = true;
                                                break;
                                        }
                                }
                                if($i==1)continue;
                        }else{
                                while ($this->_position < $len && ctype_alnum( $this->_input[$this->_position] )) {
                                        $this->_position++;
                                }
                                //echo $this->_position.":".$this->_input[$this->_position]."\n";
                        }
                        if ($this->_position == $termStartPosition) {
                                $this->_position++;
                                continue;
                        }

                        $token = new Zend_Search_Lucene_Analysis_Token(
                        substr($this->_input,
                        $termStartPosition,
                        $this->_position - $termStartPosition),
                        $termStartPosition,
                        $this->_position);
                        $token = $this->normalize($token);
                        if($isCnWord)$this->_position = $this->_position - 3;
                        if ($token !== null) {
                                return $token;
                        }
                }
                return null;
        }
}
?>