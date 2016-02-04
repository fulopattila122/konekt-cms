<?php
/**
 * Contains the Version0007 Migration Model Class
 *
 *
 * @category    Konekt
 * @package     Cms\Catalog
 * @copyright   Copyright (c) 2016 Attila Fulop
 * @author      Attila Fulop
 * @license     Proprietary
 * @version     2016-02-04
 * @since       2016-02-04
 */

class Konekt_Cms_Catalog_Model_Migration_Version0007 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('productcategory', 'parentid', 'integer', '8', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('productcategory', 'parentid');
    }
}
