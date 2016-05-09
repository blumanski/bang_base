<?php
/**
 * @author Oliver Blum <blumanski@gmail.com>
 * @date 2016-01-02
 *
 * Application access file, does a basic setup and triggers the application controller.
 */

Namespace Bang;

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
$loader->addNamespace('\Bang', VDR.'bang');

$app    = new \Bang\Controller($loader);

