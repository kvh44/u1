<?php

/**
 * Basearea
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $areaID
 * @property string $area
 * @property integer $fatherID
 * 
 * @method integer getAreaID()   Returns the current record's "areaID" value
 * @method string  getArea()     Returns the current record's "area" value
 * @method integer getFatherID() Returns the current record's "fatherID" value
 * @method area    setAreaID()   Sets the current record's "areaID" value
 * @method area    setArea()     Sets the current record's "area" value
 * @method area    setFatherID() Sets the current record's "fatherID" value
 * 
 * @package    uto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Basearea extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('area');
        $this->hasColumn('areaID', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('area', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('fatherID', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}