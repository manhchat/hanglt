<?php
/**
 * Codedef.php
 *
 * @author	 ChatDM
 */

/**
 * Codedef function.
 *
 * @category   Common
 * @copyright  Copyright 2014 ChatDM
 * @author	 ChatDM
 */
final class Common_Codedef
{
	private static $_codedef = NULL;

	/**
	 *
	 * @param string $langRoute
	 * @param string $langDefault
	*/
	public static function init()
	{
		self::$_codedef = require (APPLICATION_PATH.DS.'configs'.DS.'common.codedef.php');
	}
		
	/**
	 * 
	 * @param string $key
	 * @return array | NULL
	 */
	public static function getID($key=NULL)
	{
		if (is_null(self::$_codedef)) {
			self::init();
		}
		
		if (isset(self::$_codedef[$key])) {
			return self::$_codedef[$key];
		}
		return NULL;
	}
	
	/**
	 * 
	 * @return array
	 */
	public static function getAll()
	{
		if (is_null(self::$_codedef)) {
			self::init();
		}
		
		return self::$_codedef;
	}
}