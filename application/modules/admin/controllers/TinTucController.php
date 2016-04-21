<?php
/**
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */
require_once (realpath ( APPLICATION_PATH . '/forms/admin/TinTuc.php' )); // set the right path
class Admin_TinTucController extends Common_AdminController {
    public function indexAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/tin-tuc.js' ) );
        $dataCategory = Common_Codedef::getID ( 'CATEGORY_NEWS' );
        $this->view->headTitle ( 'Quản lý tin tức' );
        $this->view->messages = $this->_helper->flashMessenger->getMessages ();
        $this->view->dataCategory = $dataCategory;
    }
    public function editAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/tin-tuc-edit.js' ) );
        $id = $this->getParam ( 'id' );
        if ($id == '') {
            return;
        }
        $form = new Form_Admin_TinTuc ();
        $obj = new Model_TinTuc ();
        $opt ['fields'] = array (
                'title',
                'body',
                'category',
                'image',
                'sumary' 
        );
        $opt ['id'] = $id;
        $data = $obj->getItem ( $opt );
        $form->setDataToForm ( $data );
        $data ['image_path_preview'] = $this->view->baseUrl () . PREVIEW_NEWS_IMAGE_PATH . '/' . $data ['image'];
        $data ['image_path'] = $this->view->baseUrl () . NEWS_IMAGE_PATH . '/' . $data ['image'];
        $this->view->headTitle ( 'Sửa thông tin chung' );
        $this->view->form = $form;
        $this->view->data = $data;
        $this->view->id = $id;
    }
    public function addAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/tin-tuc-add.js' ) );
        $form = new Form_Admin_TinTuc ();
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
        $obj = new Model_TinTuc ();
        // Upload image
        $upload = new Zend_File_Transfer ();
        $fileInfo = $upload->getFileInfo ();
        $image = $fileInfo ['image'];
        $isUpload = false;
        if ($image ['size'] > 0) {
            $ext = pathinfo ( $image ['name'], PATHINFO_EXTENSION );
            $newName = basename ( $image ['name'], "." . $ext ) . '_' . uniqid () . '.' . strtolower ( $ext );
            
            $path = IMAGE_DIRECTORY_NEWS . DS . $newName;
            $path_preview = IMAGE_DIRECTORY_NEWS_PREVIEW . DS . $newName;
            Common_Func::uploadImage ( $image ['tmp_name'], $path, false );
            Common_Func::uploadImage ( $path, $path_preview );
            $opt ['fields'] ['image'] = $newName;
            $isUpload = true;
        }
        
        $opt ['fields'] ['title'] = isset ( $params ['title'] ) ? $params ['title'] : '';
        $opt ['fields'] ['category'] = isset ( $params ['category'] ) ? $params ['category'] : 0;
        $opt ['fields'] ['body'] = isset ( $params ['body'] ) ? $params ['body'] : '';
        $opt ['fields'] ['sumary'] = isset ( $params ['sumary'] ) ? $params ['sumary'] : '';
        if (isset ( $params ['id'] ) && $params ['id'] != '') {
            // Truong hop update
            $opt ['id'] = $params ['id'];
            $res = $obj->updateItem ( $opt );
            
            if ($res) {
                // Xoa image cu~ neu trong truong hop co upload image
                if ($isUpload) {
                    $filename = IMAGE_DIRECTORY_NEWS . DS . $params ['image_old'];
                    $filename_preview = IMAGE_DIRECTORY_NEWS_PREVIEW . DS . $params ['image_old'];
                    if (file_exists ( $filename )) {
                        @unlink ( $filename );
                    }
                    if (file_exists ( $filename_preview )) {
                        @unlink ( $filename_preview );
                    }
                }
                $this->_helper->flashMessenger->addMessage ( "Sửa dữ liệu thành công." );
                if ($params ['access_redirect'] == 'save') {
                    return $this->redirector ( 'edit', 'tin-tuc', 'admin', array (
                            'id' => $params ['id'] 
                    ) );
                } else {
                    return $this->redirector ( 'index', 'tin-tuc', 'admin' );
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
                    return $this->redirector ( 'add', 'tin-tuc', 'admin' );
                } else {
                    return $this->redirector ( 'index', 'tin-tuc', 'admin' );
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