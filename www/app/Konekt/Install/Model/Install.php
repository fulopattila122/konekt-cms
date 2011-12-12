<?php

/**
 * Class for installing Application and Modules
 *
 *
 */

class Konekt_Install_Model_Install
{
   const SCHEMA_FILE    = 'schema.yml';
   const FIXTURE_FILE   = 'data.yml';

   public function installModule($moduleName)
   {
      try
      {
         $modDir    = Konekt::app()->getModuleDirectory($moduleName);
         $confDir   = $modDir . DS . Konekt_Core_Model_Config::CONF_REL_DIR;
         $modelsDir = $modDir . DS . Konekt_Core_Model_Config::DOCTRINE_ENTITIES_DIR;

         /* Install Schema */
         if (file_exists($confDir . DS . self::SCHEMA_FILE))
         {
            Doctrine_Core::generateModelsFromYaml($confDir . DS . self::SCHEMA_FILE,
               $modelsDir);
            Doctrine_Core::createTablesFromModels($modelsDir);
         }
         
         /* Install Initial Data fixtures */
         if (file_exists($confDir . DS . self::FIXTURE_FILE))
         {
            Konekt::app()->connection->exec('set names utf8');
            Doctrine_Core::loadData($confDir . DS . self::FIXTURE_FILE);
         }
      }
      catch(Exception $e)
      {
         echo "Failure: " . $e->getMessage() . "\n";
         return false;
      }
      return true;
   }

}
