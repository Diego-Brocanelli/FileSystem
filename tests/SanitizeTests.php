<?php

require_once __DIR__.'/../vendor/autoload.php';

use FileSystem\Sanitize;
use PHPUnit\Framework\TestCase;

/**
 * Description of SanitizeTeste
 *
 * @author Diego Brocanelli <contato@diegobrocanelli.com.br>
 */
class SanitizeTests extends TestCase
{
    private $sanitize;
    
    public function setUp()
    {
        $this->sanitize = new Sanitize();
    }
    
    public function testStringToLowerMethod()
    {
        $string = 'LoWeRcAsEsTrInG';
        
        $this->assertEquals('lowercasestring', $this->sanitize->stringTolower($string));
    }
    
    public function testStringToLowerSanitizeMethod()
    {
        $string = 'LoWeRcAsEsTrInG';
        
        $this->assertEquals('lowercasestring', $this->sanitize->sanitizeString($string));
    }
    
    public function testSpaceToUnderscoreMethod()
    {
        $string = 'space to underscore';
        
        $this->assertEquals('space_to_underscore', $this->sanitize->spacesToUnderscore($string));
    }
    
    public function testRemoveSpecialCharactresMethod()
    {
        $string = 'áèíÓÁẼãç';
        
        $this->assertEquals('aeiOAEac', $this->sanitize->convertSpecialCharacters($string));
    }
    
    public function testNotSanitizeSpecialCharacter()
    {
        $string = 'áèíÓÁẼãç';
        
        $this->assertEquals('áèíóáẽãç', $this->sanitize->sanitizeString($string, false ) );
    }
    
    public function testNotSanitizeSpaces()
    {
        $string = 'String Continue';
        
        $this->assertEquals('string continue', $this->sanitize->sanitizeString($string, true, false ) );
    }
    
    public function testNotSanitizeLowercase()
    {
        $string = 'CamelCase';
        
        $this->assertEquals('CamelCase', $this->sanitize->sanitizeString($string, true, true, false ) );
    }
    
    /**
     * @expectedException \Exception
     * @expectedExceptionMessage String can not be empty
     */
    public function testEmptyString()
    {
        $this->sanitize->sanitizeString('');
    }
}
