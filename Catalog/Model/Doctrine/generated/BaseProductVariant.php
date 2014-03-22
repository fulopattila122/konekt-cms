<?php

/**
 * BaseProductVariant
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Product_id
 * @property string $Name
 * @property Product $Product
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProductVariant extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('product_variant');
        $this->hasColumn('Product_id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             ));
        $this->hasColumn('Name', 'string', 100, array(
             'type' => 'string',
             'length' => '100',
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Product', array(
             'local' => 'product_id',
             'foreign' => 'id'));
        
        $this->hasMany('Productprice as Prices', array(
             'local' => 'id',
             'foreign' => 'ProductVariant_id'));

        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'Name',
             ),
             ));
        $this->actAs($i18n0);
    }
}