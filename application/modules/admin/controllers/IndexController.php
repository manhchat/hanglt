<?php
/**
 * IndexController.php
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */
require_once (realpath ( APPLICATION_PATH . '/forms/admin/Index.php' )); // set the right path
require_once(realpath(APPLICATION_PATH . '/forms/admin/System.php'));
class Admin_IndexController extends Common_AdminController {
public function indexAction()
    {
        $this->view->headTitle('Admin system');
        $this->view->messages = $this->_helper->flashMessenger->getMessages();
        $form = new Form_Admin_System();
        
        $obj = new Model_System();
        $data = $obj->getItem();
        $form = new Form_Admin_System();
        $form->setDataToForm($data);
        $this->view->id = isset($data['id']) ? $data['id'] : '';
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
    	$obj = new Model_System();
    	$opt['fields']['company'] = $params['company'];
    	$opt['fields']['address'] = $params['address'];
    	$opt['fields']['phone'] = $params['phone'];
    	$opt['fields']['email'] = $params['email'];
    	if ($params['id'] == '') {
    	    $res = $obj->insertItem($opt);
    	} else {
    	    $res = $obj->updateItem($opt, array('id = ?' => $params['id']));
    	}
    	if ($res) {
    		$this->_helper->flashMessenger->addMessage("Data has been saved.");
    	} else {
    		$message    = '<div class="alert alert-danger display-hide" style="display: block;">
                                <button data-close="alert" class="close"></button>
                                System error please check your system.
                            </div>';
    		$this->_helper->flashMessenger->addMessage($message);
    	}
    	return $this->redirector('index', 'index', 'admin');
    }
    public function navAction() {
        $params = $this->getRequest ()->getParams ();
        
        $module = $params ['module'];
        $controller = $params ['controller'];
        $action = $params ['action'];
        $navi = $this->getNavi ();
        
        $naviOut = array ();
        foreach ( $navi as $item ) {
            if ($item ['module'] == $module && ($item ['controller'] == $controller || (isset ( $item ['childs'] ) && in_array ( $controller, $item ['childs'] )))) {
                $item ['selected'] = 'true';
            } else {
                $item ['selected'] = 'false';
            }
            
            if (isset ( $item ['isLink'] ) && ! $item ['isLink']) {
                $item ['link'] = '#';
            } else {
                $item ['link'] = $this->view->url ( array (
                        'module' => $item ['module'],
                        'controller' => $item ['controller'],
                        'action' => $item ['action'] 
                ), null, true );
            }
            array_push ( $naviOut, $item );
        }
        
        $this->view->naviOut = $naviOut;
    }
    private function getNavi() {
        $navi = array (
                array (
                        'module' => 'admin',
                        'action' => 'index',
                        'controller' => 'index',
                        'title' => 'Home',
                        'class' => 'top' 
                ),
                array (
                        'module' => 'admin',
                        'action' => 'index',
                        'controller' => 'category',
                        'title' => 'Category',
                        'childs' => array () 
                ),
                array (
                        'module' => 'admin',
                        'action' => 'index',
                        'controller' => 'product',
                        'title' => 'Product',
                        'childs' => array () 
                ),
                /* array (
                        'module' => 'admin',
                        'action' => 'index',
                        'controller' => 'news',
                        'title' => 'Services information',
                        'childs' => array () 
                ), */
                array (
                        'module' => 'admin',
                        'action' => 'index',
                        'controller' => 'tin-tuc',
                        'title' => 'News',
                        'childs' => array () 
                ),
                array (
                        'module' => 'admin',
                        'action' => 'index',
                        'controller' => 'slide',
                        'title' => 'Banner',
                        'childs' => array () 
                ) 
        );
        return $navi;
    }
}
