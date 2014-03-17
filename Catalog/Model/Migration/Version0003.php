<?php
/**
 * Contains the Version0003 Migration Model Class
 *
 *
 * @category    Konekt
 * @package     Cms\Catalog
 * @copyright   Copyright (c) 2014 Attila Fulop
 * @author      Attila Fulop
 * @license     Proprietary
 * @version     2014-03-18
 * @since       2014-03-18
 */

class Konekt_Cms_Catalog_Model_Migration_Version0003 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('product_variant', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'product_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             ), array(
             'type' => 'INNODB',
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
        $this->createTable('product_variant_translation', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'primary' => '1',
             ),
             'name' => 
             array(
              'type' => 'string',
              'length' => '100',
             ),
             'lang' => 
             array(
              'fixed' => '1',
              'primary' => '1',
              'type' => 'string',
              'length' => '2',
             ),
             ), array(
             'type' => 'INNODB',
             'primary' => 
             array(
              0 => 'id',
              1 => 'lang',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
        $this->addColumn('productprice', 'productvariant_id', 'integer', '8', array(
             ));
    }

    public function down()
    {
        $this->dropTable('product_variant');
        $this->dropTable('product_variant_translation');
        $this->removeColumn('productprice', 'productvariant_id');
    }
}
