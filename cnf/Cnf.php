<?php
/**
 * @author Oliver Blum <blumanski@gmail.com>
 * @date 2016-01-02
 *
 * Application configuration file
 */

Namespace BangConfig;

class Cnf 
{
	const Env = 'local';
	
	public static function dev()
	{
		// I want this function only called from one specific method in the controller class
// 		$caller = debug_backtrace()[1]['class'].'\\'.debug_backtrace()[1]['function'];
	
// 		if($caller != 'Bang\Controller\prepareConfig') {
// 			return false;
// 		}
	
		return array(
	
				'database'      	=> array (
						'type'      	=> 'mysql',
						'suffix'    	=> 'suffix_',
						'host'      	=> 'localhost',
						'user'      	=> 'dbuser',
						'pass'      	=> 'dbpasswd',
						'name'     	 	=> 'dbname',
						'redis'  	    => true,
						'maxcachetime' 	=> 3600,
						'errorlog'  	=> true,
						'slowlog'   	=> false
				),
	
				'app'					=> array (
						'domain'		   	=> 'domain',
						'backendurl'	   	=> 'backendurl.com',
						'fronturl'	   	   	=> 'frontendurl.com',
						'senderemail'	   	=> 'noreply@frontend.com',
						'sendername'	   	=> 'Your Name',
						'websitename'	   	=> 'Website Name',
						'view'			   	=> 'web',
						'frontendview'		=> 'web',
						'defaultrouteback'	=> array('module' => 'account', 'controller' => 'index', 'action' => 'login'),
						'defaultroutefront'	=> array('module' => 'directory', 'controller' => 'index', 'action' => 'index'),
						'errorlog'		   	=> true,
						'errortimeout'	   	=> 20,
						'compresshtml'	   	=> true,
						'sessionlength'    	=> 36000,
						'passwordoptions'  	=> array('cost' => 12),
						'backendmaintpl'    => 'default', // will be moved to db config later
						'frontmaintpl'    	=> 'defaul', // will be moved to db config later
						'frontindexfile'	=> 'index.php',
						'language'         	=> 'en_EN',
						'languageavailable' => ['es_ES', 'en_EN', 'de_DE', 'fr_FR'],
						'timezone'         	=> 'Australia/Brisbane',
						'sessionhandler'   	=> 'redis', // leave empty for normal php session
						'ipinfodbapi'	   	=> 'yourecode'
				),
				
				'pusher'			=> array (
	        			'appid'			=> '0000',
	        			'key'			=> '00000',
	        			'secret'		=> '00000000',
	        			'cluster'		=> 'eu',
	        			'encrypted'		=> true,
	        			'mainchannel'	=> 'general',
	        			'chatchannel'	=> 'chat'
	        	),
        		
				
				'awss3'				=> array (
						's3key'			=> '9999999999',
						'secret'		=> '000000',
						'region'		=> 'eu-central-1',
						'subfolder'		=> 'subfoldername',
						'bucket'		=> 'bucketname',
						'host'			=> 'https://s3.........'
				),
	
				'langwhitelist'			=> array (
						'de' => 'de_DE',
						'en' => 'en_EN',
						'es' => 'es_ES',
						'fr' => 'fr_FR'
				),
	
				'recaptcha'          => array(
						'sitekey'       => 'yourcode',
						'secretkey'     => 'yoursecret'
				),
	
				'mailer'			=> array(
						'host'			=> 'smtp.mailgun.org',
						'port'			=> 25,
						'username'		=> 'postmaster@youredomainds.com',
						'password'		=> '9888888',
						'api-key'		=> '000000000000' // optional
				),
	
				'sessionredis'      => array(
						'hosts'         => '127.0.0.1',
						'port'          => 6379,
						'auth'          => '0000000',
						'prefix'        => 'PHPSESS'
				),
				
				'dbredis'      => array(
						'hosts'         => '127.0.0.1',
						'port'          => 6379,
						'auth'          => '000000000',
						'prefix'        => 'pdo_'
				)
		);
	}
	
