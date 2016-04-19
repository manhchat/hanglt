<?php
/**
 * Session.php
 */

/**
 *
 * @category   raonhanh
 * @package    raonhanh
 * @author     ChatDM
 */
class Raonhanh_Session
{
    const LOGIN_IDENTITY = 'Raonhanh_Session.LOGIN_IDENTITY';

    const CACHE_INPUT = 'Raonhanh_Session.CACHE_INPUT';

    const PAGE_MESSAGE = 'Raonhanh_Session.PAGE_MESSAGE';

    const SESSION_TOKEN = 'Raonhanh_Session.SESSION_TOKEN';


	private static $_options;


	/**
	 *
	 * @return void
	 */
	public static function init($options)
	{
		Zend_Session::start();

		$session = new Zend_Session_Namespace($options['Namespace']);
		$session->setExpirationSeconds($options['ExpirationSeconds']);


		self::$_options = $options;
	}

	/**
	 *
	 * @return void
	 */
	public static function setByHops($sessionKey, $value, $counts)
	{
	    $session = new Zend_Session_Namespace(self::$_options['Namespace']);
	    $session->setExpirationHops($counts, $sessionKey);
	    $session->$sessionKey = $value;
	}

	/**
	 *
	 * @return mixed
	 */
	public static function get($sessionKey, $default = null)
	{
		$session = new Zend_Session_Namespace(self::$_options['Namespace']);
		return isset($session->$sessionKey) ? $session->$sessionKey : $default;
	}

	/**
	 *
	 * @return void
	 */
	public static function set($sessionKey, $value)
	{
		$session = new Zend_Session_Namespace(self::$_options['Namespace']);
		$session->$sessionKey = $value;
	}

	/**
	 */
	public static function exists($sessionKey)
	{
		$session = new Zend_Session_Namespace(self::$_options['Namespace']);
		return isset($session->$sessionKey);
	}

	/**
	 */
	public static function remove($sessionKey)
	{
		$session = new Zend_Session_Namespace(self::$_options['Namespace']);
		if (isset($session->$sessionKey)) {
			unset($session->$sessionKey);
			return true;
		}
		return false;
	}

	/**
	 *
	 * @return void
	 */
	public static function updateExpirationSeconds($sec)
	{
	    $session = new Zend_Session_Namespace(self::$_options['Namespace']);
	    $session->setExpirationSeconds($sec);
	}

	/**
	 * @return void
	 */
	public static function cacheInput($input, $counts=null)
	{
	    if (!is_null($counts)) {
    		self::setByHops(self::CACHE_INPUT, $input, $counts);
	    } else {
	        self::set(self::CACHE_INPUT, $input);
	    }
	}

	/**
	 *
	 * @return string
	 */
	public static function getCacheInput()
	{
		return self::get(self::CACHE_INPUT);
	}

	/**
	 * @return void
	 */
	public static function removeCacheInput()
	{
		self::remove(self::CACHE_INPUT);
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	public static function getCacheParam($name)
	{
	    $data = self::getCacheInput();
	    return isset($data[$name]) ? $data[$name] : '';
	}
}
