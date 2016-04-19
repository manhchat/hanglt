<?php
/**
 * Debug.php
 *
 * @copyright  Copyright 2013 MICROWAVE CO.,LTD. (http://www.micro-wave.net/)
 * @author     MICROWAVE
 */

/**
 * Debug object of models
 * 
 *
 * @category   Mw
 * @package    Mw
 * @copyright  Copyright 2013 MICROWAVE CO.,LTD. (http://www.micro-wave.net/)
 * @author     MICROWAVE
 * @since      2013/09/17
 */
final class Common_Debug
{
    private static $_sql = array();
    
    /**
     * push query to debuging
     * 
     * @param Zend_Db_Profiler_Query $obj
     * @return NULL
     */
    public static function push(Zend_Db_Profiler_Query $obj, $time_run=0)
    {
        if (!defined('IS_DEBUG') || IS_DEBUG == FALSE) {
            return NULL;
        }
        $query = $obj->getQuery();
        $params = $obj->getQueryParams();
        foreach ($params as $par) {
            $query = preg_replace('/\\?/', "'" . $par . "'", $query, 1);
        }
        array_push(self::$_sql, array('query'=>$query, 'time'=>$time_run));
    }
    
    /**
     * VN_push query to debuging
     * JP_デバッグ用にクエリ転送
     * 
     * @param string $query
     * @return NULL
     */
    public static function pushStr($query, $time_run=0)
    {
        if (!defined('IS_DEBUG') || IS_DEBUG == FALSE) {
            return NULL;
        }
        array_push(self::$_sql, array('query'=>$query, 'time'=>$time_run));
    }
    
    public static function getSql()
    {
        if (!defined('IS_DEBUG') || IS_DEBUG == FALSE) {
            return NULL;
        }
        return self::$_sql;
    }
    
    /**
     * VN_get string of query
     * JP_クエリの文字列を取得
     * 
     * @return NULL|string
     */
    public static function printSql()
    {
        if (!defined('IS_DEBUG') || IS_DEBUG == FALSE || empty(self::$_sql)) {
            return NULL;
        }
        
        $sql = Common_Func::array_column(self::$_sql, 'query');
        $str = implode(";\n", $sql);
        return $str;
    }
    
    /**
     * VN_get html of query
     * JP_クエリのHTMLを取得
     * 
     * @return NULL|string
     */
    public static function printSqlHtml()
    {
        if (!defined('IS_DEBUG') || IS_DEBUG == FALSE || empty(self::$_sql)) {
            return NULL;
        }
        require_once 'HighlightSQL.php';
        $obj = new Common_HighlightSQL();
        
        $total_time = 0;
        $html = '';
        
        $html = '<div style="margin: 10px; padding-left: 25px; font-size: 0.9em;"><ol style="list-style-type: decimal-leading-zero;">';
        foreach (self::$_sql as $sql) {
            $run_time = '<div style="color: #666666; font-style:italic;">Runtime (s) : '.$sql['time'].'</div>';
            $html.= '<li>'.$obj->highlight($sql['query']).$run_time.'</li>';
            $total_time += $sql['time'];
        }
        $html.= '</ol></div>';
        
        $html.= '<div style="color: #666666; font-style:italic; font-weight:bold;"><p>Total: <span style="color: #FF0000;">'.$total_time.'</span> seconds</p></div>';
        
        return $html;
    }
}