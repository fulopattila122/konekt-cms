<?php

/**
 * BaseProduct
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $Name
 * @property string $Slug
 * @property string $Shortdescription
 * @property clob $Details
 * @property integer $Rank
 * @property integer $Productcategory_id
 * @property integer $Image_id
 * @property Productcategory $Productcategory
 * @property Doctrine_Collection $Prices
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProduct extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('product');
        $this->hasColumn('Name', 'string', 128, array(
             'type' => 'string',
             'length' => '128',
             ));
        $this->hasColumn('Slug', 'string', 128, array(
             'type' => 'string',
             'length' => '128',
             ));
        $this->hasColumn('Shortdescription', 'string', 511, array(
             'type' => 'string',
             'length' => '511',
             ));
        $this->hasColumn('Details', 'clob', null, array(
             'type' => 'clob',
             ));
        $this->hasColumn('Rank', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Productcategory_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Image_id', 'integer', null, array(
             'type' => 'integer',
             ));


        $this->index('Productcategory_id_index', array(
             'fields' => 
             array(
              0 => 'Productcategory_id',
             ),
             ));
        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_hungarian_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Productcategory', array(
             'local' => 'Productcategory_id',
             'foreign' => 'id'));

        $this->hasMany('Productprice as Prices', array(
             'local' => 'id',
             'foreign' => 'Product_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'Name',
              1 => 'Shortdescription',
              2 => 'Details',
              3 => 'Slug',
             ),
             ));
        $versionable0 = new Doctrine_Template_Versionable(array(
             'versionColumn' => 'Version',
             'className' => '%CLASS%Version',
             'auditLog' => true,
             ));
        $searchable0 = new Doctrine_Template_Searchable(array(
             'fields' => 
             array(
              0 => 'Name',
              1 => 'Shortdescription',
              2 => 'Details',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($i18n0);
        $this->actAs($versionable0);
        $this->actAs($searchable0);
    }
}