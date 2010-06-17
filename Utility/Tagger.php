<?php

/**
 * Static utilities for tagging
 * @author Robert Elwell
 *
 */

class ZenLP_Utility_Tagger
{
    static function tagStatic($source, $className)
    {
        if (!class_exists($className, 1)) {
            throw new Exception("No class by name of {$className} to call in ".get_class(self));
        }
        
        $tagger = new $className();
        $tagger->setSource($source);
        return $tagger->tag();
    }
    
    static function tagWordsStatic($source, $className)
    {
        if (!class_exists($className, 1)) {
            throw new Exception("No class by name of {$className} to call in ".get_class(self));
        }
        
        $tagger = new $className();
        $tagger->setSource($source);
        return $tagger->tagWords();
    }
    
    static function tagSentencesStatic($source, $className)
    {
        if (!class_exists($className, 1)) {
            throw new Exception("No class by name of {$className} to call in ".get_class(self));
        }
        
        $tagger = new $className();
        $tagger->setSource($source);
        return $tagger->tagSentences();
    }
}