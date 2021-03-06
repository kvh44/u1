<?php

/**
 * UtoconsultUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    utoconsult
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class UtoconsultUser extends BaseUtoconsultUser
{
	/*
	public function setUp(){
		$this->actAs('Sluggable', array(
                'unique'    => true,
                'fields'    => array('email'),
                'canUpdate' => true));
	}
	*/
	public function setPassword($password){
		return $this->_set('password', md5($password));
	}
	
	public function setSlug($slug){
		return $this->_set('slug', md5($slug));
	}
	
	public function __toString(){
		return sprintf("%s",$this->getId());
	}
	
	public static function getUserBySlug($slug){
		$q = Doctrine_Query::create()
             ->from('UtoconsultUser u2')
             ->where('u2.slug = ?',$slug);     
        return $user=$q->fetchOne();        
	}
	
	public static function getUserByUsername($username){
		$q = Doctrine_Query::create()
             ->from('UtoconsultUser u')
             ->where('u.username = ?',$username);
        return $q->fetchOne();     
	}
	
}
