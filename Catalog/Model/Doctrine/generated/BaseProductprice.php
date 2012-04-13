<?php

/**
 * BaseProductprice
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Product_id
 * @property integer $Country_id
 * @property integer $Currency_id
 * @property integer $Price
 * @property datetime $Validfrom
 * @property datetime $Validuntil
 * @property Product $Product
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProductprice extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('productprice');
        $this->hasColumn('Product_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Country_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Currency_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Price', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('Validfrom', 'datetime', null, array(
             'type' => 'datetime',
             ));
        $this->hasColumn('Validuntil', 'datetime', null, array(
             'type' => 'datetime',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_hungarian_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Product', array(
             'local' => 'Product_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}