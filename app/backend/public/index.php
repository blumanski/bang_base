<?php
/**
 * @author Oliver Blum <blumanski@gmail.com>
 * @date 2016-01-02
 *
 * Application access file, does a basic setup and triggers the application controller.
 */

Namespace Bang;

//$before = microtime(true);

header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

define('VDR', dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR);
define('APP', dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR);
define('CNF', dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR.'cnf'.DIRECTORY_SEPARATOR);
define('PUB', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('PROT', 'https://');

require_once(VDR.'autoload.php');
// because of the split between frontend and backend i use an internal 
// autoloader as I want load to load modules at runtime
require_once(VDR.'Autoloader.php');

$loader = new \Loader\Autoloader;

// register the autoloader
$loader->register();
$loader->addNamespace('\BangConfig', CNF);
$loader->addNamespace('\Bang', VDR.'blumanski/bang');
$loader->addNamespace('\Bang\Tools\\', VDR.'blumanski/bang/tools');

$app    = new \Bang\Controller($loader);

//$after = microtime(true);
exit();
//echo ($after-$before) . " sec";