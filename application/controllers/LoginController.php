<?php
/**
 * IndexController.php
 *
 * @copyright  ChatDM
 * @author     ChatDM
 */
class LoginController extends Common_BaseController {
    public function indexAction() {
        if (Common_Authentication::isAuth ()) {
            return $this->redirector ( 'index', 'index', 'admin' );
        }
        $form = new Form_Login ();
        $this->disableLayout ();
        $request = $this->getRequest ();
        if ($request->isPost ()) {
            $params = $request->getParams ();
            $obj = new Model_User ();
            $userArr = $obj->loginAuth ( $params ['username'], $params ['password'] );
            if ($userArr) {
                Common_Authentication::setUser ( $userArr );
                return $this->redirector ( 'index', 'index', 'admin' );
            } else {
                $form->setDataFromRequest ();
                $this->view->message = "Sai tên đăng nhập hoặc mật khẩu.";
            }
        }
        $this->view->form = $form;
    }
    public function logoutAction() {
        $this->disableLayout ();
        $this->setNoRender ();
        Common_Authentication::logout ();
        return $this->redirector ( 'index', 'login' );
    }
}
