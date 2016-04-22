<?php
class ContactController extends Common_FrontController {
    public function indexAction() {
        $this->view->headTitle ( 'メールでのお問い合せ' );
        $this->view->headScript ()->appendFile ( $this->view->baseUrl ( 'js/front/contact.js' ) );
        $request = $this->getRequest ();
        if ($request->isPost ()) {
            $name = $this->getParam ( 'contact_name' );
            $email = $this->getParam ( 'contact_email' );
            $message = nl2br($this->getParam ( 'contact_message' ));
            $subject = '[WEBSITE] Message from customer.';
            $body = "お名前/法人名： 　{$name}<br>";
            $body .= "メールアドレス： 　{$email}<br>";
            $body .= "お問い合せ内容：　{$message}";
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
                $this->_helper->flashMessenger->addMessage ( "お問い合せありがとうございます。<br>正常にメールを送信しました。" );
                $this->redirect ( 'contact/index' );
            } else {
                $this->redirect ( 'contact/index' );
            }
        }
        $this->view->messages = $this->_helper->flashMessenger->getMessages ();
    }
}

