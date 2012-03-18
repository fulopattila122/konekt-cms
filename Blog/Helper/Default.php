<?php

class Konekt_Cms_Blog_Helper_Default extends Konekt_Framework_Core_Helper_Abstract
{

   /**
    * Returns the Blogpost Content's Excerpt part
    *
    * @param string $content The raw blogpost content
    *
    * @return string The Part of the content before <!--more-->
    */
   public function getExcerpt($content)
   {
       $res = explode('<!--more-->', $content);
       return $res[0];
   }
   
   /**
    * Returns the Blogpost Content's without the excerpt part
    *
    * @param string $content The raw blogpost content
    *
    * @return string The Part of the content after <!--more-->
    */
   public function dropExcerpt($content)
   {
      $res = explode('<!--more-->', $content);
      $arrSize = sizeof($res);
      switch ($arrSize) {
      
      case 0:
         return $content;
         break;
         
      case 1:
         return $res[0];
         break;
         
      default:
         $result = '';
         for ($i = 1; $i < $arrSize; $i++) {
            $result .= $res[$i];
         }
         return $result;
         break;
      }
   }

}
