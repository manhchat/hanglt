<?php
/**
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */
require_once (realpath ( APPLICATION_PATH . '/forms/admin/Slide.php' )); // set the right path
class Admin_SlideController extends Common_AdminController {
    public function indexAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/slide.js' ) );
        $this->view->headTitle ( 'Quản lý slide ảnh' );
        $this->view->messages = $this->_helper->flashMessenger->getMessages ();
    }
    public function editAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/slide-edit.js' ) );
        $id = $this->getParam ( 'id' );
        if ($id == '') {
            return;
        }
        $this->view->headTitle ( 'Edit banner' );
        
        $obj = new Model_Slide ();
        $opt ['fields'] = array (
                'id',
                'title',
                'image',
                'url',
                'type' 
        );
        $opt ['id'] = $id;
        $data = $obj->getItem ( $opt );
        $data ['image_path_preview'] = $this->view->baseUrl () . PREVIEW_SLIDE_IMAGE_PATH . '/' . $data ['image'];
        $data ['image_path'] = $this->view->baseUrl () . SLIDE_IMAGE_PATH . '/' . $data ['image'];
        
        $form = new Form_Admin_Slide ();
        $form->setDataToForm ( $data );
        $this->view->form = $form;
        
        $this->view->data = $data;
        $this->view->id = $id;
    }
    public function addAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/slide-add.js' ) );
        $this->view->headTitle ( 'Create new banner' );
        $form = new Form_Admin_Slide ();
        $this->view->form = $form;
    }
    public function saveAction() {
        $this->setNoRender ();
        $this->disableLayout ();
        $request = $this->getRequest ();
        $params = $request->getParams ();
        if (! $request->isPost ()) {
            return;
        }
        $obj = new Model_Slide ();
        $upload = new Zend_File_Transfer ();
        $fileInfo = $upload->getFileInfo ();
        $image = $fileInfo ['image'];
        $isUpload = false;
        if ($image ['size'] > 0) {
            $ext = pathinfo ( $image ['name'], PATHINFO_EXTENSION );
            $newName = basename ( $image ['name'], "." . $ext ) . '_' . uniqid () . '.' . strtolower ( $ext );
            
            $path = IMAGE_DIRECTORY_SLIDE . DS . $newName;
            $path_preview = IMAGE_DIRECTORY_SLIDE_PREVIEW . DS . $newName;
            Common_Func::uploadImage ( $image ['tmp_name'], $path, false );
            Common_Func::uploadImage ( $path, $path_preview );
            $opt ['fields'] ['image'] = $newName;
            $isUpload = true;
        }
        
        $opt ['fields'] ['title'] = isset ( $params ['title'] ) ? $params ['title'] : '';
        $opt ['fields'] ['url'] = isset ( $params ['url'] ) ? $params ['url'] : '';
        $opt ['fields'] ['type'] = isset ( $params ['type'] ) ? $params ['type'] : 1;
        if (isset ( $params ['id'] ) && $params ['id'] != '') {
            // Truong hop update
            $opt ['id'] = $params ['id'];
            $res = $obj->updateItem ( $opt );
            
            if ($res) {
                // Xoa image cu~ neu trong truong hop co upload image
                if ($isUpload) {
                    $filename = IMAGE_DIRECTORY_SLIDE . DS . $params ['image_old'];
                    $filename_preview = IMAGE_DIRECTORY_SLIDE_PREVIEW . DS . $params ['image_old'];
                    // $filename_preview = IMAGE_DIRECTORY_SLIDE_PREVIEW . DS .$params['image_old'];
                    if (file_exists ( $filename )) {
                        @unlink ( $filename );
                    }
                    if (file_exists ( $filename_preview )) {
                        @unlink ( $filename_preview );
                    }
                }
                $this->_helper->flashMessenger->addMessage ( "Banner has been edited." );
                if ($params ['access_redirect'] == 'save') {
                    return $this->redirector ( 'edit', 'slide', 'admin', array (
                            'id' => $params ['id'] 
                    ) );
                } else {
                    return $this->redirector ( 'index', 'slide', 'admin' );
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
                $this->_helper->flashMessenger->addMessage ( "Banner has been created." );
                if ($params ['access_redirect'] == 'save') {
                    return $this->redirector ( 'add', 'slide', 'admin' );
                } else {
                    return $this->redirector ( 'index', 'slide', 'admin' );
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