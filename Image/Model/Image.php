<?php
/**
 * Image.php contains the implementation of the Image model class ...
 *
 *
 * @category    Konekt
 * @package     Cms
 * @subpackage  Image
 * @copyright   Copyright (c) 2011 - 2012 Attila Fülöp
 * @author      Attila Fülöp
 * @license     GNU LGPL v3 http://www.opensource.org/licenses/lgpl-3.0.html
 * @version     $Revision-Id$ $Date$
 * @since       2011-12-12
 *
 */

class Konekt_Cms_Image_Model_Image
{
   const THUMBNAIL_PREFIX = 'tn_';
   
   /** @var Image The internal underlying Doctrine_Record derived class instance */
   protected $_image;
   
   /**
    * Retrieves the Image directory for the given entity/group
    *
    * @param string $entityName The (class) name of the Entity
    * @param string $group The Entity sub-group name
    *
    * @return string The relative path to the image directory (without leading slash and WITH trailing slash)
    */
   protected function _getEntityDirectory($entityName, $group)
   {
      $imgdir = Konekt::app()->getConfigValue('konekt/cms/image/directory');
      $imgdir = Konekt::helper('core')->ensurePath($imgdir, true, true)
               . lcfirst($entityName);
      $imgdir .= empty($group) ? '' : (DS . lcfirst($group));
      return Konekt::helper('core')->ensurePath($imgdir, false, true);
   }
   
   /**
    * Obtains the Image File type based on its first several bytes
    *
    * @param array|string $buffer The file data's first 32 bytes (at least)
    *
    * @return string The Image file type's extension (bmp, gif, jpg, png)
    */
   public function getImageType($buffer)
   {
   
	   if(strlen($buffer)>3 &&  ord($buffer[0])==0xff && ord($buffer[1])==0xd8 &&
	         ord($buffer[2])==0xff)
		   return "jpg";
		   
	   if(strlen($buffer)>8 &&  ord($buffer[0])==0x89 && ord($buffer[1])==0x50 &&
	         ord($buffer[2])==0x4e && ord($buffer[3])==0x47 && ord($buffer[4])==0x0d &&
	         ord($buffer[5])==0x0a && ord($buffer[6])==0x1a && ord($buffer[7])==0x0a)
		   return "png";
		   
	   if(strlen($buffer)>2 &&  $buffer[0]=='G' && $buffer[1]=='I' && $buffer[2]=='F')
		   return "gif";
		   
	   if(strlen($buffer)>1 && $buffer[0]=='B' && $buffer[1]=='M')
		   return "bmp";
		   
   }   
   
   /**
    * Returns the Image base file name based on it's real content and adds unique suffix
    *
    * @param string $filename The File name
    * @param string $originalname The original file name of the uploaded file
    *
    * @return string The generated file name
    */
    public function baseFileName($filename, $originalname)
    {
      $buf = file_get_contents($filename, false, null, -1, 32);
      $ext = $this->getImageType($buf);
      
      /* In case the extension could not be obtained use the original extension */
      $ext = empty($ext) ? Konekt::helper('core')->getFileExt($originalname, true) : $ext;
      
      return Konekt::helper('core')->getTreatedFileName(
               Konekt::helper('core')->getFileNameWithoutExt($originalname)."_".
         date('YmdHis').".".$ext);
    }

   /**
    * Returns the sizes of the images of a given entity[group]
    * 
    * @param string $entity The Name of the entity
    * @param string $group The entity group. Optional, defaults to null
    *
    * @return array the array with the appropriate image sizes
    */
   public function getResizeDimensions($entity, $group = NULL)
   {
      $groupcondition = empty($group) ? 'IS NULL' : "= \"$group\"";
      
      $result = Doctrine_Query::create()
                      ->select('*')
                      ->from('ImageEntityProperties p')
                      ->where("p.Entityname = \"$entity\"")
                      ->andWhere("p.Groupname $groupcondition")
                      ->execute()
                      ->toArray();
      /* Fall back to defaults in the configuration if none was stored in the db */
      if (!isset($result[0]) || empty($result[0]))
      {
         $result = array();
         $result['Mainwidthfull']       = (int) Konekt::app()->getConfigValue('konekt/cms/image/defaultWidth');
         $result['Mainheightfull']      = (int) Konekt::app()->getConfigValue('konekt/cms/image/defaultHeight');
         $result['Mainwidththumbnail']  = (int) Konekt::app()->getConfigValue('konekt/cms/image/defaultThumbnailWidth');
         $result['Mainheightthumbnail'] = (int) Konekt::app()->getConfigValue('konekt/cms/image/defaultThumbnailHeight');
         $result['Widthfull']           = $result['Mainwidthfull'];
         $result['Heightfull']          = $result['Mainheightfull'];
         $result['Widththumbnail']      = $result['Mainwidththumbnail'];
         $result['Heightthumbnail']     = $result['Mainheightthumbnail'];
      }
      else
      {
         $result = $result[0];
      }
      
      return $result;      
   }
   
