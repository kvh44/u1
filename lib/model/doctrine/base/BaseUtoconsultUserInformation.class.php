<?php

/**
 * BaseUtoconsultUserInformation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $realname
 * @property string $web
 * @property string $special
 * @property blob $description
 * @property integer $country
 * @property integer $province
 * @property integer $city
 * @property integer $area
 * @property UtoconsultUser $UtoconsultUser
 * 
 * @method integer                   getUserId()         Returns the current record's "user_id" value
 * @method string                    getRealname()       Returns the current record's "realname" value
 * @method string                    getWeb()            Returns the current record's "web" value
 * @method string                    getSpecial()        Returns the current record's "special" value
 * @method blob                      getDescription()    Returns the current record's "description" value
 * @method integer                   getCountry()        Returns the current record's "country" value
 * @method integer                   getProvince()       Returns the current record's "province" value
 * @method integer                   getCity()           Returns the current record's "city" value
 * @method integer                   getArea()           Returns the current record's "area" value
 * @method UtoconsultUser            getUtoconsultUser() Returns the current record's "UtoconsultUser" value
 * @method UtoconsultUserInformation setUserId()         Sets the current record's "user_id" value
 * @method UtoconsultUserInformation setRealname()       Sets the current record's "realname" value
 * @method UtoconsultUserInformation setWeb()            Sets the current record's "web" value
 * @method UtoconsultUserInformation setSpecial()        Sets the current record's "special" value
 * @method UtoconsultUserInformation setDescription()    Sets the current record's "description" value
 * @method UtoconsultUserInformation setCountry()        Sets the current record's "country" value
 * @method UtoconsultUserInformation setProvince()       Sets the current record's "province" value
 * @method UtoconsultUserInformation setCity()           Sets the current record's "city" value
 * @method UtoconsultUserInformation setArea()           Sets the current record's "area" value
 * @method UtoconsultUserInformation setUtoconsultUser() Sets the current record's "UtoconsultUser" value
 * 
 * @package    uto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUtoconsultUserInformation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('utoconsult_user_information');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('realname', 'string', 30, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 30,
             ));
        $this->hasColumn('web', 'string', 1000, array(
             'type' => 'string',
             'length' => 1000,
             ));
        $this->hasColumn('special', 'string', 30, array(
             'type' => 'string',
             'length' => 30,
             ));
        $this->hasColumn('description', 'blob', null, array(
             'type' => 'blob',
             ));
        $this->hasColumn('country', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('province', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('city', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('area', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
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