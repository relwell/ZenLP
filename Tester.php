<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/usr/local/zend/share/ZendFramework/library');

require_once 'Zend/Loader/Autoloader.php';
require_once 'ZenLP.php';


$loader = Zend_Loader_Autoloader::getInstance();
$loader->setFallbackAutoloader(true);

$word = new ZenLP_Element_Word('dog');

$sentence = new ZenLP_Element_Sentence('The quick, brown fox jumped over the lazy dog.');

echo $sentence,"\n";