<?php

/**
 * UtoconsultPublication
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    uto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class UtoconsultPublication extends BaseUtoconsultPublication
{
   public static function getPublications($userid = null){
   	$q = Doctrine_Query::create()
   	     ->from('UtoconsultPublication up')
   	     ->leftJoin('up.UtoconsultUser uu')
   	     ->leftJoin('uu.UtoconsultUserInformation uui')
         ->where('up.isdeleted != 1');
    if($userid){
   	     	$q->addWhere('up.user_id = ?',$userid);
   	}
   	return $q;     
   }

}