<?php
/**
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */
require_once (realpath ( APPLICATION_PATH . '/forms/admin/Category.php' )); // set the right path
class Admin_CategoryController extends Common_AdminController {
    public function indexAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/category.js' ) );
        $this->view->headTitle ( $this->lang ['admin_category_list_title'] );
        $this->view->messages = $this->_helper->flashMessenger->getMessages ();
    }
    public function editAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/category-edit.js' ) );
        $id = $this->getParam ( 'id' );
        if ($id == '') {
            return;
        }
        $form = new Form_Admin_Category ();
        $this->view->headTitle ( $this->lang ['admin_category_edit'] );
        
        $obj = new Model_Category ();
        $opt ['fields'] = array (
                'category_name',
                'item_order',
                'image' 
        );
        $opt ['id'] = $id;
        $data = $obj->getItem ( $opt );
        $data ['image_path_preview'] = $this->view->baseUrl () . CATEGORY_IMAGE_PATH_PREVIEW . '/' . $data ['image'];
        $data ['image_path'] = $this->view->baseUrl () . CATEGORY_IMAGE_PATH . '/' . $data ['image'];
        $form->setDataToForm ( $data );
        $this->view->form = $form;
        $this->view->data = $data;
        $this->view->id = $id;
    }
    public function addAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/category-add.js' ) );
        $this->view->headTitle ( 'Create new category' );
        $form = new Form_Admin_Category ();
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
        $obj = new Model_Category ();
        $upload = new Zend_File_Transfer ();
        $fileInfo = $upload->getFileInfo ();
        $image = $fileInfo ['image'];
        $isUpload = false;
        if ($image ['size'] > 0) {
            $ext = pathinfo ( $image ['name'], PATHINFO_EXTENSION );
            $newName = basename ( $image ['name'], "." . $ext ) . '_' . uniqid () . '.' . strtolower ( $ext );
            
            $path = IMAGE_DIRECTORY_CATEGORY . DS . $newName;
            $path_preview = IMAGE_DIRECTORY_CATEGORY_PREVIEW . DS . $newName;
            Common_Func::uploadImage ( $image ['tmp_name'], $path, false );
            Common_Func::uploadImage ( $path, $path_preview );
            $opt ['fields'] ['image'] = $newName;
            $isUpload = true;
        }
        
        $opt ['fields'] ['category_name'] = isset ( $params ['category_name'] ) ? $params ['category_name'] : '';
        $opt ['fields'] ['item_order'] = isset ( $params ['item_order'] ) ? $params ['item_order'] : 0;
        
        if (isset ( $params ['id'] ) && $params ['id'] != '') {
            // Truong hop update
            $opt ['id'] = $params ['id'];
            $res = $obj->updateItem ( $opt );
            
            if ($res) {
                // Xoa image cu~ neu trong truong hop co upload image
                if ($isUpload) {
                    $filename = IMAGE_DIRECTORY_CATEGORY . DS . $params ['image_old'];
                    $filename_preview = IMAGE_DIRECTORY_CATEGORY_PREVIEW . DS . $params ['image_old'];
                    if (file_exists ( $filename )) {
                        @unlink ( $filename );
                    }
                    if (file_exists ( $filename_preview )) {
                        @unlink ( $filename_preview );
                    }
                }
                $this->_helper->flashMessenger->addMessage ( "Category has been edited." );
                if ($params ['access_redirect'] == 'save') {
                    return $this->redirector ( 'edit', 'category', 'admin', array (
                            'id' => $params ['id'] 
                    ) );
                } else {
                    return $this->redirector ( 'index', 'category', 'admin' );
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
                $this->_helper->flashMessenger->addMessage ( "Category has been created." );
                if ($params ['access_redirect'] == 'save') {
                    return $this->redirector ( 'add', 'category', 'admin' );
                } else {
                    return $this->redirector ( 'index', 'category', 'admin' );
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