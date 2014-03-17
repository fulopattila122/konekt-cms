<?php
/**
 * Contains the Version0004 Migration Model Class
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

class Konekt_Cms_Catalog_Model_Migration_Version0004 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('product_variant', 'product_variant_product_id_product_id', array(
             'name' => 'product_variant_product_id_product_id',
             'local' => 'product_id',
             'foreign' => 'id',
             'foreignTable' => 'product',
             ));
        $this->createForeignKey('product_variant_translation', 'product_variant_translation_id_product_variant_id', array(
             'name' => 'product_variant_translation_id_product_variant_id',
             'local' => 'id',
             'foreign' => 'id',
             'foreignTable' => 'product_variant',
             'onUpdate' => 'CASCADE',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('product_variant', 'product_variant_product_id', array(
             'fields' => 
             array(
              0 => 'product_id',
             ),
             ));
        $this->addIndex('product_variant_translation', 'product_variant_translation_id', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('product_variant', 'product_variant_product_id_product_id');
        $this->dropForeignKey('product_variant_translation', 'product_variant_translation_id_product_variant_id');
        $this->removeIndex('product_variant', 'product_variant_product_id', array(
             'fields' => 
             array(
              0 => 'product_id',
             ),
             ));
        $this->removeIndex('product_variant_translation', 'product_variant_translation_id', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             ));
    }
}
