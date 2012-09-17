<?php
/**
 * Default.php contains the implementation of the Default Comment helper class
 *
 *
 * @category    Konekt
 * @package     Cms
 * @subpackage  Comment
 * @copyright   Copyright (c) 2011 - 2012 Attila Fülöp
 * @author      Attila Fülöp
 * @license     GNU LGPL v3 http://www.opensource.org/licenses/lgpl-3.0.html
 * @version     1 2012-09-15
 * @since       2012-09-15
 *
 */


class Konekt_Cms_Comment_Helper_Default extends Konekt_Framework_Core_Helper_Abstract
{
   /**
    * Returns the comments associated with an entity
    *
    * @param   string   $entity  The name (type) of the entity
    * @param   int      $id      The id of the entity
    *
    * @return  array
    */
   public function getEntityComments($entity, $id)
   {
      $comments = Doctrine_Query::create()
         ->select('c.*, MD5(LOWER(c.Email)) AS EmailMd5')
         ->from('Comment c')
         ->where('c.Parent_id = ? and c.Entity = ?')
         ->execute(array("$id", "Issue"));
         
      return $comments->toArray();
   }
   
   
   /**
    * Returns the comment count of an entity
    *
    * @param   string   $entity  The name (type) of the entity
    * @param   int      $id      The id of the entity
    *
    * @return int
    */
   public function getEntityCommentCount($entity, $id)
   {
      $comments = Doctrine_Query::create()
         ->select('id')
         ->from('Comment c')
         ->where('c.Parent_id = ? and c.Entity = ?', array($id, $entity));
         
      return $comments->count();
   }

}
