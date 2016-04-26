<?php

/**
 * BaseUtoconsultContactus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $email
 * @property integer $fromid
 * @property blob $content
 * 
 * @method string              getEmail()   Returns the current record's "email" value
 * @method integer             getFromid()  Returns the current record's "fromid" value
 * @method blob                getContent() Returns the current record's "content" value
 * @method UtoconsultContactus setEmail()   Sets the current record's "email" value
 * @method UtoconsultContactus setFromid()  Sets the current record's "fromid" value
 * @method UtoconsultContactus setContent() Sets the current record's "content" value
 * 
 * @package    uto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUtoconsultContactus extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('utoconsult_contactus');
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('fromid', 'integer', null, array(
             'type' => 'integer',
             'notnull' => false,
             ));
        $this->hasColumn('content', 'blob', null, array(
             'type' => 'blob',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}