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

   function install()
   {
      $installer = new Konekt_Install_Model_Install();
      
      foreach (Konekt::app()->getModules() as $module => $params)
      {
         echo "Installing module $module...";
         echo $installer->installModule($module) ? "OK.\n" : "FAILED.\n";  
      }   
   }
   
   function displayHelp()
   {
      die("Konekt Framework Command Line Installer.\nUsage:
         \t-r:\tReinstall (drops database and installs)
         \t-i:\tInstall (Install onto the existing db)
         \t-h:\tDisplay this help text
      ");   
   }

   if (Konekt::app()->runningFromCli())
   {
      $opt = getopt("rhi");
      if (empty($opt) || isset($opt['h']))
         displayHelp();
      
      if (isset($opt['r']))
      {
         recreateDatabase();
         install();
      }
      elseif (isset($opt['h']))
      {
         install();
      }

   }

      
?>
