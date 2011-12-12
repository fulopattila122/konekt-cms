<?php

   /**
     * Model Class for the Application's Configuration
     *
     *
     *
     *
     */

class Konekt_Core_Model_Config{

   const LOCAL_CONFIG            = 'local.yml';
   const CONF_REL_DIR            = 'etc';
   const SMARTY_REL_DIR          = 'View/templates';
   const DOCTRINE_ENTITIES_DIR   = 'Model/Doctrine';

   /**
    * @var array
    */
   protected $_config;
   
   public $dbHost;
   public $dbUser;
   public $dbPassword;
   public $dbDatabase;
   public $dbType;
   
   function __construct()
   {
      $this->_config = sfYaml::load(Konekt::app()->getEtcDir() . DS . self::LOCAL_CONFIG);
      if (isset($this->_config['core']['db']['type']) && $this->_config['core']['db']['type'] !== 'none')
      {
         $this->dbHost     = Konekt::helper('core')->decrypt($this->_config['core']['db']['host']);
         $this->dbUser     = Konekt::helper('core')->decrypt($this->_config['core']['db']['username']);
         $this->dbPassword = Konekt::helper('core')->decrypt($this->_config['core']['db']['password']);
         $this->dbDatabase = Konekt::helper('core')->decrypt($this->_config['core']['db']['database']);
         $this->dbType     = Konekt::helper('core')->decrypt($this->_config['core']['db']['type']);
      }
   }

   /**
    * Returns a value from the configuration
    * @return mixed Returns the value(s) based on the config yaml file.
    *    If none found returns a failsafe empty array
    */
   public function getValue($name)
   {
      $node = $this->_config;
      foreach (explode('/', $name) as $key)
      {
         $node = $node["$key"];
      }
      return isset($node) ? $node : array();
   }
   
}
