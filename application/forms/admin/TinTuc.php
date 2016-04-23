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
class Form_Admin_TinTuc extends Common_Form {
    public function init() {
        $form_arr [] = $this->createElement ( 'text', 'title', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $form_arr [] = $this->createElement ( 'textarea', 'summary', array (
                'class' => 'form-control',
                'rows' => '2',
                'cols' => 3,
                'maxlength' => 300 
        ) );
        $form_arr [] = $this->createElement ( 'textarea', 'body', array (
                'class' => 'form-control ckeditor',
                'rows' => '2',
                'cols' => 3 
        ) );
        $this->addElements ( $form_arr );
        return $this;
    }
}