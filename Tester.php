<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/usr/local/zend/share/ZendFramework/library');

require_once 'Zend/Loader/Autoloader.php';
require_once 'ZenLP.php';


$loader = Zend_Loader_Autoloader::getInstance();
$loader->setFallbackAutoloader(true);

$sentence = "Once upon a time there was a very angry chicken.";

$output = ZenLP_Utility_Tagger::tagStatic($sentence, 'Naive');

echo new ZenLP_Element_Sentence_Tagged($output);