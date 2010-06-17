<?php

/**
 * ZenLP_Element_Word_Tagged
 * A class to represent tagged words
 * @author Robert Elwell
 *
 */

class ZenLP_Element_Word_Tagged extends ZenLP_Element_Word
{
    // variable for representing POS tag  
    protected $_tag;
    protected $_separator = '_';
    protected $_representationOrder = array('_content', '_tag');
    
    public function __construct($content, $tag, $reversedOrder = false)
    {
        // require tagged word to be constructed with strings
        if (!is_string($content) || !is_string($tag))  {
            throw new Exception('ZenLP_ELement_Word_Tagged requires both parameters to be strings');
        }
        
        if ($content == '' || $tag == '') {
            throw new Exception('ZenLP_ELement_Word_Tagged requires values for both parameters');
        }
        
        parent::__construct($content);
        
        $this->_tag = $tag;
        
        if ($reversedOrder) {
            $this->setTagFirst();
        }
    }
    
    public function __toString()
    {
        return $this->{$this->_representationOrder[0]}.$this->_separator.$this->{$this->_representationOrder[1]};
    }
    
    public function setSeparator($separator)
    {
        if (!is_string($separator)) {
            throw new Exception('ZenLP_ELement_Word_Tagged::setSeparator() requires a string argument');
        }
        $this->_separator = $separator;
    }
    
    public function setTagFirst()
    {
        $this->_representationOrder = array('_tag', '_content');
    }
    
    public function setContentFirst()
    {
        $this->_representationOrder = array('_content', '_tag');
    }
   
}