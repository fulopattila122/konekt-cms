<?php
/**
 * Contains the Version0008 Migration Model Class
 *
 *
 * @category    Konekt
 * @package     Cms\Catalog
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     Proprietary
 * @version     2016-08-15
 * @since       2016-08-15
 */

class Konekt_Cms_Catalog_Model_Migration_Version0008 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('productcategory', 'shippingcategory', 'string', '50', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('productcategory', 'shippingcategory');
    }
}
