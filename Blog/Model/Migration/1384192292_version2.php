<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version2 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('blogpost', 'image_id', 'integer', '8', array(
             ));
        $this->addColumn('blogpost_version', 'image_id', 'integer', '8', array(
             ));
    }

    public function down()
    {
        $this->removeColumn('blogpost', 'image_id');
        $this->removeColumn('blogpost_version', 'image_id');
    }
}