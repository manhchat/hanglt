<?php
/**
 * @author ChatDM
 */
final class Common_Func
{
    /**
     * convert url
     * @param $str
     */
    public static function convertStr($str='')
    {
        if ($str == '') {
            return '';
        }
        $special = '"';
        $str = preg_replace("/(à|á|ả|ạ|ã|â|ấ|ầ|ẩ|ậ|ẫ|ă|ặ|ắ|ắ|ằ|ẵ)/", 'a', $str); 
        $str = preg_replace("/(è|é|ẻ|ẽ|ẹ|ê|ễ|ể|ệ|ề|ế)/", 'e', $str); 
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str); 
        $str = preg_replace("/(ò|ó|ỏ|ọ|õ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ợ|ở|ỡ)/", 'o', $str); 
        $str = preg_replace("/(ù|ú|ủ|ũ|ụ|ư|ứ|ừ|ự|ử|ữ)/", 'u', $str); 
        $str = preg_replace("/(ỵ|ý|ỳ|ỹ|ỷ)/", 'y', $str); 
        $str = preg_replace("/(À|Á|Ả|Ạ|Ã|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ)/", 'a', $str); 
        $str = preg_replace("/(È|É|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ)/", 'e', $str); 
        $str = preg_replace("/(Ì|Í|Ỉ|Ĩ|Ị)/", 'I', $str); 
        $str = preg_replace("/(Ò|Ó|Ỏ|Õ|Ọ|Ô|Ổ|Ỗ|Ồ|Ố|Ộ|Ơ|Ợ|Ớ|Ờ|Ở|Ỡ)/", 'o', $str); 
        $str = preg_replace("/(Ù|Ú|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ự|Ữ|Ử)/", 'u', $str); 
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str); 
        $str = preg_replace("/(Đ|đ)/", 'd', $str);
        $str = preg_replace("/(!|@|#|-|=|'|{$special}|{|}|[|]|&|^|$|<|>|\+|~|`)/", ' ', $str);
        return strtolower(trim($str));
    }
    
    public static function urlAlias($str='')
    {
        if ($str == '') {
            return '';
        }
        $char = array(' ' => '-');
        return strtr(self::convertStr($str), $char);
    }
    
    static function get_microtime() {
        list ( $usec, $sec ) = explode ( ' ', microtime () );
        return (( float ) $usec + ( float ) $sec);
    }
    
    /**
     * Process upload image
     *
     * @param string $source_image_path
     * @param string $thumbnail_image_path
     * @return boolean
     */
    public static function uploadImage($source_image_path, $thumbnail_image_path, $is_resize=true)
    {
        if ($is_resize == true) {
            try {
                list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
                switch ($source_image_type) {
                    case IMAGETYPE_GIF:
                        $source_gd_image = imagecreatefromgif($source_image_path);
                        break;
                    case IMAGETYPE_JPEG:
                        $source_gd_image = imagecreatefromjpeg($source_image_path);
                        break;
                    case IMAGETYPE_PNG:
                        $source_gd_image = imagecreatefrompng($source_image_path);
                        break;
                }
                if ($source_gd_image === false) {
                    return false;
                }
                $source_aspect_ratio = $source_image_width / $source_image_height;
                $thumbnail_aspect_ratio = THUMBNAIL_IMAGE_MAX_WIDTH / THUMBNAIL_IMAGE_MAX_HEIGHT;
                if ($source_image_width <= THUMBNAIL_IMAGE_MAX_WIDTH && $source_image_height <= THUMBNAIL_IMAGE_MAX_HEIGHT) {
                    $thumbnail_image_width = $source_image_width;
                    $thumbnail_image_height = $source_image_height;
                } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
                    $thumbnail_image_width = (int) (THUMBNAIL_IMAGE_MAX_HEIGHT * $source_aspect_ratio);
                    $thumbnail_image_height = THUMBNAIL_IMAGE_MAX_HEIGHT;
                } else {
                    $thumbnail_image_width = THUMBNAIL_IMAGE_MAX_WIDTH;
                    $thumbnail_image_height = (int) (THUMBNAIL_IMAGE_MAX_WIDTH / $source_aspect_ratio);
                }
                $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
                imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
                imagejpeg($thumbnail_gd_image, $thumbnail_image_path, 90);
                imagedestroy($source_gd_image);
                imagedestroy($thumbnail_gd_image);
                return true;
            } catch (Exception $e) {
                throw new Lib_GyomuException($e->getMessage());
            }
        } else {
            move_uploaded_file($source_image_path, $thumbnail_image_path);
        }
    
    }
    /**
     * Chuyen mang 2 chieu thanh mang 1 chieu
     *
     * @param array $array
     * @param string $column_key
     * @param string $index_key
     * @return array
     */
    static function array_column($input, $column_key, $index_key = null){
        if (empty($input)) {
            return array();
        }
        // Implementation for PHP < 5.5.0
        if (!function_exists('array_column')) {
            if ($index_key !== null) {
    
                $keys = array();
                $i = 0;
                 
                foreach ($input as $row) {
                    if (array_key_exists($index_key, $row)) {
                        if (is_numeric($row[$index_key]) || is_bool($row[$index_key])) {
                            $i = max($i, (int) $row[$index_key] + 1);
                        }
                        $keys[] = $row[$index_key];
                    } else {
                         
                        $keys[] = $i++;
                    }
                }
            }
             
            if ($column_key !== null) {
                 
                $values = array();
                $i = 0;
                 
                foreach ($input as $row) {
                    if (array_key_exists($column_key, $row)) {
                        $values[] = $row[$column_key];
                        $i++;
                    } elseif (isset($keys)) {
                        array_splice($keys, $i, 1);
                    }
                }
            } else {
                $values = array_values($input);
            }
             
            if ($index_key !== null) {
                return array_combine($keys, $values);
            }
             
            return $values;
    
        } else {
            return array_column($input, $column_key, $index_key);
        }
    
    }
    
    /**
     * 
     * @param unknown $price
     * @return string
     */
    public static function productPrice($priceFloat)
    {
        if ($priceFloat == '' || $priceFloat == 0) {
            return;
        }
        $symbol = 'đ';
        $symbol_thousand = '.';
        $decimal_place = 0;
        $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
        return $price.$symbol;
    }
    
    public static function isMobile()
    {
        $userAgent = new Zend_Http_UserAgent();
        $device = $userAgent->getDevice()->getAllFeatures();
        if ($device['is_mobile'] == true || $device['is_tablet'] == true) {
            return true;
        }
        return false;
    }
    
    public static function deleteFileAndFolder($dir='')
    {
        if ($dir == '') {
            return false;
        }
        foreach (glob($dir."/*.*") as $filename) {
            if (is_file($filename)) {
                unlink($filename);
            }
        }
        return rmdir($dir);
    }
}