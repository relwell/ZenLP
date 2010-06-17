<?php

/**
 * ZenLP_Element_Sentence 
 * An object-oriented way to treat sentence text
 * @author Robert Elwell
 *
 */

class ZenLP_Element_Sentence
{
    protected $_content;
    protected $_words = array();
    
    function __construct($textOrArray)
    {
        if (is_array($textOrArray)) {
            $this->__constructArray($textOrArray);
        } else if (is_string($textOrArray)) {
            $this->__constructString($textOrArray);
        }
    }
    
    function __toString()
    {
        return $this->getContent();
    }
    
    function getContent()
    {
        return $this->_content;
    }
    
    protected function __constructArray($arr) 
    {
        $checker = array_walk($arr, 'is_a', 'ZenLP_Element_Word');
        if (in_array(false, $checker)) {
            throw new Exception('All elements in an array passed to ZenLP_Element_Sentence must inherit from ZenLP_Element_Word');
        }
        $this->_words = $arr;
        $this->_content = implode(' ', $this->_words);
        
    }
    
    protected function __constructString($text)
    {
        $this->_content = $text;
        // naive word splitting -- should revisit later, or address some other way
        foreach (preg_split('/\W+/', trim($text)) as $word)
        {
            if ($word != '') {
                $this->_words[] = new ZenLP_Element_Word($word);
            }
        }
    }
}