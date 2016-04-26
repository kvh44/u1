<?php
require_once dirname(__FILE__) . '/../../site/actions/actions.class.php';
/**
 * law actions.
 *
 * @package    uto
 * @subpackage law
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class lawActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function preExecute(){
   siteActions::getUserInformation($this);
  }	
	
  public function executeIndex(sfWebRequest $request)
  {
    $this->setLayout('layout_article');
  }
}