   /**
    * Returns the Image width & height
    *
    * @param string $file The image file name
    *
    * @return array In the format array( w => <width>, h => <height> )
    */
   public function getImageSize($file)
   {
      $result = array('w' => 0, 'h' => 0);
      $buf = file_get_contents($file);
      if ($buf === false)
         return $result;
      if (!function_exists("imagecreatefromstring"))
         return $result;

      $image = imagecreatefromstring($buf);
      if (!$image)
         return $result;

      $result['w'] = imagesx($image);
      $result['h'] = imagesy($image);
      imagedestroy($image);
      
      return $result;
   }
   
   /**
    * Returns the (local) TimThumb URL
    *
    * @return string
    */
   protected function _getTimThumbUrl()
   {
      /** TODO: fix this: It definitely doesn't work with the new layout */
      return "http://{$_SERVER['SERVER_NAME']}/"
         . Konekt::APP_ROOT_DIR
         . "/"
         . Konekt::helper('core')->getMyPackage($this)
         . Konekt::LIB_ROOT_DIR
         . "/TimThumb/timthumb.php";
   }
   
   /**
    * Resizes an Image file & returns the resized image (buffer)
    *
    * @param string $file The file name
    * @param int $width The new image width
    * @param int $height The new image height
    *
    * @return string The resized image
    */
   public function getResizedImage($file, $width = NULL, $height = NULL)
   {
      /* !!! check for $width/$height 0 values should also be considered the same way as NULL
         (int) casting happens when obtaining images sizes!!!
       */
      $fileurl = strpos($file, Konekt::app()->getRootDir()) === 0 ? substr($file, strlen(Konekt::app()->getRootDir())) : $file;
      $w = empty($width) ? '' : "&w=$width";
      $h = empty($height)? '' : "&h=$height";
      return file_get_contents($this->_getTimThumbUrl()."?src=$fileurl$w$h&q=95&s=1");      
   }
   
   /**
    * Creates a resized image from an original image and copies it to the given folder.
    * If the directory of the target path doesn't exist it attempts to create it.
    *
    * @param string $srcfile The Source Image file (must exist)
    * @param string $dstfile The Destination Image file (will be created)
    * @param int $width The new image width
    * @param int $height The new image height
    *
    * @return bool Returns true on success false in case of failure
    */
   protected function _createAndCopyVariant($srcfile, $dstfile, $width = NULL, $height = NULL)
   {
      $img = $this->getResizedImage($srcfile, $width, $height);
      if (!empty($img))
      {
         $dstdir = dirname($dstfile);
         if (!is_dir($dstdir))
         {
            if (!mkdir($dstdir, 0777, true))
            {
               error_log("Konekt/Cms/Image: Could not create directory $dstdir");
               return false;
            }
         }
         file_put_contents($dstfile, $img);
      }
      else
      {
         error_log("Konekt/Cms/Image: The resized ($width x $height) image is empty. Source: $srcfile");
         return false;
      }
      
      return true;
   }
   
   /**
    * Checks whether the internal Image (Doctrine_Record derivative) is initialized and creates a new Instance if necessary
    *
    * @return bool True if record existed prior to the function call, false if it was initialized during the call
    */
   protected function _checkRecordInstance()
   {
      if (!$this->_image)
      {
         $this->_image = new Image();
         return false;
      }
      else
         return true;      
   }
   
   /**
    * Returns the class name of an entity (Doctrine_Record derivative)
    *
    * @param Doctrine_Record $entity
    *
    * @return string|null Returns the class name of the entity or null in case of the entity is not valid
    */
   protected function _getEntityClass($entity)
   {
      //Refuse the work if the entitiy is not a Doctrine Record
      if (!($entity instanceof Doctrine_Record))
         return NULL;

      return $entity->getTable()->getComponentName();
   }
   
   /**
    * Assigns the Image to an Entity.
    *
    * @param Doctrine_Record $entity
    *
    * @return Doctrine_Record The assignment record
    */
   protected function _assignToEntity($entity)
   {
      $entityName = $this->_getEntityClass($entity);
      if (!$entityName)
         return NULL;
         
      //Refuse the work if the underlying record is not initialized or isn't yet saved
      if (!$this->_image || !$this->_image->id)
         return NULL;
      
      $entry = new EntityImage();

      $entry->Image_id  = $this->_image->id;
      $entry->Entity_id = $entity->id;
      $entry->Entity    = $entityName;
      $entry->save();
      
      return $entry;
   }
   
   /**
    * Sets the current Image as the Main Image for an Entity.
    * As a convention the entity must have an int field `Image_id` (and point to Image.id of course)
    *
    * @param Doctrine_Record $entity
    *
    * @return bool Returns true if successfully assigned main image, false otherwise
    */
   protected function _setMainImage($entity)
   {
      //Refuse the work if the entitiy is not a Doctrine Record
      $entityClass = $this->_getEntityClass($entity);
      if (!$entityClass)
      {
         error_log("konekt/cms/image: $entity is not a valid Entity");
         return false;
      }
      
      //Refuse the work if the underlying record is not initialized or isn't yet saved
      if (!$this->_image || !$this->_image->id)
         return false;
      
      if (!$entity->getTable()->hasField("Image_id"))
      {
         error_log("konekt/cms/image: $entityClass does not have an Image_id field");
         return false;
      }
      $entity->Image_id = $this->_image->id;
      $entity->save();
      
      return true;   
   }
   
