<?php

/**
 * BaseProductgroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $Name
 * @property string $Slug
 * @property integer $Rank
 * @property Doctrine_Collection $Productcategories
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProductgroup extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('productgroup');
        $this->hasColumn('Name', 'string', 100, array(
             'type' => 'string',
             'length' => '100',
             ));
        $this->hasColumn('Slug', 'string', 100, array(
             'type' => 'string',
             'length' => '100',
             ));
        $this->hasColumn('Rank', 'integer', null, array(
             'type' => 'integer',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Productcategory as Productcategories', array(
             'local' => 'id',
             'foreign' => 'Productgroup_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'Name',
              1 => 'Slug',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($i18n0);
    }
}