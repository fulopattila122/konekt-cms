<?php

/**
 * BaseUserRole
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $User_id
 * @property integer $Role_id
 * @property User $User
 * @property Role $Role
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserRole extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('user_role');
        $this->hasColumn('User_id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 8,
             ));
        $this->hasColumn('Role_id', 'integer', 8, array(
             'type' => 'integer',
             'primary' => true,
             'length' => 8,
             ));

        $this->option('type', 'INNODB');
        $this->option('collate', 'utf8_hungarian_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('Role', array(
             'local' => 'role_id',
             'foreign' => 'id'));
    }
}