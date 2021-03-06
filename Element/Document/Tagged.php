<?php

class ZenLP_Element_Document_Tagged extends ZenLP_Element_Document
{
    function __construct(Array $sentences, $separator = '  ')
    {
        foreach ($sentences as $sentence) 
        {
            if (! $sentence instanceOf ZenLP_Element_Sentence_Tagged) {
                throw new Exception('All sentences passed to ZenLP_Element_Document_Tagged must be an '
                                   .'instance of ZenLP_Element_Sentence_Tagged');
            }
            
            $this->_sentences[] = $sentence;
        }
        
        $this->_separator = $separator;
    }
    
    function pushSentence(ZenLP_Element_Sentence_Tagged $sentence)
    {
        parent::pushSentence($sentence);
    }
    
    function unshiftSentence(ZenLP_Element_Sentence_Tagged $sentence)
    {
        parent::unshiftSentence($sentence);
    }
    
    function __toString()
    {
        return implode($this->_separator, $this->_sentences);
    }
}