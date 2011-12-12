<?php

/**
 * Extended Inflector for replacing accented characters to their unaccented variant
 *
 *
 */

class Konekt_Blog_Model_Inflector extends Doctrine_Inflector
{   
    /**
     * Remove any illegal characters, accents, etc.
     * Borrowed from Doctrine_Inflector
     *
     * @param  string $string  String to unaccent 
     * @return string $string  Unaccented string
     */
    public static function unaccent($string)
    {
      if ( ! preg_match('/[\x80-\xff]/', $string) ) {
      		return $string;
  		}

      if (self::seemsUtf8($string)) {
        $chars = array(
        // Decompositions for german umlauts
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
				'Ş' => 'S', 'ţ' => 't', 'Ţ' => 'T');
        
        $string = strtr($string, $chars);
      } else {
        // Assume ISO-8859-1 if not UTF-8
        $doubleChars['in'] = array(chr(196), chr(214), chr(220), chr(228), chr(246), chr(252));
        $doubleChars['out'] = array('A', 'O', 'U', 'a', 'o', 'u', 'O', 'o', 'A', 'DH', 'TH', 'ss', 'a', 'dh', 'th');
        $string = str_replace($doubleChars['in'], $doubleChars['out'], $string);
      }

      return parent::unaccent( $string );
    }

    public static function urlize($text)
    {
        // Remove all non url friendly characters with the unaccent function
        $text = self::unaccent($text);
        
        return parent::urlize($text);
    }

}

/**

*/
 
