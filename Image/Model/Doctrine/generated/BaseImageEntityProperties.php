<?php

/**
 * BaseImageEntityProperties
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $Entityname
 * @property string $Groupname
 * @property integer $Mainwidthfull
 * @property integer $Mainheightfull
 * @property integer $Mainwidththumbnail
 * @property integer $Mainheightthumbnail
 * @property integer $Widthfull
 * @property integer $Heightfull
 * @property integer $Widththumbnail
 * @property integer $Heightthumbnail
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseImageEntityProperties extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('image_entity_properties');
        $this->hasColumn('Entityname', 'string', 255, array(
             'type' => 'string',
             'length' => '255',
             ));
        $this->hasColumn('Groupname', 'string', 50, array(
             'type' => 'string',
             'length' => '50',
             ));
        $this->hasColumn('Mainwidthfull', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Mainheightfull', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Mainwidththumbnail', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Mainheightthumbnail', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Widthfull', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Heightfull', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Widththumbnail', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Heightthumbnail', 'integer', null, array(
             'type' => 'integer',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}