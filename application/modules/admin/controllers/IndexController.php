<?php
/**
 * IndexController.php
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */
require_once (realpath ( APPLICATION_PATH . '/forms/admin/Index.php' )); // set the right path
class Admin_IndexController extends Common_AdminController {
    public function indexAction() {
        $this->view->headTitle ( 'Admin system' );
        $this->view->messages = $this->_helper->flashMessenger->getMessages ();
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
                array (
                        'module' => 'admin',
                        'action' => 'index',
                        'controller' => 'news',
                        'title' => 'Services information',
                        'childs' => array () 
                ),
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
