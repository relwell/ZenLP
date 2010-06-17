<?php

  /**
   * ZenLP_Element_Word
   * A class to interact with words
   * @author Robert Elwell
   **/

class ZenLP_Element_Word
{
    // the content of the word
    protected $_content;
    // fingerprint of word for statistical purposes
    protected $_signature;
    
    /**
     * Constructor class for a single word  
     * @param $text
     */
    function __construct($text)
    {
        if ((string) $text === '') {
            throw new Exception('ZenLP_Element_Word requires textual content');
        }
        
        if (substr_count($text, ' ')) {
            throw new Exception('ZenLP_Element_Word does not operate over spaces');
        }
        
        $this->_content = $text;
        $this->_signature = md5(strtolower($text));
    }
    
    /**
     * Show just the word
     * @return string
     */
    
    function __toString()
    {
        return $this->_content;
    }
    
}