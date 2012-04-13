<?php

/**
 * BaseComment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $Entity
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseComment extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('comment');
        $this->hasColumn('Entity', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_hungarian_ci');
        $this->option('charset', 'utf8');

        $this->setSubClasses(array(
             'PageComment' => 
             array(
              'Entity' => 'Page',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}