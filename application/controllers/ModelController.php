<?php
class ModelController extends Common_FrontController {
    public function indexAction()
    {
        $this->view->headTitle ( 'サンプル' );
        $this->view->headMeta ()->setName ( 'keywords', 'サンプル' );
        $this->view->headMeta ()->setName ( 'description', 'サンプル' );
    }
}

