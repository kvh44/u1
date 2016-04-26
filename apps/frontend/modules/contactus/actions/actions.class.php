<?php
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';
/**
 * contactus actions.
 *
 * @package    uto
 * @subpackage contactus
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactusActions extends sfActions
{
  public function preExecute(){
   siteActions::getUserInformation($this);
  }	
	  
  public function executeIndex(sfWebRequest $request)
  {
  	$this->redirect('/contactus/new');  
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->setLayout('layout_home');    
  }

 
}
