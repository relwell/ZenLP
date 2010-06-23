<?php

class ZenLP_Element_Document
{
    protected $_content = array();
    protected $_words = array();
    protected $_sentences = array();
    protected $_separator;
    
    function __construct(Array $arr, $separator = '  ')
    {
        $this->_sentences = $arr;
        $this->setSeparator($separator);
        
        foreach ($arr as $sentence) 
        {
            if (!$sentence instanceOf ZenLP_Element_Sentence) {
                throw new Exception('All elements in an array passed to ZenLP_Element_Document must '
                                   .' inherit from ZenLP_Element_Sentence');
            }
            
            $this->_words = array_merge($this->_words, $sentence->getWords());
            $this->_content []= $sentence->getContent();
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
    
    function getIterator()
    {
        $arrayObject = new ArrayObject($this->_sentences);

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
    
    function pushSentence(ZenLP_Element_Sentence $sentence)
    {
        array_push($this->_sentences, $sentence);
    }
    
    function popSentence()
    {
        return array_pop($this->_sentences);
    }
    
    function shiftSentence()
    {
        return array_shift($this->_sentences);
    }
    
    function unshiftSentence(ZenLP_Element_Sentence $sentence)
    {
        array_unshift($this->_sentences, $sentence);
    }
    
}