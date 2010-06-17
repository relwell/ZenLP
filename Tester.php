<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/usr/local/zend/share/ZendFramework/library');

require_once 'Zend/Loader/Autoloader.php';
require_once 'ZenLP.php';


$loader = Zend_Loader_Autoloader::getInstance();
$loader->setFallbackAutoloader(true);

$tagged = new ZeNLP_Element_Word_Tagged('Dog', 'N');
echo $tagged,"\n";