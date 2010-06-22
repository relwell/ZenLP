<?php

/**
 * ZenLP_Element_Sentence 
 * An object-oriented way to treat sentence text
 * @author Robert Elwell
 *
 */

class ZenLP_Element_Sentence implements IteratorAggregate
{
    protected $_content = array();
    protected $_words = array();
    protected $_tags = array();
    protected $_separator;
    
    function __construct($textOrArray, $separator = ' ')
    {
        $this->setSeparator($separator);
        
        if (is_array($textOrArray)) {
            $this->__constructArray($textOrArray);
        } else if (is_string($textOrArray)) {
            $this->__constructString($textOrArray);
        }
    }
    
    function __toString()
    {
        return implode($this->_separator, $this->_content);
    }
    
    function getContent()
    {
        return $this->_content;
    }
    
    protected function __constructArray($arr) 
    {
        foreach ($arr as $word) {
            if (! $word instanceOf ZenLP_Element_Word) {
                throw new Exception('All elements in an array passed to ZenLP_Element_Sentence must '
                                   .' inherit from ZenLP_Element_Word');
            }
        }
        
        $this->_words = $arr; 
        $this->_content = array_merge($this->_content, $arr);
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
    
    function getWords()
    {
        return $this->_words;
    }
    
    function getIterator()
    {
        $arrayObject = new ArrayObject($this->_words);

        return $arrayObject->getIterator();
    }
    
    function setSeparator($separator)
    {
        if (!is_string($separator)) {
            throw new Exception('Separators must be strings');
        }
        
        $this->_separator = $separator;
    }
    
    function pushWord(ZenLP_Element_Word $word)
    {
        array_push($this->_words, $word);
    }
    
    function popWord()
    {
        return array_pop($this->_words);
    }
    
    function shiftWord()
    {
        return array_shift($this->_words);
    }
    
    function unshiftWord(ZenLP_Element_Word $word)
    {
        array_unshift($this->_words, $word);
    }
}