<?php

define('VDR', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR);
define('APP', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR);
define('CNF', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'cnf'.DIRECTORY_SEPARATOR);
define('PUB', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR);

require_once(VDR.'Autoloader.php');
require_once(CNF.'Cnf.php');
require_once(VDR.'blumanski/bang/PdoWrapper.php');


class PdoWrapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test plain queries
     */
    public function testQuery()
    {
    	$cnf = \BangConfig\Cnf::local(); // has no access anymore
    	$pdo = new \Bang\PdoWrapper($cnf);
    	
    	$query = "SELECT * FROM `bang_error_log` ORDER BY `logtime` DESC LIMIT 5 ";
    	
    	$this->assertArrayHasKey('0', $pdo->query($query, PDO::FETCH_ASSOC));
    	$this->assertArrayHasKey('0', $pdo->query($query, PDO::FETCH_OBJ));
    }
    
    /**
     * Test db result caching using redis
     */
    public function testRedisCacheTest()
    {
    	$cnf = \BangConfig\Cnf::local();
    	$pdo = new \Bang\PdoWrapper($cnf);
    	
    	$query = "SELECT * FROM `bang_error_log` ORDER BY `logtime` DESC LIMIT 10";
    	$pdo->prepare($query);
    	
    	// Nee to inject a key, add empty array first, all parameter binding should be done using
    	// bindValue, anyway, addign as array must still be an option....
    	$result = $pdo->execute(array(), $query);
    	
    	// If this exists already in cache, it will come back as an array
    	// Otehrwise we have to call fetchAssoc to get the fresh result.
    	if(!is_array($result)) {
    		
    		$result = $pdo->fetchAssocList($query, 10);
    	} 
    	
    	$this->assertArrayHasKey('0', $result);
    	
    }
    
    /**
     * Test select options
     */
    public function testSelect()
    {
    	$cnf = \BangConfig\Cnf::local();
    	$pdo = new \Bang\PdoWrapper($cnf);
    
    	$query = "SELECT * FROM `bang_error_log` ORDER BY `logtime` DESC LIMIT 5";
    	$pdo->prepare($query);
    	
    	$this->assertTrue($pdo->execute());
    	$this->assertArrayHasKey('id', $pdo->fetchAssoc());
    	
    	$pdo->execute();
    	$this->assertArrayHasKey('0', $pdo->fetchAssocList());
    	
    	$pdo->execute();
    	$this->assertArrayHasKey('0', $pdo->fetchObjectList());
    	
    	$pdo->execute();
    	$this->assertArrayHasKey('0', $pdo->fetchAll());
    	 
    	$pdo->execute(); 
    	$this->assertObjectHasAttribute('id', $pdo->fetchObject());
    }
   
}