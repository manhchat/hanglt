<?php
/**
 * Message.php
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */

final class Raonhanh_Message
{
	private static $_msg = null;

	/**
	 *
	 * @param string $configPath
	 */
	public static function init($configPath)
	{
	    self::$_msg = require $configPath;
	}

	/**
	 *
	 * @param string $key
	 * @param array  $options
	 * @return string
	 */
	public static function get($key, $options = null)
	{
	    $msg = null;
	    if (isset(self::$_msg[$key])) {
	        if (is_null($options)) {
	            $msg = self::$_msg[$key];
	        } else {
	            $msg = vsprintf(self::$_msg[$key], $options);
	        }
	    }
	    return ($msg == null || $msg == '') ? $key : $msg;
	}
}