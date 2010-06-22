<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/usr/local/zend/share/ZendFramework/library');

require_once 'Zend/Loader/Autoloader.php';
require_once 'ZenLP.php';


$loader = Zend_Loader_Autoloader::getInstance();
$loader->setFallbackAutoloader(true);

$sentenceA = new ZenLP_Element_Sentence("Once upon a time there was a very angry chicken.");
$sentenceB = new ZenLP_Element_Sentence("That chicken was a huge jerk.");

$doc = new ZenLP_Element_Document(array($sentenceA, $sentenceB), "\n");

echo $doc."\n";