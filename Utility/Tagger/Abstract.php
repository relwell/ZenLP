<?php

abstract class ZenLP_Utility_Tagger_Abstract
{
    protected $_source;
    protected $_words;
    protected $_sentences;
    protected $_taggedWords;
    protected $_taggedSentences;
    
    function tag()
    {
        if ($this->_sentences) {
            return $this->tagSentences;
        }
        
        return $this->tagWords();
    }
    
    abstract function tagSentences();
    abstract function tagWords();
    
    function setSource($source)
    {
        $this->_source = '';
        $this->appendSource($source);
    }

    function appendSource($source)
    {
        if (is_array($source)) {
            $this->appendSourceFromArray($source);
        }
        
        if (is_string($source)) {
            $this->appendSourceFromString($source);
        }
        
        if ($source instanceOf ZenLP_Element_Sentence && !$source instanceOf ZenLP_ELement_Sentence_Tagged) {
            $this->_sentences[] = $source;
            $this->appendSourceFromString((string)$source);
        }
        
        if ($source instanceOf ZenLP_Element_Word && !$source instanceOf ZenLP_ELement_Word_Tagged) {
            $this->appendSourceFromString((string)$source);
        }
        
        throw new Exception('Source must be text, array, or untagged element in ZenLP_Utility_Tagger instances');
    }
    
    function setSourceFromString($source)
    {
        $this->_words .= $source;
    }
    
    function setSourceFromArray($source)
    {
        $obj_set = false;
        foreach ($source as $item)
        {
            $this->appendSource($item);
        }
    }
    
}