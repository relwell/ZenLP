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
        foreach ($word as $word) 
        {
            if (! $word instanceOf ZenLP_Element_Word_Tagged) {
                throw new Exception('All words passed to ZenLP_Element_Sentence_Tagged must be an instance of ZenLP_Element_Word_tagged');
            }
        }
    }
}