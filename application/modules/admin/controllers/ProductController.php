<?php
/**
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */
//require_once(realpath(APPLICATION_PATH . '/../library/facebook-php-sdk-v4-4.0-dev/autoload.php')); // set the right path
require_once(realpath(APPLICATION_PATH . '/forms/admin/Product.php')); // set the right path
class Admin_ProductController extends Common_AdminController
{
    public function indexAction()
    {
        $this->view->headScript()->appendFile($this->view->baseUrl('js/admin/product.js'));
        $this->view->headTitle('Product management');
        $obj = new Model_Category();
        $opt['status'] = 1;
        $opt['fields'] = array('id', 'category_name');
        $opt['sort_by'] = 'item_order';
        $opt['sort_order'] = 'ASC';
        $opt['parent_id'] = 'IS_NULL';
        $total = 0;
        $data = $obj->getItems($opt, $total, false);
        $this->view->dataCategory = $data;
        $this->view->messages = $this->_helper->flashMessenger->getMessages();
    }
    
    public function editAction()
    {
        $this->view->headScript()->appendFile($this->view->baseUrl('js/admin/product-edit.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/admin/upload_image.js'));
        $id = $this->getParam('id');
        if ($id == '') {
            return $this->redirect('admin/product/index');
        }
        $this->view->headTitle('Edit product');
        
        $obj = new Model_Product();
        //$opt['fields'] = array('id', 'title', 'cid', 'bid','cpu', 'ram', 'hdd', 'screen', 'image', 'body', 'price', 'promotion', 'technical_info', 'status', 'price_promotion', 'priority', 'bao_hanh');
        $opt['id'] = $id;
        $data = $obj->getItem($opt);
        $data['image_path'] = $this->view->baseUrl().PRODUCT_IMAGE_PATH.'/'.$data['image'];
        $data['image_path_preview'] = $this->view->baseUrl().PRODUCT_IMAGE_PATH_PREVIEW.'/'.$data['image'];
        $form = new Form_Admin_Product();
        $form->setDataToForm($data);
        $this->view->form = $form;
        
        $this->view->data = $data;
        $this->view->id = $id;
    }
    
    public function addAction() {
        $this->view->headScript()->appendFile($this->view->baseUrl('js/admin/product-add.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/admin/upload_image.js'));
        $this->view->headTitle('Create new product');
        $form = new Form_Admin_Product();
        $this->view->form = $form;
    }
    
    public function saveAction() {
        $this->setNoRender();
        $this->disableLayout();
        $request = $this->getRequest();
        $params = $request->getParams();
        if (!$request->isPost()) {
            return;
        }
        $obj = new Model_Product();
        $image_ids = $this->getParam('image', array());
        $upload = false;
        if (!empty($image_ids)) {
            $imgObj = new Model_ImageTmp();
            $dataImage = $imgObj->getImageTmp($image_ids);
            if (!empty($dataImage)) {
                $images = $this->copyImage($dataImage, IMAGE_DIRECTORY_PRODUCT);
                $this->copyImage($dataImage, IMAGE_DIRECTORY_PRODUCT_PREVIEW);
                $opt['fields']['image'] = json_encode($images);
            }
            $upload = true;
        }
        $opt['fields']['product_name'] = isset($params['product_name']) ? $params['product_name'] : '';
        $opt['fields']['cid'] = isset($params['cid']) ? $params['cid'] : 0;
        $opt['fields']['weight'] = isset($params['weight']) ? $params['weight'] : '';
        $opt['fields']['size'] = isset($params['size']) ? $params['size'] : '';
        $opt['fields']['color'] = isset($params['color']) ? $params['color'] : '';
        $opt['fields']['price'] = isset($params['price']) ? $params['price'] : 0;
        $opt['fields']['description'] = isset($params['description']) ? $params['description'] : '';
        
        if (isset($params['id']) && $params['id'] != '') {
            //Truong hop update
            $opt['id'] = $params['id'];
            $res = $obj->updateItem($opt);
            
            if ($res) {
                //Xoa image cu~ neu trong truong hop co upload image
                $this->_helper->flashMessenger->addMessage("Product has been updated.");
                if ($params['access_redirect'] == 'save') {
                    return $this->redirector('edit', 'product', 'admin', array('id' => $params['id']));
                } else {
                    return $this->redirector('index', 'product', 'admin');
                }
            } else {
                $message    = '<div class="alert alert-danger display-hide" style="display: block;">
                                <button data-close="alert" class="close"></button>
                                System error please check your system.
                            </div>';
                $this->_helper->flashMessenger->addMessage($message);
                return $this->redirector('index', 'index', 'admin');
            }
        } else {
            $res = $obj->insertItem($opt);
            if ($res) {
                $this->_helper->flashMessenger->addMessage ( "Product has been created." );
                if ($params ['access_redirect'] == 'save') {
                    return $this->redirector ( 'add', 'product', 'admin' );
                } else {
                    return $this->redirector ( 'index', 'product', 'admin' );
                }
            } else {
                $message    = '<div class="alert alert-danger display-hide" style="display: block;">
                                <button data-close="alert" class="close"></button>
                                System error please check your system.
                            </div>';
                $this->_helper->flashMessenger->addMessage($message);
                return $this->redirector('index', 'index', 'admin');
            }
        }
    }
    
    /**
     * Copy image from tmp folder
     * @param string $path
     * @param string $dest
     * @param int $id
     * @return boolean
     */
    private function copyImage($imageArr, $dest)
    {
        $ids = array();
        $imagePaths = array();
        foreach ($imageArr as $key => $value) {
            if ($dest == IMAGE_DIRECTORY_PRODUCT) {
                $pathImage = RESOURCE_IMAGE_UPLOADED.DS.'tmp'.DS.'large'.DS.$value['path'];
            } else {
                $pathImage = RESOURCE_IMAGE_UPLOADED.DS.'tmp'.DS.'preview'.DS.$value['path'];
            }
            $imageName = explode(DS, $value['path'])[1];
            $pathDest = $dest.DS.$imageName;
            if (copy($pathImage, $pathDest)) {
                array_push($ids, $value['id']);
                $pathImageFolderArr = explode(DS, $pathImage);
                array_pop($pathImageFolderArr);
                $pathImageFolder = implode(DS, $pathImageFolderArr);
                Common_Func::deleteFileAndFolder($pathImageFolder);
                array_push($imagePaths, $imageName);
            }
        }
        $obj = new Model_ImageTmp();
        $deleted = $obj->deleteItems($ids);
        if ($deleted) {
            return $imagePaths;
        }
        return false;
    }
}