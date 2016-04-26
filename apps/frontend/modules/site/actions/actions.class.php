<?php
     class siteActions extends sfActions{
      public function __construct(){
      	
      }
      
       	
       public static function getUserInformation($object){
       	
		if ($object->getUser()->getAttribute('user')){
  		  $object->user=$object->getUser()->getAttribute('user');  	

		}
  	        elseif ($object->getRequest()->getCookie('userslug')) {
  		  $object->user=UtoconsultUser::getUserBySlug( $object->getRequest()->getCookie('userslug'));
                  $object->getUser()->setAttribute('user',$object->user);
     	        }
    

                if (!$object->getUser()->getAttribute('userprofilephoto') && $object->getUser()->getAttribute('user')) {
                     $object->userprofilephoto=	UtoconsultUserProfilePhoto::getUtoconsultUserProfilePhotoById($object->user->getId());
                     $object->getUser()->setAttribute('userprofilephoto',$object->userprofilephoto);
                }
       
       

                $object->loginform=new LoginForm();  
                $object->getRequest()->setAttribute('loginform', $object->loginform);

                self::getHeaderLinks($object);
                self::getHeaderFileCategoryLinks($object);

	  }
	  
	  
	  public static function getHeaderLinks($object){
	  	if(!$object->getUser()->getAttribute('arrayLinksCategory2'))
	  	{
	  	 $categorys = UtoconsultArticleCategory1::getCategory1Category2();
  	         foreach ($categorys as $category) {
    	           $arrayLinksCategory2[$category['UtoconsultArticleCategory1']['id']][]=$category;
                 } 
                 $object->getUser()->setAttribute('arrayLinksCategory2', $arrayLinksCategory2);
	  	} 
	     
                return  $object->getUser()->getAttribute('arrayLinksCategory2');
	  }
	  
	  public static function getHeaderFileCategoryLinks($object){
	  	if(!$object->getUser()->getAttribute('arrayLinksFileCategory'))
	  	{
	  		 $categorys = Doctrine_Core::getTable('UtoconsultFileCategory')->findAll();
	  		 
	  		 foreach ($categorys as $category){
	  		 	$arrayLinksFileCategory[$category['id']] = $category['category'];
	  		 }
	  		 $object->getUser()->setAttribute('arrayLinksFileCategory', $arrayLinksFileCategory);
	  	}

	  	return  $object->getUser()->getAttribute('arrayLinksFileCategory');
	  }
	  
	  
	  
     }