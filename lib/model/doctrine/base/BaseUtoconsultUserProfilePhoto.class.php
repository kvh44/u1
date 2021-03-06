<?php

/**
 * BaseUtoconsultUserProfilePhoto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $photo
 * @property string $photoicon
 * @property UtoconsultUser $UtoconsultUser
 * 
 * @method integer                    getUserId()         Returns the current record's "user_id" value
 * @method string                     getPhoto()          Returns the current record's "photo" value
 * @method string                     getPhotoicon()      Returns the current record's "photoicon" value
 * @method UtoconsultUser             getUtoconsultUser() Returns the current record's "UtoconsultUser" value
 * @method UtoconsultUserProfilePhoto setUserId()         Sets the current record's "user_id" value
 * @method UtoconsultUserProfilePhoto setPhoto()          Sets the current record's "photo" value
 * @method UtoconsultUserProfilePhoto setPhotoicon()      Sets the current record's "photoicon" value
 * @method UtoconsultUserProfilePhoto setUtoconsultUser() Sets the current record's "UtoconsultUser" value
 * 
 * @package    uto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUtoconsultUserProfilePhoto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('utoconsult_user_profile_photo');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             'unique' => true,
             ));
        $this->hasColumn('photo', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             ));
        $this->hasColumn('photoicon', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
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