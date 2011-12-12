<?php

/**
 * Bootstrap Doctrine.php, register autoloader specify
 * configuration attributes and load models.
 */

define('DS', DIRECTORY_SEPARATOR);

final class Konekt{

   const APP_ROOT_DIR  = 'app';
   const VAR_ROOT_DIR  = 'var';
   const ETC_ROOT_DIR  = 'etc';
   const LIB_ROOT_DIR  = 'lib';
   
   /**
    * Application model
    *
    * @var Konekt_Core_Model_App
    */
   static $_app;
   
   
   /**
    * Application Root Directory
    *
    * @var string
    */
   static $_rootDir;
   
   /**
   * Registry Array
   *
   * @var array
   */
   static private $_registry = array();   
   
   /**
    * Get initialized application object.
    *
    * @return Konekt_Core_Model_App
    */   
   public static function app()
   {
      if (NULL === self::$_app)
      {
         self::$_app = new Konekt_Core_Model_App();
       }
      return self::$_app;
   }
   
   /**
    * Set application root absolute path. Please note that the whole framework heavily relies on this setting and with this implementation the app must be in a directory just under the DocumentRoot (eg. public_html/app). If you want to move the application please change this accordingly.
    *
    * @return bool True if already set or successfully set, false otherwise
    */
   public static function setRootDir()
   {
      if (self::$_rootDir)
      {
         return true;
      }

      self::$_rootDir = dirname(dirname(__FILE__));
      self::$_rootDir = realpath(self::$_rootDir);

      return is_dir(self::$_rootDir) && is_readable(self::$_rootDir) ? true : false;
   }
   
   /**
    * Returns the root directory 
    *
    * @return string The Root Directory of `All` (usually one level higher then `app`)
    */
   public static function getRootDir()
   {
      if (!self::$_rootDir)
      {
         self::setRootDir();
      }
      return self::$_rootDir;
   }
   
   /**
   * Register a new entry
   *
   * @param string $key
   * @param mixed $value
   * @param bool $overwrite If false existent keys don't get overwritten
   */
   public static function register($key, $value, $overwrite = true)
   {
      if (!$overwrite && isset(self::$_registry[$key]))
      {
         return false;
      }
      else
      {
         self::$_registry[$key] = $value;
         return true;
      }
   }

   /**
   * Unregister an entry
   *
   * @param string $key
   */
   public static function unregister($key)
   {
      if (isset(self::$_registry[$key]))
      {
         if (is_object(self::$_registry[$key]) && (method_exists(self::$_registry[$key], '__destruct')))
         {
            self::$_registry[$key]->__destruct();
         }
         unset(self::$_registry[$key]);
      }
   }

   /**
   * Retrieve a value from registry
   *
   * @param string $key
   * @return mixed
   */
   public static function registry($key)
   {
      return isset(self::$_registry[$key]) ? self::$_registry[$key] : NULL;
   }
   
   
   /**
    * Returns the Classname of a Helper class based on it's `nice` notation
    *
    *
    */
   private static function _getHelperClassName($name)
   {
      $parts  = explode('/', $name);
      $result = '';
      
      foreach ( explode('_', $parts[0]) as $key )
      {
         $result .= ucfirst($key) . '_';
      }
      
      $result .= 'Helper';
      
      if (empty($parts[1]))
      {
         $result .= '_Default';
      }
      else foreach ( explode('_', $parts[1]) as $key )
      {
         $result .= '_'.ucfirst($key);
      }
      return $result;
   }
   
    /**
     * Retrieve helper object
     *
     * @param string $name the helper name (eg. `konekt_core/default`) if the part before the slash (/) doesn't contain vendor prefix (ie. no `_` in the string, then the default `konekt_` prefix gets added to it
     * @return Konekt_Core_Helper_Abstract
     */
   public static function helper($name)
   {
      //Default to konekt's helper classes in case no vendor prefix specified
      $bzz = explode('/', $name);
      if (strpos($bzz[0], '_') === false)
      {
         $name = "konekt_$name";
      }
      $registryKey = '_helper/' . $name;
      if (!self::registry($registryKey))
      {
         $helperClass = self::_getHelperClassName($name);
         self::register($registryKey, new $helperClass);
      }
      return self::registry($registryKey);
   }   
      
   /**
    * Initialize The Konekt Application Stack
    *
    */
   public static function init()
   {
      if (!self::setRootDir())
      {
         die('Failed to initialize Application root directory');
      }
      self::app()->init(self::getRootDir(), self::APP_ROOT_DIR,
         self::VAR_ROOT_DIR, self::ETC_ROOT_DIR, self::LIB_ROOT_DIR);
   }
   
   /**
    * Class Autoloader function
    *
    *
    */
   public static function autoload($class)
   {
      $classPath = self::$_rootDir . DS . self::APP_ROOT_DIR . DS . str_replace('_', DS, $class) . '.php';
      if (file_exists($classPath))
      {
         require ($classPath);
      }
      else
      {
         return false;
      }
   }

}

   mb_internal_encoding("UTF-8");

   spl_autoload_register(array('Konekt', 'autoload'));
   Konekt::init();

?>
