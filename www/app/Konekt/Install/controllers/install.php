<?php

require_once("../../../Konekt.php");

   function recreateDatabase()
   {
      echo "Dropping database...";
      Doctrine_Core::dropDatabases();
      echo "OK.\n";

      echo "Creating database...";
      Doctrine_Core::createDatabases();
      echo "OK.\n";
   }
   
   /**
    * Installs a single Application Module
    *
    * @param string $module The name of the module
    * @param Konekt_Install_Model_Install $installer The Installer Model instance
    * @param bool $omitSql Whether or not to skip Database operations
    *
    * @return bool Returns the value that was returned by the Installer Model instance
    */
   
   function _installModule($module, $installer, $omitSql)
   {
      echo "Installing module $module...";
      $result = $installer->installModule($module, $omitSql);
      echo $result ? "OK.\n" : "FAILED.\n";      
      return $result;
   }

   function install($omitSql = false, $singleModule = null)
   {
      $installer = new Konekt_Install_Model_Install();
      
      if ($singleModule)
      {
         _installModule($singleModule, $installer, $omitSql);
      }
      else
      {
         foreach (Konekt::app()->getModules() as $module => $params)
            _installModule($module, $installer, $omitSql);
      }
   }
   
   function displayModuleList()
   {
      foreach (Konekt::app()->getModules() as $module => $params)
         echo "$module\n";
   }
   
   function displayHelp()
   {
      echo "Konekt Framework Command Line Installer.\nUsage:
         \t-r:\tReinstall (drops database and installs)
         \t-i:\tInstall: Generates Models & DB Tables from Schema and loads fixtures
         \t-l:\tList Modules: Display the list of the Module Names
         \t-h:\tDisplay this help text
         \t--nosql:\tOnly generate models, do not touch the database
         \t--module <modulename>\tOnly install a single module
      ";   
   }

   if (Konekt::app()->runningFromCli())
   {
      $opt = getopt("rhil", array("module:", "nosql"));
      
      if (empty($opt) || isset($opt['h']))
      {
         displayHelp();
         exit(0);
      }
      
      if (isset($opt['l']))
      {
         displayModuleList();
         exit(0);
      }
      
      /* FULL REINSTALL */
      if (isset($opt['r']))
      {
         if (isset($opt['nosql']))
            die("--nosql and -r are incompatible options\n");
            
         recreateDatabase();
         install();
         exit(0);
      }
      /* INSTALL ONLY */
      elseif (isset($opt['i']))
      {
         $module = isset($opt['module']) ? $opt['module'] : null;
         install(isset($opt['nosql']), $module);
         exit(0);
      }
      
      exit("You did not specify any command\n");

   }

      
?>
