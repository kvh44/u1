<?php

/**
 * provinceTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class provinceTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object provinceTable
     */
	
	public static $provinces=array();
    public static function getInstance()
    {
        return Doctrine_Core::getTable('province');
    }
    
    public function getProvince(){
    	 $array=$this->createQuery('p')->fetchArray();
    	 self::$provinces[0]='省';
    	 foreach ($array as $element) {
    	 	self::$provinces[$element['provinceID']]=$element['province'];
    	 }

    	 return self::$provinces;
    }
}