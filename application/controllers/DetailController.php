<?php
class DetailController extends Common_FrontController {
    public function indexAction() {
        if (! Common_Func::isMobile ()) {
            return $this->forward ( 'index-pc' );
        }
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/sticky-popup.css', 'all' ) );
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/mobile_common.css', 'all' ) );
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/mobile_style.css', 'all' ) );
        $id = $this->getParam ( 'id' );
        if ($id == '') {
            return $this->redirect ( 'index' );
        }
        $BAO_HANH = Common_Codedef::getID ( 'BAO_HANH' );
        $obj = new Model_Product ();
        $opt ['fields'] = array (
                'id',
                'title',
                'cid',
                'bid',
                'image',
                'body',
                'price',
                'promotion',
                'technical_info',
                'bao_hanh',
                'status',
                'price_promotion' 
        );
        $opt ['get_brand'] = true;
        $opt ['id'] = $id;
        $data = $obj->getItem ( $opt );
        $data ['price'] = Common_Func::productPrice ( $data ['price'] );
        $data ['price_promotion'] = Common_Func::productPrice ( $data ['price_promotion'] );
        $data ['bao_hanh'] = isset ( $BAO_HANH [$data ['bao_hanh']] ) ? $BAO_HANH [$data ['bao_hanh']] : '';
        $data ['image_path'] = $this->view->baseUrl () . PRODUCT_IMAGE_PATH . '/' . $data ['image'];
        $data ['image_path_preview'] = $this->view->baseUrl () . PRODUCT_IMAGE_PATH_PREVIEW . '/' . $data ['image'];
        $this->view->urlShare = $this->view->serverUrl () . $_SERVER ['REQUEST_URI'];
        $this->view->data = $data;
        $this->view->id = $id;
        
        $this->view->headTitle ( $data ['title'] );
        $this->view->headMeta ()->setName ( 'keywords', $data ['title'] );
        $this->view->headMeta ()->setName ( 'description', $data ['title'] );
    }
    public function indexPcAction() {
        $this->appendFilePc ();
        $this->_helper->_layout->setLayout ( 'layout.detail.pc' );
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/front/detail.js' ) );
        
        $id = $this->getParam ( 'id' );
        if ($id == '') {
            return $this->redirect ( 'index' );
        }
        $BAO_HANH = Common_Codedef::getID ( 'BAO_HANH' );
        $obj = new Model_Product ();
        $opt ['fields'] = array (
                'id',
                'title',
                'cid',
                'bid',
                'image',
                'body',
                'price',
                'promotion',
                'technical_info',
                'bao_hanh',
                'status',
                'price_promotion' 
        );
        $opt ['get_brand'] = true;
        $opt ['id'] = $id;
        $data = $obj->getItem ( $opt );
        $data ['price'] = Common_Func::productPrice ( $data ['price'] );
        $data ['price_promotion'] = Common_Func::productPrice ( $data ['price_promotion'] );
        $data ['bao_hanh'] = isset ( $BAO_HANH [$data ['bao_hanh']] ) ? $BAO_HANH [$data ['bao_hanh']] : '';
        $data ['image_path'] = $this->view->baseUrl () . PRODUCT_IMAGE_PATH . '/' . $data ['image'];
        $data ['image_path_preview'] = $this->view->baseUrl () . PRODUCT_IMAGE_PATH_PREVIEW . '/' . $data ['image'];
        
        $productBrand = $this->getProductBrand ( $data ['bid'] );
        $this->view->productBrand = $productBrand;
        $this->view->urlShare = $this->view->serverUrl () . $_SERVER ['REQUEST_URI'];
        $this->view->data = $data;
        $this->view->id = $id;
        
        $this->view->headTitle ( $data ['title'] );
        $this->view->headMeta ()->setName ( 'keywords', $data ['title'] );
        $this->view->headMeta ()->setName ( 'description', $data ['title'] );
    }
    private function getProductBrand($bid) {
        $obj = new Model_Product ();
        $opt = array (
                'sort_by' => 'update_timestamp',
                'sort_order' => 'DESC',
                'fields' => array (
                        'id',
                        'cid',
                        'title',
                        'price',
                        'image' 
                ),
                'bid' => $bid,
                'limit' => 10,
                'sort_by' => 'update_timestamp',
                'sort_order' => 'DESC' 
        );
        $total = 0;
        $data = $obj->getItems ( $opt, $total );
        foreach ( $data as $key => $value ) {
            $data [$key] ['link_detail'] = $this->createUrl ( array (
                    'module' => 'default',
                    'controller' => 'detail',
                    'action' => 'index',
                    'id' => $value ['id'],
                    'cid' => $value ['cid'],
                    'url_seo' => URL_DETAIL_PRODUCT,
                    'alias_seo' => $this->seoUrl ( $value ['title'] ),
                    'id_seo' => $value ['id'] 
            ) );
            $data [$key] ['price'] = Common_Func::productPrice ( $value ['price'] );
            $data [$key] ['image'] = $this->view->baseUrl () . PRODUCT_IMAGE_PATH_PREVIEW . '/' . $value ['image'];
        }
        return $data;
    }
}

