<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version2 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('product', 'product_productstate_id_productstate_id', array(
             'name' => 'product_productstate_id_productstate_id',
             'local' => 'productstate_id',
             'foreign' => 'id',
             'foreignTable' => 'productstate',
             ));
        $this->addIndex('product', 'product_productstate_id', array(
             'fields' => 
             array(
              0 => 'productstate_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('product', 'product_productstate_id_productstate_id');
        $this->removeIndex('product', 'product_productstate_id', array(
             'fields' => 
             array(
              0 => 'productstate_id',
             ),
             ));
    }
}