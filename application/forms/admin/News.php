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
class Form_Admin_News extends Common_Form {
    public function init() {
        $category = Common_Codedef::getID ( 'CATEGORY_COMMON' );
        $form_arr [] = $this->createElement ( 'text', 'title', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $form_arr [] = $this->createElement ( 'select', 'category', array (
                'multiOptions' => $category,
                'class' => 'form-control form-filter input-sm' 
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