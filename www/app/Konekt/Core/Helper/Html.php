<?php

class Konekt_Core_Helper_Html extends Konekt_Core_Helper_Abstract{
   
   /**
    * Returns the array of images and their attributes from an html code snippet
    *
    * @param string $htmlContent The html source
    *
    * @return array The retrieved array
    */
   public function getImages($htmlContent)
   {
      preg_match_all('/<img[^>]+>/i', $htmlContent, $result);
      
      $img = array();
      $i = 0;
      foreach( $result[0] as $img_tag)
      {
          preg_match_all('/(alt|title|src)=("[^"]*")/i',$img_tag, $img[$i]);
          $i++;
      }
      return $img;      
   }
   
   
}
