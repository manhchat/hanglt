<?php
class TinTucController extends Common_FrontController {
    public function indexAction() {
        if (! Common_Func::isMobile ()) {
            return $this->forward ( 'index-pc' );
        }
    }
    public function indexPcAction() {
        $this->_helper->_layout->setLayout ( 'layout.tintuc' );
        $this->appendFilePc ();
        
        $id = $this->getParam ( 'id' );
        $obj = new Model_TinTuc ();
        $opt ['fields'] = array (
                'id',
                'title',
                'body',
                'create_timestamp' 
        );
        $opt ['id'] = $id;
        $data = $obj->getItem ( $opt );
        if (! empty ( $data )) {
            $data ['create_time'] = date ( 'H:i:s d-m-Y', $data ['create_timestamp'] );
            $this->view->data = $data;
            $this->view->headTitle ( $data ['title'] );
            $this->view->headMeta ()->setName ( 'keywords', $data ['title'] );
            $this->view->headMeta ()->setName ( 'description', $data ['title'] );
        } else {
            $this->view->headTitle ( 'Laptop EDG' );
            $this->view->headMeta ()->setName ( 'keywords', $this->lang ['index_keywords_tag'] );
            $this->view->headMeta ()->setName ( 'description', $this->lang ['index_description_tag'] );
            $this->view->data = array ();
        }
        $this->view->data = $data;
        $this->view->urlShare = $this->view->serverUrl () . $_SERVER ['REQUEST_URI'];
    }
    public function danhSachAction() {
        if (! Common_Func::isMobile ()) {
            return $this->forward ( 'danh-sach-pc' );
        }
    }
    public function danhSachPcAction() {
        $this->_helper->_layout->setLayout ( 'layout.tintuc' );
        $this->appendFilePc ();
        $category = $this->getParam ( 'category' );
        $CATEGORY_NEWS = Common_Codedef::getID ( 'CATEGORY_NEWS' );
        unset ( $CATEGORY_NEWS [''] );
        if (! isset ( $CATEGORY_NEWS [$category] )) {
            return $this->redirect ( '/' );
        }
        $currentPage = $this->getParam ( 'page', 1 );
        $obj = new Model_TinTuc ();
        $opt = array (
                'category' => $category,
                'sort_by' => 'update_timestamp',
                'sort_order' => 'DESC',
                'fields' => array (
                        'id',
                        'title',
                        'body',
                        'update_timestamp',
                        'sumary' 
                ),
                'from' => $currentPage,
                'to' => PAGGING_LIMIT,
                'paging' => true 
        );
        $total = 0;
        $data = $obj->getItems ( $opt, $total, true );
        foreach ( $data as $key => $value ) {
            $data [$key] ['link_detail'] = $this->createUrl ( array (
                    'module' => 'default',
                    'controller' => 'tin-tuc',
                    'action' => 'index',
                    'id' => $value ['id'],
                    'url_seo' => URL_NEWS_DETAIL,
                    'alias_seo' => $this->seoUrl ( $value ['title'] ),
                    'id_seo' => $value ['id'] 
            ) );
            $data [$key] ['update_time'] = date ( 'H:m:i d-m-Y', $value ['update_timestamp'] );
            $data [$key] ['image'] = $this->view->baseUrl () . PREVIEW_NEWS_IMAGE_PATH . '/' . $value ['image'];
        }
        $this->view->headTitle ( $CATEGORY_NEWS [$category] );
        $this->view->headMeta ()->setName ( 'keywords', $CATEGORY_NEWS [$category] );
        $this->view->headMeta ()->setName ( 'description', $CATEGORY_NEWS [$category] );
        $this->view->categoryNews = $CATEGORY_NEWS [$category];
        $this->view->data = $data;
        $paramsAll ['url_seo'] = URL_NEWS_LIST;
        $paramsAll ['alias_seo'] = $this->seoUrl ( $CATEGORY_NEWS [$category] );
        $paramsAll ['id_seo'] = $category;
        $paginator = $this->getPaginationPc ( $currentPage, PAGGING_LIMIT, $total, $paramsAll, PAGE_OF_SCREEN );
        $this->view->paginator = $paginator;
    }
}

