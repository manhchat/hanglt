<?php
class ProductController extends Common_FrontController {
    public function indexAction()
    {
        $id = $this->getParam('category_id');
        if ($id != '') {
            $categoryArr = $this->getCategory($id);
            $this->view->headTitle ( 'サンプル |'.$categoryArr ['category_name'] );
            $this->view->headMeta ()->setName ( 'keywords', $categoryArr ['category_name'] );
            $this->view->headMeta ()->setName ( 'description', $categoryArr ['category_name'] );
        } else {
            $this->view->headTitle ( 'サンプル' );
            $this->view->headMeta ()->setName ( 'keywords', 'サンプル' );
            $this->view->headMeta ()->setName ( 'description', 'サンプル' );
        }
        
        $productArr = $this->getProduct($id);
        $this->view->product = $productArr;
    }
    
    private function getCategory($id)
    {
        $obj = new Model_Category();
        $opt['id'] = $id;
        $data = $obj->getItem($opt);
        return $data;
    }
    
    private function getProduct($category_id)
    {
        $obj = new Model_Product();
        $opt['sort_by'] = 'create_timestamp';
        $opt['sort_order'] = 'DESC';
        if ($category_id != '') {
            $opt['cid'] = $category_id;
        }
        $total = 0;
        $data = $obj->getItems($opt, $total, false);
        foreach ($data as $key => $value) {
            if ($value['image'] != null) {
                $imagesArr = json_decode($value['image'], true);
                if ($imagesArr != null && count($imagesArr) > 0) {
                    $data[$key]['image_preview'] = $this->view->baseUrl().PRODUCT_IMAGE_PATH_PREVIEW.'/'.$imagesArr[0];
                }
            }
        }
        return $data;
    }
    
    public function detailAction()
    {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/front/pgwslider.min.js' ) );
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/front/detail.js' ) );
        
        $id = $this->getParam('id');
        if ($id == '') {
            return $this->redirect('/');
        }
        $obj = new Model_Product();
        $opt['id'] = $id;
        $data = $obj->getItem($opt);
        if (empty($data)) {
            return $this->redirect('/');
        }
        $images = json_decode($data['image'], true);
        foreach ($images as $key => $value) {
            $images[$key] = $this->view->baseUrl().PRODUCT_IMAGE_PATH_PREVIEW.'/'.$value.'|'. $this->view->baseUrl().PRODUCT_IMAGE_PATH.'/'.$value;
        }
        $data['image'] = $images;
        $this->view->headTitle ( $data['product_name'] );
        $this->view->headMeta ()->setName ( 'keywords', $data['product_name'] );
        $this->view->headMeta ()->setName ( 'description', $data['product_name'] );
        $productRelation = $this->getProduct($data['cid']);
        foreach ($productRelation as $key => $value) {
            if ($value['id'] == $data['id']) {
                unset($productRelation[$key]);
            }
        }
        $this->view->data = $data;
        $this->view->product = $productRelation;
    }
}

