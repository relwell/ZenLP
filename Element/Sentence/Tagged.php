<?php

/**
 * Class for representing fully tagged sentences 
 * @author Robert Elwell
 *
 */

class ZenLP_Element_Sentence_Tagged extends ZenLP_Element_Sentence
{
    function __construct(Array $words)
    {
        foreach ($words as $word) 
        {
            if (! $word instanceOf ZenLP_Element_Word_Tagged) {
                throw new Exception('All words passed to ZenLP_Element_Sentence_Tagged must be an '
                                   .'instance of ZenLP_Element_Word_tagged');
            }
            
            $this->_words[] = $word;
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
        $str = '';
        foreach ($this->_words as $word) 
        {
            $str .= (string)$word;
        }
        return $str;
    }
}