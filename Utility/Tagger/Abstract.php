<?php

abstract class ZenLP_Utility_Tagger_Abstract
{
    protected $_source;
    protected $_words;
    protected $_sentences;
    protected $_taggedWords;
    protected $_taggedSentences;
    protected $_separator = ' ';
    
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
            return;
        }
        
        if (is_string($source)) {
            $this->appendSourceFromString($source);
            return;
        }
        
        if ($source instanceOf ZenLP_Element_Sentence && !$source instanceOf ZenLP_ELement_Sentence_Tagged) {
            $this->_sentences[] = $source;
            foreach ($source as $word) 
            {
                $this->_words[] = $source;
                $this->appendSourceFromString((string)$source, false);
            }
            return;
        }
        
        if ($source instanceOf ZenLP_Element_Word && !$source instanceOf ZenLP_ELement_Word_Tagged) {
            $this->_words[] = $source;
            $this->appendSourceFromString((string)$source, false);
            return;
        }
        
        throw new Exception('Source must be text, array, or untagged element in ZenLP_Utility_Tagger instances');
    }
    
    function appendSourceFromString($source, $addWord = true)
    {
        $this->_source .= $source;
        if ($addWord) {
            foreach (explode($this->_separator, $source) as $word)
            {
                $this->_words[] = new ZenLP_Element_Word($word);
            }
        }
    }
    
    function appendSourceFromArray($source)
    {
        $obj_set = false;
        foreach ($source as $item)
        {
            $this->appendSource($item);
        }
    }
    
    function setSeparator($separator)
    {
        if (!is_string($separator)) {
            throw new Exception("Separators must be strings!");
        }
        $this->_separator = $separator;
    }
    
}