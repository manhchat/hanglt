<?php
class NewsController extends Common_FrontController {
    public function indexAction()
    {
        $this->view->headTitle ( 'ニュース' );
        $this->view->headMeta ()->setName ( 'keywords', 'ニュース' );
        $this->view->headMeta ()->setName ( 'description', 'ニュース' );
        $obj = new Model_News();
        $currentPage = $this->getParam('page', 1);
        $total = 0;
        $opt = array (
                'sort_by' => 'update_timestamp',
                'sort_order' => 'DESC',
                'fields' => array (
                        'id',
                        'title',
                        'body',
                        'update_timestamp',
                        'summary'
                ),
                'from' => $currentPage,
                'to' => PAGGING_NEWS_LIMIT,
                'paging' => true
        );
        $data = $obj->getItems($opt, $total, true);
        foreach ( $data as $key => $value ) {
            $data [$key] ['image'] = $this->view->baseUrl () . PREVIEW_NEWS_IMAGE_PATH . '/' . $value ['image'];
        }
        $params = $this->getAllParams();
        $this->view->data = $data;
        $paginator = $this->getPaginationPc ( $currentPage, PAGGING_NEWS_LIMIT, $total, $params, PAGE_OF_SCREEN );
        $this->view->paginator = $paginator;
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
    public function detailAction()
    {
        $id = $this->getParam('id');
        if ($id == '') {
            return $this->redirect('/');
        }
        $obj = new Model_News();
        $opt = array(
            'id' => $id
        );
        $data = $obj->getItem($opt);
        $data['image'] = $this->view->baseUrl () . NEWS_IMAGE_PATH . '/' . $data ['image'];
        $this->view->data = $data;
    }
}

