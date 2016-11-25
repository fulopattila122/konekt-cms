<?php
/**
 * Contains the Version0009 Migration Model Class
 *
 *
 * @category    Konekt
 * @package     Cms\Catalog
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     Proprietary
 * @version     2016-11-25
 * @since       2016-11-25
 */

class Konekt_Cms_Catalog_Model_Migration_Version0009 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('product', 'isendoflife', 'boolean');
        $this->addColumn('product_version', 'isendoflife', 'boolean');
    }

    public function down()
    {
        $this->removeColumn('product', 'isendoflife');
        $this->removeColumn('product_version', 'isendoflife');
    }
}
