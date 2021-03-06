<?php

/**
 * BaseUtoconsultUserContact
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $mobile
 * @property string $fix
 * @property string $fix2
 * @property string $qq
 * @property string $msn
 * @property string $skype
 * @property UtoconsultUser $UtoconsultUser
 * 
 * @method integer               getUserId()         Returns the current record's "user_id" value
 * @method string                getMobile()         Returns the current record's "mobile" value
 * @method string                getFix()            Returns the current record's "fix" value
 * @method string                getFix2()           Returns the current record's "fix2" value
 * @method string                getQq()             Returns the current record's "qq" value
 * @method string                getMsn()            Returns the current record's "msn" value
 * @method string                getSkype()          Returns the current record's "skype" value
 * @method UtoconsultUser        getUtoconsultUser() Returns the current record's "UtoconsultUser" value
 * @method UtoconsultUserContact setUserId()         Sets the current record's "user_id" value
 * @method UtoconsultUserContact setMobile()         Sets the current record's "mobile" value
 * @method UtoconsultUserContact setFix()            Sets the current record's "fix" value
 * @method UtoconsultUserContact setFix2()           Sets the current record's "fix2" value
 * @method UtoconsultUserContact setQq()             Sets the current record's "qq" value
 * @method UtoconsultUserContact setMsn()            Sets the current record's "msn" value
 * @method UtoconsultUserContact setSkype()          Sets the current record's "skype" value
 * @method UtoconsultUserContact setUtoconsultUser() Sets the current record's "UtoconsultUser" value
 * 
 * @package    uto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUtoconsultUserContact extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('utoconsult_user_contact');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('mobile', 'string', 30, array(
             'type' => 'string',
             'length' => 30,
             ));
        $this->hasColumn('fix', 'string', 30, array(
             'type' => 'string',
             'length' => 30,
             ));
        $this->hasColumn('fix2', 'string', 30, array(
             'type' => 'string',
             'length' => 30,
             ));
        $this->hasColumn('qq', 'string', 30, array(
             'type' => 'string',
             'length' => 30,
             ));
        $this->hasColumn('msn', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('skype', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('UtoconsultUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}