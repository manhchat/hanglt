<?php
/**
 * Index.php
 *
 */

/**
 * Form_Index
 *
 * @category Common
 */
class Form_Admin_Index extends Common_Form {
    public function init() {
        $form_arr [] = $this->createElement ( 'text', 'seo_keyword', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $form_arr [] = $this->createElement ( 'text', 'title', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $form_arr [] = $this->createElement ( 'text', 'email', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $form_arr [] = $this->createElement ( 'text', 'phone', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        
        $this->addElements ( $form_arr );
        return $this;
    }
}