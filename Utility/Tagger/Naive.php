<?php

/**
 * Most naive tagger -- make them all nouns!
 * @author Robert Elwell
 *
 */

class ZenLP_Utility_Tagger_Naive extends ZenLP_Utility_Tagger_Abstract
{
    protected $_naiveTag = 'N';
    
    function tagWords()
    {
        if ($this->_taggedWords && count($this->_taggedWords) == count($this->_words)) {
            return $this->_taggedWords;
        } 
        
        // this will also work to create a new set of tagged words if we feed the same tagger another source
        $this->_taggedWords = array();
        
        if (empty($this->_words)) {
            throw new Exception(get_class($this).' is being asked to tag nothing');
        }
        
        foreach ($this->_words as $word)
        {
            $this->_taggedWords[] = new ZenLP_Element_Word_Tagged($word->getContent(), $this->_naiveTag);
        }
        
        return $this->_taggedWords;
    }
    
    function tagSentences()
    {
        if ($this->_taggedSentences && count($this->_taggedSentences) == count($this->_sentences)) {
            return $this->_taggedSentences;
        } 
        
        // this will also work to create a new set of tagged words if we feed the same tagger another source
        $this->_taggedSentences = array();
        
        if (empty($this->_sentences)) {
            throw new Exception(get_class($this).' is being asked to tag nothing');
        }
        
        foreach ($this->_sentences as $sentence)
        {
            $sent = array();
            foreach ($sentence as $word) 
            {
                $sent[] = new ZenLP_Element_Word_Tagged($word->getContent(), $this->_naiveTag);
            }
            $this->_taggedSentences[] = $sent;
        }
        
        return $this->_taggedSentences;
    }
}