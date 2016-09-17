<?php

namespace FileSystem;

/**
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class Sanitize
{
    /**
     * List special characters.
     * 
     * @var array
     */
    private $from = array(
        'á','é','í','ó','ú','à','è','ì','ò','ù','ã','ẽ','ĩ','õ','ũ','â','ê','î','ô','û','ç',
        'Á','É','Í','Ó','Ú','À','È','Ì','Ò','Ù','Ã','Ẽ','Ĩ','Õ','Ũ','Â','Ê','Î','Ô','Û','Ç',
        ',','.',';',':','\\','/','{','}','[',']','()','"',"'",'<','>', 
        '!','@','#','$','%','¨','&','*',',','-','+','=',
        '~','^','´','`',
    );
    
    /**
     * Conversion list special characters
     * 
     * @var array
     */
    private $to = array(
        'a','e','i','o','u','a','e','i','o','u','a','e','i','o','u','a','e','i','o','u','c',
        'A','E','I','O','U','A','E','I','O','U','A','E','I','O','U','A','E','I','O','U','C',
        '','','','','','','','','','','','',"",'','','','','','','','','','',',','_','_','_',
        '','','','',
    );
    
    /**
     * Sanitize string.
     * 
     * Lowercase
     * Spaces to underscore
     * Specials Characters
     * 
     * @param string  $string
     * @param boolean $specialCharacters | DEFAULT TRUE
     * @param boolean $spaces            | DEFAULT TRUE
     * @param boolean $lowercas          | DEFAULT TRUE
     * 
     * @return string
     * 
     * @throws \Exception
     */
    public function sanitizeString($string, $specialCharacters = true, $spaces = true, $lowercase = true)
    {
        $string = trim($string);

        if(empty($string)){
            throw new \Exception('String can not be empty');
        }
        
        if($lowercase){
            $string = $this->stringTolower($string);
        }
        
        if($spaces){
            $string = $this->spacesToUnderscore($string);
        }
        
        if($specialCharacters){
            $string = $this->convertSpecialCharacters($string);
        }
        
        return $string;
    }
    
    /**
     * Convert string to lower
     * 
     * @param string $string
     * @return string
     */
    public function stringTolower($string)
    {
        return mb_strtolower($string);
    }
    
    /**
     * Convert space into underscore
     * 
     * @param string $string
     * @return string
     */
    public function spacesToUnderscore($string)
    {
        return str_replace(' ', '_', $string);
    }
    
    /**
     * Converts special characters in their letters without accent, and removes 
     * a list of special characters not allowed.
     * 
     * @param string $string
     * @return string
     */
    public function convertSpecialCharacters($string)
    {
        return  str_replace($this->from, $this->to, $string);
    }
}
