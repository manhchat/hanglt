<?php
class LienHeController extends Common_FrontController {
    public function indexAction() {
        if (! Common_Func::isMobile ()) {
            return $this->forward ( 'index-pc' );
        }
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/mobile_common.css', 'all' ) );
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/mobile_style.css', 'all' ) );
        $this->view->headTitle ( 'Laptop EDG | Liên hệ' );
    }
    public function indexPcAction() {
        $this->view->headTitle ( 'Laptop EDG | Liên hệ' );
        $this->_helper->_layout->setLayout ( 'layout.contact.pc' );
        $this->appendFilePc ();
        $request = $this->getRequest ();
        $name = $this->getParam ( 'contact_name' );
        $email = $this->getParam ( 'contact_email' );
        $subject = $this->lang ['mail_subject'];
        $message = $this->getParam ( 'contact_message' );
        $body = 'Tôi là ' . $name . "<br>";
        $body .= $message;
        if ($request->isPost ()) {
            $config = array (
                    'auth' => 'login',
                    'username' => EMAIL_ADMIN,
                    'password' => EMAIL_PASSWORD,
                    'ssl' => 'tls',
                    'port' => 587 
            );
            $transport = new Zend_Mail_Transport_Smtp ( 'smtp.gmail.com', $config );
            
            // Prepare email
            $mail = new Zend_Mail ( 'UTF-8' );
            $mail->addTo ( EMAIL_ADMIN );
            $mail->setSubject ( $subject );
            $mail->setBodyHtml ( $body );
            $mail->setFrom ( $email, $name );
            // Send it!
            $sent = true;
            try {
                $mail->send ( $transport );
            } catch ( Exception $e ) {
                $sent = false;
            }
            if ($sent) {
                $this->_helper->flashMessenger->addMessage ( "Gửi email thành công." );
                $this->redirect ( 'lien-he/index' );
            } else {
                $this->_helper->flashMessenger->addMessage ( "Gửi email thất bại." );
                $this->redirect ( 'lien-he/index' );
            }
        }
        $this->view->messages = $this->_helper->flashMessenger->getMessages ();
    }
}

