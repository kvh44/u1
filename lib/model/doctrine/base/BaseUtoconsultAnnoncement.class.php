<?php

/**
 * BaseUtoconsultAnnoncement
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $content
 * @property boolean $isdeleted
 * @property boolean $isvalid
 * 
 * @method string                getContent()   Returns the current record's "content" value
 * @method boolean               getIsdeleted() Returns the current record's "isdeleted" value
 * @method boolean               getIsvalid()   Returns the current record's "isvalid" value
 * @method UtoconsultAnnoncement setContent()   Sets the current record's "content" value
 * @method UtoconsultAnnoncement setIsdeleted() Sets the current record's "isdeleted" value
 * @method UtoconsultAnnoncement setIsvalid()   Sets the current record's "isvalid" value
 * 
 * @package    uto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUtoconsultAnnoncement extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('utoconsult_annoncement');
        $this->hasColumn('content', 'string', 4000, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 4000,
             ));
        $this->hasColumn('isdeleted', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('isvalid', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}