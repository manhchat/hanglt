<?php
class IndexController extends Common_FrontController {
    public function indexAction()
    {
        
        //$this->view->headMeta ()->setName ( 'keywords', $this->lang ['index_keywords_tag'] );
       // $this->view->headMeta ()->setName ( 'description', $this->lang ['index_description_tag'] );
    }
    
    public function headerBannerAction()
    {
        
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
    
}

