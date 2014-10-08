<?php
/**
 * Contains the Version0006 Migration Model Class
 *
 *
 * @category    Konekt
 * @package     Cms\Catalog
 * @copyright   Copyright (c) 2014 Attila Fulop
 * @author      Attila Fulop
 * @license     Proprietary
 * @version     2014-10-08
 * @since       2014-10-08
 */

class Konekt_Cms_Catalog_Model_Migration_Version0006 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('productcategory', 'isactive', 'boolean', '25', array(
             'default' => '1',
             ));
    }

    public function down()
    {
        $this->removeColumn('productcategory', 'isactive');
    }
}
