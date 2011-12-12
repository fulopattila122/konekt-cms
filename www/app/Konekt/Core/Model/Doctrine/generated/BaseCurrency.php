<?php

/**
 * BaseCurrency
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $Code
 * @property string $Symbol
 * @property string $Singural
 * @property string $Plural
 * @property int $Roundto
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCurrency extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('currency');
        $this->hasColumn('Code', 'string', 3, array(
             'type' => 'string',
             'length' => '3',
             ));
        $this->hasColumn('Symbol', 'string', 7, array(
             'type' => 'string',
             'length' => '7',
             ));
        $this->hasColumn('Singural', 'string', 24, array(
             'type' => 'string',
             'length' => '24',
             ));
        $this->hasColumn('Plural', 'string', 24, array(
             'type' => 'string',
             'length' => '24',
             ));
        $this->hasColumn('Roundto', 'int', null, array(
             'type' => 'int',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_hungarian_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}