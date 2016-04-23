<?php
class IndexController extends Common_FrontController {
    public function indexAction()
    {
        $newProduct = $this->getProduct();
        $this->view->newProduct = $newProduct;
    }
    
    public function headerBannerAction()
    {
        
    }
    public function bannerCenterAction()
    {
        $obj = new Model_Slide();
        $opt = array(
            'sort_by' => 'update_timestamp',
            'sort_order' => 'DESC',
            'limit' => 1,
            'type' => 1,
        );
        $data = $obj->getBanner($opt);
        if (!empty($data)) {
            $data['image'] = $this->view->baseUrl () . SLIDE_IMAGE_PATH . '/' . $data ['image'];
            $this->view->data = $data;
        }
    }
    public function categoryAction()
    {
        $obj = new Model_Category();
        $opt['sort_by'] = 'item_order';
        $opt['sort_order'] = 'ASC';
        $total = 0;
        $data = $obj->getItems($opt, $total, false);
        $this->view->data = $data;
    }
    
    public function navAction()
    {
        $controller = $this->getRequest()->getControllerName();
        $params = $this->getRequest()->getParams();
        $this->view->controller = $params['controller'];
    }
    public function aboutAction()
    {
        $obj = new Model_System();
        $data = $obj->getItem();
        $this->view->data = $data;
    }
    private function getProduct()
    {
        $obj = new Model_Product();
        $opt['sort_by'] = 'create_timestamp';
        $opt['sort_order'] = 'DESC';
        $opt['limit'] = 6;
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

