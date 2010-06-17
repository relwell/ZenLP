<?php
/**
 * Static utilities for tagging
 * @author Robert Elwell
 *
 */

require_once 'Utility/Tagger/Abstract.php';
require_once 'Utility/Tagger/Naive.php';

class ZenLP_Utility_Tagger
{
    static function tagStatic($source, $terminalClassName)
    {
        if (!$terminalClassName) {
            throw new Exception("Class name must be provided as second argument in ".get_class(self));
        }
        $className = 'ZenLP_Utility_Tagger_'.$terminalClassName;
        
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