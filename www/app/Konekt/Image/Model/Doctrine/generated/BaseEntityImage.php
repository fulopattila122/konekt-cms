<?php

/**
 * BaseEntityImage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $Entity
 * @property integer $Entity_id
 * @property integer $Image_id
 * @property Image $Image
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseEntityImage extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('entity_image');
        $this->hasColumn('Entity', 'string', 100, array(
             'type' => 'string',
             'length' => '100',
             ));
        $this->hasColumn('Entity_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Image_id', 'integer', null, array(
             'type' => 'integer',
             ));


        $this->index('Entity_Entity_id_index', array(
             'fields' => 
             array(
              0 => 'Entity',
              1 => 'Entity_id',
             ),
             ));
        $this->index('Image_id_index', array(
             'fields' => 
             array(
              0 => 'Image_id',
             ),
             ));
        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_hungarian_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Image', array(
             'local' => 'Image_id',
             'foreign' => 'id'));
    }
}