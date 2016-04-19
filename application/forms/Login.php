<?php
/**
 * Login.php
 *
 */

/**
 * Form_Login
 *
 * @category Common
 */
class Form_Login extends Common_Form {
    public function init() {
        $form_arr [] = $this->createElement ( 'text', 'username', array (
                'placeholder' => 'Username',
                'maxlenght' => '50' 
        ) );
        $form_arr [] = $this->createElement ( 'password', 'password', array (
                'autocomplete' => 'off',
                'placeholder' => 'Password' 
        ) );
        $form_arr [] = $this->createElement ( 'submit', 'submit', array (
                'label' => 'Login' 
        ) );
        $this->addElements ( $form_arr );
        return $this;
    }
}