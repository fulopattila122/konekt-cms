<?php

/**
 * BaseBlogpost
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $Title
 * @property integer $Blog_id
 * @property integer $User_id
 * @property integer $Contentstatus_id
 * @property timestamp $Publishdate
 * @property boolean $Showauthor
 * @property boolean $Commentsallowed
 * @property integer $Menu
 * @property clob $Excerpt
 * @property clob $Content
 * @property integer $Image_id
 * @property Contentstatus $Contentstatus
 * @property Blog $Blog
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBlogpost extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('blogpost');
        $this->hasColumn('Title', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Blog_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('User_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Contentstatus_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Publishdate', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('Showauthor', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('Commentsallowed', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('Menu', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Excerpt', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('Content', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('Image_id', 'integer', null, array(
             'type' => 'integer',
             ));


        $this->index('Slug_unique_index', array(
             'fields' => 
             array(
              0 => 'Blog_id',
              1 => 'Slug',
             ),
             'type' => 'unique',
             ));
        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Contentstatus', array(
             'local' => 'Contentstatus_id',
             'foreign' => 'id'));

        $this->hasOne('Blog', array(
             'local' => 'Blog_id',
             'foreign' => 'id'));
        
        $this->hasOne('Image', array(
             'local' => 'Image_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'Title',
             ),
             'canUpdate' => true,
             'builder' => 
             array(
              0 => 'Konekt_Cms_Blog_Model_Inflector',
              1 => 'urlize',
             ),
             ));
        $versionable0 = new Doctrine_Template_Versionable(array(
             'versionColumn' => 'Version',
             'className' => '%CLASS%Version',
             'auditLog' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
        $this->actAs($versionable0);
    }
}