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
class Form_Admin_Category extends Common_Form {
    public function init() {
        $form_arr [] = $this->createElement ( 'text', 'category_name', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $form_arr [] = $this->createElement ( 'text', 'item_order', array (
                'class' => 'form-control',
                'maxlenght' => '11' 
        ) );
        $this->addElements ( $form_arr );
        return $this;
    }
}