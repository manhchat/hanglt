<?php
class ProductController extends Common_FrontController {
    public function indexAction()
    {
        $id = $this->getParam('category_id');
        if ($id == '') {
            return $this->redirect('/');
        }
        $categoryArr = $this->getCategory($id);
        $this->view->headMeta ()->setName ( 'keywords', $categoryArr ['category_name'] );
        $this->view->headMeta ()->setName ( 'description', $categoryArr ['category_name'] );
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
}

