<?php
/**
 * Magento bootstrap
 * Assumes Magento is installed in the lib folder, e.g. /lib/magento
 * 
 * @category  	erdiko
 * @package   	magento
 * @copyright 	Copyright (c) 2014, Arroyo Labs, http://www.arroyolabs.com
 * @author		John Arroyo, john@arroyolabs.com
 */

// Set the working directory and required Drupal 7 server variables
define('MAGENTO_ROOT', ROOT.'/lib/magento');

// Request uri is not set on the command line
if(!isset($_SERVER['REQUEST_URI'])){
	$_SERVER['REQUEST_URI'] = '/';
}

// Set PATH_INFO variable if it is not set
if (!isset($_SERVER['PATH_INFO'])) {
        $_SERVER['PATH_INFO'] = preg_replace('/\/index.php/','',$_SERVER['REQUEST_URI'],1);
		$_SERVER['PATH_INFO'] = preg_replace('/\?(.)*$/','',$_SERVER['PATH_INFO'],1);
}
