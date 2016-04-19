<?php
/**
 * Log.php
 */

/**
 *
 * @category   Raonhanh
 * @author ChatDM
 */
class Raonhanh_Log
{
    /**
     * @var Zend_Log
     */
    private static $_logger = null;

    /**
     *
     * @param string $path
     * @param string $filename
     * @param int $level
     * @return void
     * @throws Exception
     */
    public static function init($path, $filename, $level)
    {
        $date_format = array(
            '[YYYY]'=> date('Y'),
            '[MM]' => date('m'),
            '[N]' => self::getWeeks(),
        );
        $filename = strtr($filename, $date_format);

        $stream = @fopen($path . DIRECTORY_SEPARATOR . $filename, 'a', false);
        if (!$stream) {
            throw new Exception('Opening of the stream went wrong.');
        }

        $logWriter = new Zend_Log_Writer_Stream($stream);
        $logFilter = new Zend_Log_Filter_Priority($level);
        $logWriter->addFilter($logFilter);

        $zendLogFormatter = new Zend_Log_Formatter_Simple("[%timestamp%][%priorityName%] %message%" . PHP_EOL);
        $logWriter->setFormatter($zendLogFormatter);

        self::$_logger = new Zend_Log();
        self::$_logger->addWriter($logWriter);
    }

    /**
     *
     * @param string $msg
     * @return void
     */
    public static function debug($msg)
    {
        self::write(debug_backtrace(), $msg, Zend_Log::DEBUG);
    }

    /**
     *
     * @param string $msg
     * @return void
     */
    public static function info($msg)
    {
        self::write(debug_backtrace(), $msg, Zend_Log::INFO);
    }

    /**
     *
     * @param string|Exception $msg
     * @return void
     */
    public static function error($msg)
    {
        if (is_object($msg) && ($msg instanceof Exception)) {
            $msg = $msg->getMessage() . PHP_EOL . $msg->getTraceAsString();
        }
        self::write(debug_backtrace(), $msg, Zend_Log::ERR);
    }

    /**
     *
     * @param array $backtraces
     * @param string $msg
     * @param int $level
     * @return void
     */
    private static function write($backtraces, $msg, $level)
    {
        if (self::$_logger != null) {
            $output = $backtraces[1]['class'].".".$backtraces[1]['function']." (".$backtraces[0]['line'].") ";
            $output .= $msg;
            $output = mb_convert_encoding($output, 'UTF-8', 'auto');
            self::$_logger->log($output, $level);
        }
    }

    /**
     *
     * @return int
     */
    private static function getWeeks()
    {
        $timestamp = time();
        $maxday    = date("t",$timestamp);
        $thismonth = getdate($timestamp);
        $timeStamp = mktime(0,0,0,$thismonth['mon'],1,$thismonth['year']);
        $startday  = date('w',$timeStamp);
        $day = $thismonth['mday'];
        $weeks = 0;
        $week_num = 0;
        for ($i=0; $i<($maxday+$startday); $i++) {
            if(($i % 7) == 0){
                $weeks++;
            }
            if($day == ($i - $startday + 1)){
                $week_num = $weeks;
            }
        }
        return $week_num;
    }
}
