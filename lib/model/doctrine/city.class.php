<?php

/**
 * city
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    uto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class city extends Basecity
{
	public static function getCityByProvinceId($provinceId){
		$q = Doctrine_Query::create()
             ->from('city c')
             ->where('c.fatherID = ?',$provinceId); 
        return $q->fetchArray();     
	}
	
    public static function getCityById($cityId){
		$q = Doctrine_Query::create()
             ->from('city c')
             ->where('c.cityID = ?',$cityId); 
        return $q->fetchOne();   
	}
	

}