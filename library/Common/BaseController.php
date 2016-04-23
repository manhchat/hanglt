<?php
/**
 * @author ChatDM
 */
abstract class Common_BaseController extends Zend_Controller_Action
{
    protected $lang = array();
    
    public function init()
    {
        // Loading language
        $this->lang = Common_Message::getAll();
        $this->view->lang = $this->lang;
    }
    
    public function preDispatch()
    {
        parent::preDispatch();
        $this->view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=UTF-8');
        $this->view->headMeta()->appendHttpEquiv('Content-Style-Type', 'text/css');
        $this->view->headMeta()->appendHttpEquiv('Content-Script-Type', 'text/javaScript');
        $this->view->headScript()->prependFile($this->view->baseUrl('assets/global/plugins/jquery.min.js'));
    }
    public function url(array $array, $null=null, $true=true, $false=false)
    {
        if (isset($array['url_alias'])) {
            $array['url_alias'] = Common_Func::urlAlias($array['url_alias']);
        }
        return $this->view->url($array ,$null, $true, $false);
    }
    
    public function disableLayout()
    {
        return $this->_helper->layout->disableLayout();
    }
    
    public function setNoRender($option=true)
    {
        return  $this->_helper->viewRenderer->setNoRender($option);
    }
    
    public function convertUrl($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
    
        return strtolower($str);
    
    }
    public function createUrl(array $params)
    {
    	if (SEO_URL == TRUE) {
    		$page='';
    		if (isset($params['page'])) {
    			$page = '?page='.$params['page'];
    		}
    		$url = $this->view->baseUrl().'/'.$params['url_seo'].'/'.$this->seoUrl($params['alias_seo']).'-'.$params['id_seo'].'.'.END_URL.$page;
    	} else {
    		unset($params['url_seo']);
    		unset($params['alias_seo']);
    		unset($params['id_seo']);
    		$url = $this->view->url($params, null, true);
    	}
    	return $url;
    }
    public function seoUrl($string) {
        $string = $this->convertUrl($string);
        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
    
    public function redirector($action, $controller, $modulde = 'default', $option = array()) {
        return $this->_helper->redirector($action, $controller, $modulde, $option);
    }
    
    /**
     *
     * @param number $page focus to page
     * @param string $perpage paging limit
     * @param number $totalRecord total of record (round rows)
     * @param array $params parameter in link URL
     * @param NULL|int $pageOfScreen show page of screen
     * @return string
     */
	public function getPagination($page=1, $perpage=PAGGING_LIMIT, $totalRecord=0, $params=array(), $pageOfScreen=NULL, $nextLabel = 'Next', $prevLabel='Prev', $paging_info=true)
    {
    	if ($totalRecord == 0) {
    		return NULL;
    	}
    	$totalPage = ceil($totalRecord/$perpage);
    	$page = (int)$page;
    	if ($page < 1) {
    		$page = 1;
    	}
    	//show of screen
    	if (!is_null($pageOfScreen)) {
    		$pageOfScreen = max(1, (int)$pageOfScreen);
    	}
    	$html = '';
    	/* $pagination_info_arr = array(
    			'%total%' => $totalRecord,
    			'%from%' => ($page-1)*$perpage + 1,
    			'%to%' => min($page*$perpage, $totalRecord),
    	);
    	$html = '';
    	$row_count = strtr($this->lang['pagination_info'], $pagination_info_arr);
    	//add paging info
    	if ($paging_info == true) {
    		$html = '<li class="paging-info">' . $row_count . '</li>';
    	} */
    
    	if ($totalPage <= 1) {
    		//return array('paging' => $html, 'row_count' => $row_count);
    		return $html;
    	}
    
    	if (1 < $page) {
    		if (1 < $page-1) {
    			$params['page'] = 1;
    			$url = $this->createUrl($params);
    			//$html.= '<li><a href="'.$url.'" title="First">««</a></li>';
    		}
    
    		$params['page'] = $page-1;
    		$url = $this->createUrl($params);
    		$html.= '<li class="prev"><a href="'.$url.'" title="Quay lại">'.$prevLabel.'</a></li>';
    	}
    
    	/* $fromPage = 1;
    	$toPage = $totalPage;
    
    	if ($pageOfScreen > 0) {
    		$stepPage = $pageOfScreen/2;
    		if ($stepPage != ceil($stepPage)) {
    			$stepPage = ceil($stepPage) -1;
    		} else {
    			$stepPage = $stepPage-1;
    		}
    
    		if ($page - $stepPage > 1) {
    			if ($totalPage - $pageOfScreen >= 0) {
    				$fromPage = min ($page - $stepPage, $page);
    				$fromPage = min ($fromPage, $totalPage - $pageOfScreen + 1);
    			}
    
    			if ($fromPage-1 > 0) {
    				$params['page'] = $fromPage-1;
    				$url = $this->createUrl($params);
    				$html.= '<li><a href="'.$url.'">...</a>';
    			}
    		}
    
    		$toPage = min($fromPage + $pageOfScreen - 1, $totalPage);
    	}
    
    	for($i=$fromPage; $i<=$toPage; $i++) {
    		$class = '';
    		if ($i == $page) {
    			$class = ' class="current"';
    		}
    		$params['page'] = $i;
    		$url = $this->createUrl($params);
    		$html.= '<li'.$class.'><a href="'.$url.'">'.$i.'</a></li>';
    	}
    
    	if ($pageOfScreen > 0 && $fromPage + $pageOfScreen-1 < $totalPage) {
    		$params['page'] = $toPage+1;
    		$url = $this->createUrl($params);
    		$html.= '<li><a href="'.$url.'">...</a></li>';
    	} */
    
    	if ($page < $totalPage) {
    		$params['page'] = $page+1;
    		$url = $this->createUrl($params);
    		$html.= '<li class="next"><a href="'.$url.'" title="Xem thêm">'.$nextLabel.'</a></li>';
    
    		if ($page+1 < $totalPage) {
    			$params['page'] = $totalPage;
    			$url = $this->createUrl($params);
    			//$html.= '<li><a href="'.$url.'" title="Last">»»</a></li>';
    		}
    	}
    	//return array('paging' => $html, 'row_count' => $row_count);
    	return $html;
    }
    
    /**
     *
     * @param number $page focus to page
     * @param string $perpage paging limit
     * @param number $totalRecord total of record (round rows)
     * @param array $params parameter in link URL
     * @param NULL|int $pageOfScreen show page of screen
     * @return string
     */
    public function getPaginationPc($page=1, $perpage=PAGGING_LIMIT, $totalRecord=0, $params=array(), $pageOfScreen=NULL, $nextLabel = '»', $prevLabel='«', $paging_info=false)
    {
    	if ($totalRecord == 0) {
    		return NULL;
    	}
    	$totalPage = ceil($totalRecord/$perpage);
    	$page = (int)$page;
    	if ($page < 1) {
    		$page = 1;
    	}
    	//show of screen
    	if (!is_null($pageOfScreen)) {
    		$pageOfScreen = max(1, (int)$pageOfScreen);
    	}
    	$html = '';
    	
    	//add paging info
    	if ($paging_info == true) {
    		$pagination_info_arr = array(
    				'%total%' => $totalRecord,
    				'%from%' => ($page-1)*$perpage + 1,
    				'%to%' => min($page*$perpage, $totalRecord),
    		);
    		$row_count = strtr($this->lang['pagination_info'], $pagination_info_arr);
    		$html = '<li class="paging-info">' . $row_count . '</li>';
    	}
    
    	if ($totalPage <= 1) {
    		return $html;
    	}
    
    	if (1 < $page) {
    		if (1 < $page-1) {
    			$params['page'] = 1;
    			$url = $this->createUrl($params);
    			$html.= '<li><a href="'.$url.'">««</a></li>';
    		}
    
    		$params['page'] = $page-1;
    		$url = $this->createUrl($params);
    		$html.= '<li class="prev"><a href="'.$url.'">'.$prevLabel.'</a></li>';
    	}
    
    	$fromPage = 1;
    	 $toPage = $totalPage;
    
    	if ($pageOfScreen > 0) {
    	$stepPage = $pageOfScreen/2;
    	if ($stepPage != ceil($stepPage)) {
    	$stepPage = ceil($stepPage) -1;
    	} else {
    	$stepPage = $stepPage-1;
    	}
    
    	if ($page - $stepPage > 1) {
    	if ($totalPage - $pageOfScreen >= 0) {
    	$fromPage = min ($page - $stepPage, $page);
    	$fromPage = min ($fromPage, $totalPage - $pageOfScreen + 1);
    	}
    
    	if ($fromPage-1 > 0) {
    	$params['page'] = $fromPage-1;
    	$url = $this->createUrl($params);
    	$html.= '<li><a href="'.$url.'">...</a>';
    	}
    	}
    
    	$toPage = min($fromPage + $pageOfScreen - 1, $totalPage);
    	}
    
    	for($i=$fromPage; $i<=$toPage; $i++) {
    	$class = '';
    	if ($i == $page) {
    	$class = ' class="current"';
    	}
    	$params['page'] = $i;
    	$url = $this->createUrl($params);
    	$html.= '<li'.$class.'><a href="'.$url.'">'.$i.'</a></li>';
    	}
    
    	if ($pageOfScreen > 0 && $fromPage + $pageOfScreen-1 < $totalPage) {
    	$params['page'] = $toPage+1;
    	$url = $this->createUrl($params);
    	$html.= '<li><a href="'.$url.'">...</a></li>';
    	}
    
    	if ($page < $totalPage) {
    		$params['page'] = $page+1;
    		$url = $this->createUrl($params);
    		$html.= '<li class="next"><a href="'.$url.'">'.$nextLabel.'</a></li>';
    
    		if ($page+1 < $totalPage) {
    			$params['page'] = $totalPage;
    			$url = $this->createUrl($params);
    			$html.= '<li><a href="'.$url.'">»»</a></li>';
    		}
    	}
    	//return array('paging' => $html, 'row_count' => $row_count);
    	return $html;
    }
}