<?php

class ZenLP_Element_Document_Tagged extends ZenLP_Element_Document
{
    function __construct(Array $sentences)
    {
        foreach ($sentences as $sentence) 
        {
            if (! $sentence instanceOf ZenLP_Element_Sentence_Tagged) {
                throw new Exception('All sentences passed to ZenLP_Element_Document_Tagged must be an '
                                   .'instance of ZenLP_Element_Sentence_Tagged');
            }
            
            $this->_sentences[] = $sentences;
        }
    }
    
    function pushWord(ZenLP_Element_Word_Tagged $word)
    {
        parent::pushWord($word);
    }
    
    function unshiftWord(ZenLP_Element_Word_Tagged $word)
    {
        parent::unshiftWord($word);
    }
    
    function __toString()
    {
        return implode($this->_separator, $this->_words);
    }
}