   /**
    * Creates an Image entry from an uploaded file and attaches it the entity,
    * resizes it accordingly, copies the file to the appropriate folder and
    * deletes the uploaded temp file
    *
    * @param string $tmpFile The uploaded temporary file name
    * @param string $originalFile The original file name of the uploaded file
    * @param Doctrine_Record $entity The entity to attach the Image to
    * @param string $group The Subgroup within the entity (also means separate subdirectory to put Image file to)
    * @param bool $isMainImage If true, then it will be set as an Entity Main Image and resized accordingly
    *
    * @return bool|Konekt_Image_Model_Image The added Entry, in case of failure returns false
    */
   public function createAndAttachToEntity($tmpFile, $originalFileName, $entity, $group = NULL, $isMainImage = false)
   {
      /* Obtain paths and filename */
      $entityClass = $this->_getEntityClass($entity);
      if (!$entityClass)
      {
         throw new Exception("konekt/cms/image: Could not create image, $entity is not a valid Entity");
         return null;
      }
      $relpath = $this->_getEntityDirectory($entityClass, $group);
      $fullpath = Konekt::helper('core')->fullPathRoot(
            Konekt::app()->getConfigValue('core/contentDir') . DS .
            $relpath);
            
      $cachedir = Konekt::helper('core')->fullPathVar(
         Konekt::app()->getConfigValue('core/cacheDir')
         );
      $filename = $this->baseFileName($tmpFile, $originalFileName);

      /* Move the uploaded file to the cache */
      $cachefile = $cachedir . DS . $filename;
      if (!move_uploaded_file($tmpFile, $cachefile))
      {
         throw new Exception("Could not move the uploaded file to $cachedir");
      }
      
      //get dimensions for images
      $sizes = $this->getResizeDimensions($entityClass, $group);     
      //Create Thumbnail
      $w = $isMainImage ? $sizes['Mainwidththumbnail']  : $sizes['Widththumbnail'];
      $h = $isMainImage ? $sizes['Mainheightthumbnail'] : $sizes['Heightthumbnail'];
      if (!$this->_createAndCopyVariant(
         $cachedir . DS . $filename,
         $fullpath . DS . self::THUMBNAIL_PREFIX . $filename, $w, $h
         ))
      {
         throw new Exception("Could not create thumbnail image ({$sizes['Widththumbnail']}x{$sizes['Heightthumbnail']}) ".
            self::THUMBNAIL_PREFIX . $filename);
      }
      //Create Resized image
      $w = $isMainImage ? $sizes['Mainwidthfull']  : $sizes['Widthfull'];
      $h = $isMainImage ? $sizes['Mainheightfull'] : $sizes['Heightfull'];
      if (!$this->_createAndCopyVariant(
         $cachedir . DS . $filename,
         $fullpath . DS . $filename, $w, $h
         ))
      {
         throw new Exception("Could not create resized image ({$sizes['Widthfull']}x{$sizes['Heightfull']}) ".
            $filename);
      }     
      //assign record values
      $this->_checkRecordInstance();
      $this->_image->Filename          = $relpath . $filename;
      $this->_image->ThumbnailFilename = $relpath . self::THUMBNAIL_PREFIX . $filename;
      $this->_image->save();
      
      if ($isMainImage)
         $this->_setMainImage($entity);
      else
         $this->_assignToEntity($entity);

      unset($cachefile);
      return $this;
   }

   public function getFilename()
   {
      return $this->_image ? $this->_image->Filename : NULL;
   }
   
   public function getThumbnailFilename()
   {
      return $this->_image ? $this->_image->ThumbnailFilename : NULL;
   }
   
   public function getRank()
   {
      return $this->_image ? $this->_image->Rank : NULL;
   }
   
   public function getTitle()
   {
      return $this->_image ? $this->_image->Title : NULL;
   }
   
   public function getDescription()
   {
      return $this->_image ? $this->_image->Description : NULL;
   }

   /* These should better be done internally only
   public function setFilename($value)
   {
      $this->_checkRecordInstance();
      $this->_image->Filename = $value;
      return $this;
   }
   
   public function setThumbnailFilename()
   {
      $this->_checkRecordInstance();
      $this->_image->ThumbnailFilename = $value;
      return $this;
   }
   */
   public function setRank()
   {
      $this->_checkRecordInstance();
      $this->_image->Rank = $value;
      return $this;
   }
   
   public function setTitle()
   {
      $this->_checkRecordInstance();
      $this->_image->Title = $value;
      return $this;
   }
   
   public function setDescription()
   {
      $this->_checkRecordInstance();
      $this->_image->Description = $value;
      return $this;
   }
   
   public function save()
   {
      if ($this->_checkRecordInstance())
      {
         $this->_image->save();
      }
      return $this;
   }

}

