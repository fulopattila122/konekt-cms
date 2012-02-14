<?php

class Konekt_Core_Helper_Default extends Konekt_Core_Helper_Abstract{
   
   /**
    * Encrypts the given value with the local encryption key
    *
    * @param string $value The string value to encrypt
    *
    * @return string The encrypted string
    */
   public function encrypt($value)
   {
      //dummy yay yet
      return Konekt_Core_Model_Crypt::encrypt($value);
   }
   
   /**
    * Decrypts an encrypted string with the local encryption key
    *
    * @param string $value The encrypted value
    *
    * @return string The decrypted string
    */
   public function decrypt($value)
   {
      //dummy yay yet
      return Konekt_Core_Model_Crypt::decrypt($value);
   }
   
   /**
    * Returns the filename without extension
    *
    * @param string $fileName The File name to shrink
    *
    * @return string
    */
   public function getFileNameWithoutExt($fileName)
   {
      $info = pathinfo($fileName);
      return basename($fileName, '.'.$info['extension']);
   }
   
   /**
    * Returns the file extension
    *
    * @param string $fileName The file name to get the extension from
    * @param bool $toLower If true, the extension gets converted to lowercase. Defaults to false
    *
    * @return string The extracted file extension
    */
   public function getFileExt($fileName, $toLower = false)
   {
      $info = pathinfo($fileName);
      $result = $info['extension'];
      return $toLower ? strtolower($result) : $result;
   }
   
   /**
    * Resolves relative paths to full local paths
    *
    * @param string $path The partial path
    * @param string $rootdir The root folder to be relative to
    *
    * @return string The full local path (without trailing slash)
    */
   protected function _getFullPath($path, $rootdir)    
   {
      if (empty($path))
      {
         //They might not be kidding with sending an empty path; nevertheless it's not a good idea
         return $rootdir;
      }
      // Don't do anything with paths already on the root path
      if (strpos($path, $rootdir) === 0)
      {
         return $path; 
      }
      
      return $this->ensurePath($rootdir, true, true, true).
         $this->ensurePath($path, false, false);
      
   }
   
   /**
    * Resolves a path relative to the `var` directory into a full path
    *
    * @param string $path The relative path
    *
    * @return string The resolved full path
    */
   public function fullPathVar($path)
   {
      return $this->_getFullPath($path, Konekt::app()->getVarDir());
   }

   /**
    * Resolves a path relative to the `app` directory into a full path
    *
    */
   public function fullPathApp($path)
   {
      return $this->_getFullPath($path, Konekt::app()->getAppDir());
   }

   /**
    * Resolves a path relative to the `etc` directory into a full path
    *
    * @param string $path The relative path
    *
    * @return string The resolved full path
    */
   public function fullPathEtc($path)
   {
      return $this->_getFullPath($path, Konekt::app()->getEtcDir());
   }
   
   /**
    * Resolves a path relative to the root directory into a full path
    *
    * @param string $path The relative path
    *
    * @return string The resolved full path
    */
   public function fullPathRoot($path)
   {
      return $this->_getFullPath($path, Konekt::getRootDir());
   }
   
   /**
    * Ensures if Path is correct and according to the given parameters
    * starts and/or ends with directory separator. Also removes double slashes (not the triples or multiples)
    *
    * @param string $path The path to be checked
    * @param bool $startWith Depending on its value it will be made sure that the result starts (true) or doesn't (false) start with a slash
    * @param bool $endWith Depending on its value it will be made sure that the result ends (true) or doesn't (false) end with a slash
    * @param bool $ignoreStart If true, the starting slash check will be ignored (useful for fullpaths, mainly on Windows systems)
    *
    * @returns string The path string treated according to the parameters
    */
   public function ensurePath($path, $startWith = true, $endWith = true, $ignoreStart = false)
   {
      //Be nice for empty strings as well
      if (empty($path))
      {
         return ($startWith || $endWith) ? DS : '';
      }
      
      $path = str_replace(DS.DS, DS, $path);
      
      $fc = $path[0];
      $lc = $path[strlen($path)-1];
      
      if ($endWith)
      {
         if ($lc != DS)
         {
            $path .= DS;
         } 
      }
      else
      {
         if ($lc == DS)
         {
            $path = substr($path, 0,-1);
         }
      }
      
      if ($ignoreStart)
      {
         return $path;
      }
      
      if ($startWith)
      {
         if ($fc != DS)
         {
            $path = DS . $path;
         } 
      }
      else
      {
         if ($fc == DS)
         {
            $path = substr($path, 1,strlen($path)-1);
         }
      }
      
      return $path;
      
   }
   
   /**
    * Returns a treated filename where accented characters, spaces etc get nicely substituted or removed
    *
    * @param string $filename The original file name
    *
    * @return string The treated file name
    */
   public function getTreatedFileName($filename)
   {
      $chars = array(
        chr(195).chr(132) => 'A', chr(195).chr(150) => 'O', 
        chr(195).chr(156) => 'U', chr(195).chr(164) => 'a',
        chr(195).chr(182) => 'o', chr(195).chr(188) => 'u',
        chr(195).chr(159) => 'ss','ű' => 'u',
				'Ű' => 'U', 'ő' => 'o', 'Ő' => 'O',
				'í' => 'i', 'Í' => 'I', 'é' => 'e',
				'É' => 'E', 'ú' => 'u', 'Ú' => 'U',
				'ó' => 'o', 'Ó' => 'O', 'á' => 'a',
				'Á' => 'A', 'Ă' => 'A', 'ă' => 'a',
				'î' => 'i', 'Î' => 'I', 'â' => 'a',
				'Â' => 'A', 'ș' => 's', 'Ș' => 'S',
				'ț' => 't', 'Ț' => 'T', 'ş' => 's',
				'Ş' => 'S', 'ţ' => 't', 'Ţ' => 'T',
				' ' => '_');
      //Replace known accented chars with their unaccented variant, and space with underscore  
      $result = strtolower(strtr($filename, $chars));     
      //Remove anything that's not alphanumeric, underscore or dot
      $result = preg_replace("/[^a-z0-9_-s.\\-]/i", "", $result);
      return $result;
   }
   
   /**
    * Returns the Country id (id field from db) based on 2 char code
    *
    * @param string $code The two character country code
    *
    * @return int The id of the country in the db
    */
   public function getCountryIdByCode($code)
   {
      if (Konekt::registry("core_country_$code") === NULL)
      {
         $ctry = Doctrine_Core::getTable('Country')->findOneByCode2(strtoupper($code));
         Konekt::register("core_country_$code", $ctry ? $ctry->id : 0);
      }
      
      return Konekt::registry("core_country_$code");
   }
   
   function getDomainRootUrl()
   {
      $pageURL = 'http';
      if ($_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
      }
      $pageURL .= "://" . $_SERVER["SERVER_NAME"];
      
      if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= ":".$_SERVER["SERVER_PORT"];
      }
      return $pageURL;
   }
   
   function currentPageUrl()
   {
      return $this->getDomainRootUrl() . $_SERVER["REQUEST_URI"];    
   }  
   
}
