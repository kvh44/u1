<?php

/**
 * Baseprovince
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $provinceID
 * @property string $province
 * 
 * @method integer  getProvinceID() Returns the current record's "provinceID" value
 * @method string   getProvince()   Returns the current record's "province" value
 * @method province setProvinceID() Sets the current record's "provinceID" value
 * @method province setProvince()   Sets the current record's "province" value
 * 
 * @package    uto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Baseprovince extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('province');
        $this->hasColumn('provinceID', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('province', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}