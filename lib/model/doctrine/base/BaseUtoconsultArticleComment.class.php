<?php

/**
 * BaseUtoconsultArticleComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $article_id
 * @property integer $user_id
 * @property blob $content
 * @property UtoconsultMyArticle $UtoconsultMyArticle
 * @property UtoconsultUser $UtoconsultUser
 * 
 * @method integer                  getArticleId()           Returns the current record's "article_id" value
 * @method integer                  getUserId()              Returns the current record's "user_id" value
 * @method blob                     getContent()             Returns the current record's "content" value
 * @method UtoconsultMyArticle      getUtoconsultMyArticle() Returns the current record's "UtoconsultMyArticle" value
 * @method UtoconsultUser           getUtoconsultUser()      Returns the current record's "UtoconsultUser" value
 * @method UtoconsultArticleComment setArticleId()           Sets the current record's "article_id" value
 * @method UtoconsultArticleComment setUserId()              Sets the current record's "user_id" value
 * @method UtoconsultArticleComment setContent()             Sets the current record's "content" value
 * @method UtoconsultArticleComment setUtoconsultMyArticle() Sets the current record's "UtoconsultMyArticle" value
 * @method UtoconsultArticleComment setUtoconsultUser()      Sets the current record's "UtoconsultUser" value
 * 
 * @package    uto
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUtoconsultArticleComment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('utoconsult_article_comment');
        $this->hasColumn('article_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('content', 'blob', null, array(
             'type' => 'blob',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('UtoconsultMyArticle', array(
             'local' => 'article_id',
             'foreign' => 'id'));

        $this->hasOne('UtoconsultUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}