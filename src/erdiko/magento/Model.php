<?php
/**
 * Magento Model
 * Every erdiko model that uses magento should inherit this class
 * 
 * @category  	erdiko
 * @package   	magento
 * @copyright 	Copyright (c) 2014, Arroyo Labs, http://www.arroyolabs.com
 * @author		John Arroyo, john@arroyolabs.com
 */
namespace erdiko\magento;
require_once __DIR__."/bootstrap.php";


class Model extends \erdiko\core\ModelAbstract
{
	protected $_storeId = null;
	public static $storeMapper = array(
			'1' => 'default'
		);

	public function __construct($storeId = 1)
	{
		$this->_storeId = $storeId;
		$this->bootstrap($this->_storeId);
	}

	/**
	 * Load Magento's bootstrap
	 * @param int $storeId
	 */
	public function bootstrap($storeId = 1)
	{
		if ( ! defined('IS_MAGENTO_ACTIVE'))
		{
			require_once MAGENTO_ROOT.'/app/Mage.php';
			\Mage::app( self::$storeMapper[$storeId] );
			// $resource = \Mage::getSingleton('core/resource');
			// error_log("mage: ".get_class($resource));
			define('IS_MAGENTO_ACTIVE', TRUE); // define var so we know Magento is loaded
		}
	}

	/**
	 * @todo implement this so that one can easily switch Magento's store context
	 */
	public function switchStore($storeId)
	{
		
	}
}