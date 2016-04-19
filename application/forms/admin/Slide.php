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
class Form_Admin_Slide extends Common_Form {
    public function init() {
        $form_arr [] = $this->createElement ( 'text', 'title', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $form_arr [] = $this->createElement ( 'text', 'url', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $this->addElements ( $form_arr );
        return $this;
    }
}