    public static function local()
    {
        // I want this function only called from one specific method in the controller class
//         $caller = debug_backtrace()[1]['class'].'\\'.debug_backtrace()[1]['function'];
        
//         if($caller != 'Bang\Controller\prepareConfig') {
//             return false;
//         }
        
        return array(
            
            'database'      	=> array (
						'type'      	=> 'mysql',
						'suffix'    	=> 'suffix_',
						'host'      	=> 'localhost',
						'user'      	=> 'dbuser',
						'pass'      	=> 'dbpasswd',
						'name'     	 	=> 'dbname',
						'redis'  	    => true,
						'maxcachetime' 	=> 3600,
						'errorlog'  	=> true,
						'slowlog'   	=> false
				),
	
				'app'					=> array (
						'domain'		   	=> 'domain',
						'backendurl'	   	=> 'backendurl.com',
						'fronturl'	   	   	=> 'frontendurl.com',
						'senderemail'	   	=> 'noreply@frontend.com',
						'sendername'	   	=> 'Your Name',
						'websitename'	   	=> 'Website Name',
						'view'			   	=> 'web',
						'frontendview'		=> 'web',
						'defaultrouteback'	=> array('module' => 'account', 'controller' => 'index', 'action' => 'login'),
						'defaultroutefront'	=> array('module' => 'directory', 'controller' => 'index', 'action' => 'index'),
						'errorlog'		   	=> true,
						'errortimeout'	   	=> 20,
						'compresshtml'	   	=> true,
						'sessionlength'    	=> 36000,
						'passwordoptions'  	=> array('cost' => 12),
						'backendmaintpl'    => 'default', // will be moved to db config later
						'frontmaintpl'    	=> 'defaul', // will be moved to db config later
						'frontindexfile'	=> 'index.php',
						'language'         	=> 'en_EN',
						'languageavailable' => ['es_ES', 'en_EN', 'de_DE', 'fr_FR'],
						'timezone'         	=> 'Australia/Brisbane',
						'sessionhandler'   	=> 'redis', // leave empty for normal php session
						'ipinfodbapi'	   	=> 'yourecode'
				),
				
				'pusher'			=> array (
	        			'appid'			=> '0000',
	        			'key'			=> '00000',
	        			'secret'		=> '00000000',
	        			'cluster'		=> 'eu',
	        			'encrypted'		=> true,
	        			'mainchannel'	=> 'general',
	        			'chatchannel'	=> 'chat'
	        	),
        		
				
				'awss3'				=> array (
						's3key'			=> '9999999999',
						'secret'		=> '000000',
						'region'		=> 'eu-central-1',
						'subfolder'		=> 'subfoldername',
						'bucket'		=> 'bucketname',
						'host'			=> 'https://s3.........'
				),
	
				'langwhitelist'			=> array (
						'de' => 'de_DE',
						'en' => 'en_EN',
						'es' => 'es_ES',
						'fr' => 'fr_FR'
				),
	
				'recaptcha'          => array(
						'sitekey'       => 'yourcode',
						'secretkey'     => 'yoursecret'
				),
	
				'mailer'			=> array(
						'host'			=> 'smtp.mailgun.org',
						'port'			=> 25,
						'username'		=> 'postmaster@youredomainds.com',
						'password'		=> '9888888',
						'api-key'		=> '000000000000' // optional
				),
	
				'sessionredis'      => array(
						'hosts'         => '127.0.0.1',
						'port'          => 6379,
						'auth'          => '0000000',
						'prefix'        => 'PHPSESS'
				),
				
				'dbredis'      => array(
						'hosts'         => '127.0.0.1',
						'port'          => 6379,
						'auth'          => '000000000',
						'prefix'        => 'pdo_'
				)
		);
    }
}
