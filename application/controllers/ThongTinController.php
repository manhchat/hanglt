<?php
class ThongTinController extends Common_FrontController {
    public function indexAction() {
        if (! Common_Func::isMobile ()) {
            return $this->forward ( 'index-pc' );
        }
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/mobile_common.css', 'all' ) );
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/mobile_style.css', 'all' ) );
        $category = $this->getParam ( 'category' );
        if ($category == '') {
            return $this->redirect ( 'index' );
        }
        
        $obj = new Model_News ();
        $opt ['fields'] = array (
                'id',
                'title',
                'body' 
        );
        $opt ['category'] = $category;
        $data = $obj->getItem ( $opt );
        if (! empty ( $data )) {
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
    }
    public function indexPcAction() {
        $this->_helper->_layout->setLayout ( 'layout.thongtin' );
        $this->appendFilePc ();
        
        $category = $this->getParam ( 'category' );
        if ($category == '') {
            return $this->redirect ( 'index' );
        }
        
        $obj = new Model_News ();
        $opt ['fields'] = array (
                'id',
                'title',
                'body',
                'create_timestamp' 
        );
        $opt ['category'] = $category;
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
        $this->view->urlShare = $this->view->serverUrl () . $_SERVER ['REQUEST_URI'];
    }
}

