<?php
/**
 * Abstract.php contains the basic Comment Model Class
 *
 * @category    Konekt
 * @package     Cms
 * @subpackage  Comment
 * @copyright   Copyright (c) 2012 Attila Fulop
 * @author      Attila Fulop
 * @license     GNU LGPL v3 http://www.opensource.org/licenses/lgpl-3.0.html
 * @version     1 2012-07-28
 * @since       2012-07-28
 *
 */


/**
 * The common Abstract Comment model class for managing comments added to entitites
 *
 * @caegory    Konekt
 * @package    Cms
 * @subpackage Comment
 */
abstract class Konekt_Cms_Comment_Model_Abstract {
   
   
   /** @var string Value must be set in the constructor of the concrete class */
   protected $_parent_entity_name;
   
   /** @var Comment The internal underlying Doctrine_Record derived class instance */
   protected $_comment;
   
   /**
    * Checks whether the internal Comment (Doctrine_Record derivative) is initialized and
    * creates a new Instance if necessary.
    *
    * @return bool True if record existed prior to the function call, false if it was initialized during the call
    */
   private function _checkRecordInstance()
   {
      if (!$this->_comment)
      {
         $this->_comment = new Comment();
         $this->_comment->Entity = $this->_parent_entity_name;
         return false;
      }
      else
         return true;      
   }
   
   /**
    * Validates the instance before save
    *
    * @throws Exception
    * @return bool   Returns true on success
    */
   protected function _validate()
   {
      if (!is_int($this->getParentId())){
         throw new Exception('No Parent has been associated to this Comment');
      }
      
      return true;
   }
   

   /**
    * Returns the Parent Entity's id. It is protected because concrete classes should
    * wrap this with a more descriptive name. Eg.: if the concrete class is a comment
    * for pages then it should wrap in getPageId().
    * 
    * @return int
    */
   protected function getParentId()
   {
      return $this->_comment ? (int) $this->_comment->Parent_id : NULL;
   }
   
   
   /**
    * @return int
    */
   public function getUserId()
   {
      return $this->_comment ? $this->_comment->User_id : NULL;
   }
   
   
   public function getCreatedAt()
   {
      return $this->_comment ? $this->_comment->created_at : NULL;
   }
   
   
   public function getUpdatedAt()
   {
      return $this->_comment ? $this->_comment->updated_at : NULL;
   }
   
   
   /**
    * @return int
    */
   public function getId()
   {
      return $this->_comment ? $this->_comment->id : NULL;
   }
   
   
   /**
    * @return string
    */
   public function getName()
   {
      return $this->_comment ? $this->_comment->Name : NULL;
   }
   
   
   /**
    * @return string
    */
   public function getEmail()
   {
      return $this->_comment ? $this->_comment->Email : NULL;
   }
   
   
   /**
    * @return string
    */
   public function getUseragent()
   {
      return $this->_comment ? $this->_comment->Useragent : NULL;
   }
   
   
   /**
    * @return string
    */
   public function getContent()
   {
      return $this->_comment ? $this->_comment->Content : NULL;
   }
   
   /**
    * @return bool
    */
   public function getOnhold()
   {
      return $this->_comment ? $this->_comment->Onhold : NULL;
   }
   
   
   /**
    * @return bool
    */
   public function getPrivate()
   {
      return $this->_comment ? $this->_comment->Private : NULL;
   }
   
   
   /**
    * Sets the Parent Entity's id. It is protected because concrete classes should
    * wrap this with a more descriptive name. Eg.: if the concrete class is a comment
    * for pages then it should wrap in setPageId().
    * 
    * @return Konekt_Cms_Comment_Model_Abstract
    */
   protected function setParentId($value)
   {
      $this->_checkRecordInstance();
      $this->_comment->Parent_id = $value;
      return $this;
   }
   
   
   /**
    * @return Konekt_Cms_Comment_Model_Abstract
    */
   public function setUserId($value)
   {
      $this->_checkRecordInstance();
      $this->_comment->User_id = $value;
      return $this;
   }
   
   
   /**
    * @return Konekt_Cms_Comment_Model_Abstract
    */
   public function setName($value)
   {
      $this->_checkRecordInstance();
      $this->_comment->Name = $value;
      return $this;
   }
   
   
   /**
    * @return Konekt_Cms_Comment_Model_Abstract
    */
   public function setEmail($value)
   {
      $this->_checkRecordInstance();
      $this->_comment->Email = $value;
      return $this;
   }
   
   
   /**
    * @return Konekt_Cms_Comment_Model_Abstract
    */
   public function setUseragent($value)
   {
      $this->_checkRecordInstance();
      $this->_comment->Useragent = $value;
      return $this;
   }
   
   
   /**
    * @return Konekt_Cms_Comment_Model_Abstract
    */
   public function setContent($value)
   {
      $this->_checkRecordInstance();
      $this->_comment->Content = $value;
      return $this;
   }
   
   
   /**
    * @return Konekt_Cms_Comment_Model_Abstract
    */
   public function setOnhold($value)
   {
      $this->_checkRecordInstance();
      $this->_comment->Onhold = $value;
      return $this;
   }
   
   
   /**
    * @return Konekt_Cms_Comment_Model_Abstract
    */
   public function setPrivate($value)
   {
      $this->_checkRecordInstance();
      $this->_comment->Private = $value;
      return $this;
   }
   
   
   /**
    * Loads a Comment by its id
    *
    * @return Konekt_Cms_Comment_Model_Abstract|false  Returns the Instance or false if failed to load
    */
   public function load($id)
   {
      $this->_checkRecordInstance();
      if ($this->_comment->load($id)) {
         return $this;
      } else {
         return false;
      }
   }
   
   
   /**
    * Saves the changes to the storage database
    *
    * @return Konekt_Cms_Comment_Model_Abstract  Returns the self reference
    */
   public function save()
   {
      if ($this->_checkRecordInstance())
      {
         if ($this->_validate()) $this->_comment->save();
      }
      return $this;
   }
   
}
