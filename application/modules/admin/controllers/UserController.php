<?php
/**
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */
require_once (realpath ( APPLICATION_PATH . '/forms/admin/ChangePassword.php' )); // set the right path
class Admin_UserController extends Common_AdminController {
    public function indexAction() {
    }
    public function changePasswordAction() {
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/admin/change-password.js' ) );
        $form = new Form_Admin_ChangePassword ();
        $this->view->headTitle ( 'Change password' );
        $this->view->messages = $this->_helper->flashMessenger->getMessages ();
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
        $obj = new Model_User ();
        $opt ['fields'] ['password'] = md5 ( $params ['password_new'] );
        $opt ['id'] = Common_Authentication::getID ( 'id' );
        $res = $obj->updateItem ( $opt );
        if ($res) {
            $this->_helper->flashMessenger->addMessage ( "Change password success." );
            if ($params ['access_redirect'] == 'save') {
                return $this->redirector ( 'change-password', 'user', 'admin' );
            } else {
                return $this->redirector ( 'index', 'index', 'admin' );
            }
        } else {
            $message = '<div class="alert alert-danger display-hide" style="display: block;">
                                <button data-close="alert" class="close"></button>
                               System error. Please check your system.
                            </div>';
            $this->_helper->flashMessenger->addMessage ( $message );
            return $this->redirector ( 'index', 'index', 'admin' );
        }
    }
}