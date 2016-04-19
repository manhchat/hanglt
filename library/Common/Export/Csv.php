<?php
/**
 *
 * @author     FPT Software
 */

/**
 *
 * @category   Common
 * @copyright  Copyright 2014 FPT Software
 * @author     FPT Software
 */
class Common_Export_Csv {
    public $fileName = null;
    private $content = '';
    private $encodeBreak = '{[BR]}';
    
    /**
     * $objExport = new Common_Export_Csv($fileName);
     * $objExport->setHeader(array $headers);
     * $objExport->setRowMulti($result);
     * $objExport->download();
     * 
     * @param string $fileName
     */
    function __construct($fileName=null){
        $this->fileName = $fileName;
    }
    
    function setFileName($fileName) {
        $this->fileName = $fileName;
    }
    
    function setHeader($data = array()) {
        $this->content .= $this->setRow($data);
    }
    
    function setRowMulti($data=array()) {
        if (!is_array($data)) {
            return false;
        }
        foreach ($data as $row) {
            $this->setRow($row);
        }
    }
    
    function setRow($data=null) {
        $str_row = '';
        if (is_array($data)) {
            foreach ($data as $key=>$val) {
                $val = preg_replace("/[\\n\\r]+/", $this->encodeBreak, $val);
                $data[$key] = '"'.str_replace('"', '""', $val).'"';
            }
            $str_row = implode(",", $data);
        } else {
            $data = preg_replace("/[\\n\\r]+/", $this->encodeBreak, $data);
            $data = '"'.str_replace('"', '""', $data).'"';
            $str_row = $data;
        }
        
        if ($this->content != '') {
            $this->content .= "\r\n" . $str_row;
        } else {
            $this->content = $str_row;
        }
    }
    
    /**
     * ファイルのダウンロード
     */
    function download() {
        if ($this->fileName == '') {
            $fileName = 'CSV_'.time().'.csv';
        } else {
            $fileName = $this->fileName;
        }
        //$this->content = chr(255).chr(254).mb_convert_encoding($this->content, "UTF-16LE", "UTF-8");
        ob_end_clean();
        header('Content-Encoding: UTF-8');
        header("Content-type: text/csv;charset=UTF-8");
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        ob_clean();
        if ($this->content != "") {
            echo "\xEF\xBB\xBF";
        }
        echo $this->content;
        exit();
    }
    
    /**
     * VN_Xuất file csv ra dạng Shift-JIS tiếng Nhật
     * JP_
     */
    function downloadShiftJIS() {
        if ($this->fileName == '') {
            $fileName = 'CSV_'.time().'.csv';
        } else {
            $fileName = $this->fileName;
        }
        $this->content = mb_convert_encoding($this->content, "SJIS", "UTF-8");
        ob_end_clean();
        header('Content-Encoding: Shift_JIS');
        header("Content-type: text/csv;charset=Shift_JIS");
        header('Content-Language: ja');
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        ob_clean();        
        echo $this->content;
        exit();
    }
    
    /**
     * VN_Xuất file csv ra dạng Shift-JIS tiếng Nhật
     * JP_
     */
    function createShiftJIS() {
        
        if ($this->fileName == '') {
            $fileName = 'CSV_'.time().'.csv';
        } else {
            $fileName = $this->fileName;
        }
        $this->content = mb_convert_encoding($this->content, "SJIS", "UTF-8");
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename='. $fileName);
        header('Pragma: no-cache');
        header("Expires: 0");
        
        $fp = fopen($fileName, 'w');
        fwrite($fp, $this->content);
        fclose($fp);
    }
    /**
     * ファイルのダウンロード
     */
    function downloadCustom() {
        if ($this->fileName == '') {
            $fileName = 'CSV_'.time().'.csv';
        } else {
            $fileName = $this->fileName;
        }
        //$this->content = chr(255).chr(254).mb_convert_encoding($this->content, "UTF-16LE", "UTF-8");
        ob_end_clean();
        header('Content-Encoding: UTF-8');
        header("Content-type: text/csv;charset=UTF-8");
        header('Content-Disposition: attachment; filename="'.$fileName.'"');
        ob_clean();
        if ($this->content != "") {
            //echo "\xEF\xBB\xBF";
        }
        echo $this->content;
        exit();
    }
    
    function setHeaderCustom($data = array()) {
        $this->content .= $this->setRowCustom($data);
    }
    
    function setRowMultiCustom($data=array()) {
        if (!is_array($data)) {
            return false;
        }
        foreach ($data as $row) {
            $this->setRowCustom($row);
        }
    }
    
    function setRowCustom($data=null) {
        if (is_array($data)) {
            foreach ($data as $key=>$val) {
                $data[$key] = ''.str_replace('"', '""', $val).'';
            }
            $this->content.= implode(",", $data)."\r\n";
        } else {
            $data = ''.str_replace('"', '""', $data).'';
            $this->content.= $data."\r\n";
        }
    }
}