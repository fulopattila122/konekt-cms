<?php
/**
 * Contains the Version0005 Migration Model Class
 *
 *
 * @category    Konekt
 * @package     Cms\Catalog
 * @copyright   Copyright (c) 2014 Attila Fulop
 * @author      Attila Fulop
 * @license     Proprietary
 * @version     2014-03-19
 * @since       2014-03-19
 */

class Konekt_Cms_Catalog_Model_Migration_Version0005 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('product', 'hasvariants', 'boolean', '25', array(
             ));
        $this->addColumn('product_version', 'hasvariants', 'boolean', '25', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('product', 'hasvariants');
        $this->removeColumn('product_version', 'hasvariants');
    }
}
