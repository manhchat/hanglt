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
class Form_Admin_ChangePassword extends Common_Form {
    public function init() {
        $form_arr [] = $this->createElement ( 'password', 'password_old', array (
                'class' => 'form-control',
                'autocomplete' => 'off',
                'placeholder' => 'Mật khẩu cũ' 
        ) );
        $form_arr [] = $this->createElement ( 'password', 'password_new', array (
                'class' => 'form-control',
                'autocomplete' => 'off',
                'placeholder' => 'Mật khẩu mới' 
        ) );
        $form_arr [] = $this->createElement ( 'password', 'password_confirm', array (
                'class' => 'form-control',
                'autocomplete' => 'off',
                'placeholder' => 'Xác nhận mật khẩu' 
        ) );
        $this->addElements ( $form_arr );
        return $this;
    }
}