<?php
/**
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */
require_once (realpath ( APPLICATION_PATH . '/forms/admin/News.php' )); // set the right path
class Admin_NewsController extends Common_AdminController {
    public function indexAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/news.js' ) );
        $this->view->headTitle ( 'Quản lý thông tin chung' );
        $this->view->messages = $this->_helper->flashMessenger->getMessages ();
    }
    public function editAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/news-edit.js' ) );
        $id = $this->getParam ( 'id' );
        if ($id == '') {
            return;
        }
        $form = new Form_Admin_News ();
        $obj = new Model_News ();
        $opt ['fields'] = array (
                'title',
                'body',
                'category' 
        );
        $opt ['id'] = $id;
        $data = $obj->getItem ( $opt );
        $form->setDataToForm ( $data );
        
        $this->view->headTitle ( 'Sửa thông tin chung' );
        $this->view->form = $form;
        $this->view->data = $data;
        $this->view->id = $id;
    }
    public function addAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/news-add.js' ) );
        $form = new Form_Admin_News ();
        $this->view->form = $form;
        $this->view->headTitle ( 'Tạo mới tin tức' );
    }
    public function saveAction() {
        $this->setNoRender ();
        $this->disableLayout ();
        $request = $this->getRequest ();
        $params = $request->getParams ();
        if (! $request->isPost ()) {
            return;
        }
        $obj = new Model_News ();
        $opt ['fields'] ['title'] = isset ( $params ['title'] ) ? $params ['title'] : '';
        $opt ['fields'] ['category'] = isset ( $params ['category'] ) ? $params ['category'] : 0;
        $opt ['fields'] ['body'] = isset ( $params ['body'] ) ? $params ['body'] : '';
        
        if (isset ( $params ['id'] ) && $params ['id'] != '') {
            // Truong hop update
            $opt ['id'] = $params ['id'];
            $res = $obj->updateItem ( $opt );
            
            if ($res) {
                $this->_helper->flashMessenger->addMessage ( "Sửa dữ liệu thành công." );
                if ($params ['access_redirect'] == 'save') {
                    return $this->redirector ( 'edit', 'news', 'admin', array (
                            'id' => $params ['id'] 
                    ) );
                } else {
                    return $this->redirector ( 'index', 'news', 'admin' );
                }
            } else {
                $message = '<div class="alert alert-danger display-hide" style="display: block;">
                                <button data-close="alert" class="close"></button>
                                System error please check your system.
                            </div>';
                $this->_helper->flashMessenger->addMessage ( $message );
                return $this->redirector ( 'index', 'index', 'admin' );
            }
        } else {
            // Truong hop insert moi
            $res = $obj->insertItem ( $opt );
            if ($res) {
                $this->_helper->flashMessenger->addMessage ( "Tạo dữ liệu thành công." );
                if ($params ['access_redirect'] == 'save') {
                    return $this->redirector ( 'add', 'news', 'admin' );
                } else {
                    return $this->redirector ( 'index', 'news', 'admin' );
                }
            } else {
                $message = '<div class="alert alert-danger display-hide" style="display: block;">
                                <button data-close="alert" class="close"></button>
                                System error please check your system.
                            </div>';
                $this->_helper->flashMessenger->addMessage ( $message );
                return $this->redirector ( 'index', 'index', 'admin' );
            }
        }
    }
}