<?php
/**
 * Message.php
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */


final class Common_Message
{
    private static $_msg = array();

    /**
     *
     * @param string $langRoute
     * @param string $langDefault
     */
    public static function init($langRoute='en', $langDefault=NULL)
    {
        self::$_msg = array();
        $fileDefault = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'message.' . $langDefault . '.php';
        $fileRoute = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'message.' . $langRoute . '.php';
        
        if (!is_null($langDefault) && file_exists($fileDefault)) {
            self::$_msg = require($fileDefault);
        }
        
        if (($langDefault != $langRoute) && file_exists($fileRoute)) {
            self::$_msg = array_merge(self::$_msg, require($fileRoute));
        }
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
    
    public static function getAll()
    {
        return self::$_msg;
    }
    
    public static function export($langRoute='en', $langDefault=NULL)
    {
        $lang = array();
        $fileDefault = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'message.' . $langDefault . '.php';
        $fileRoute = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'message.' . $langRoute . '.php';
         
        if (!is_null($langDefault) && file_exists($fileDefault)) {
            $lang = require($fileDefault);
        }
        
        if (($langDefault != $langRoute) && file_exists($fileRoute)) {
            $lang = array_merge($lang, require($fileRoute));
        }
        
        $fileExport = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR . 'message.' . $langRoute . '.bak.php';
        $str = "<?php\nreturn array(";
        $i = 0;
        foreach ($lang as $key=>$val) {
            if ($i%10 == 0) {
                $str.= "\n    // {$i}\n";
            }
            $str.= "    '{$key}' => '{$val}',\n";
            $i++;
        }
        $str.= ");";
        
        $fp = fopen($fileExport, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }
}