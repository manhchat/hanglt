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
class Form_Admin_Product extends Common_Form {
    public function init() {
        $form_arr [] = $this->createElement ( 'text', 'product_name', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        // promotion
        $obj = new Model_Category ();
        $total = 0;
        $opt = array (
                'sort_by' => 'item_order',
                'sort_order' => 'ASC',
                'parent_id' => 'IS_NULL' 
        );
        $data = $obj->getItems ( $opt, $total, false );
        $option [''] = '...Chose...';
        foreach ( $data as $key => $value ) {
            $option [$value ['id']] = $value ['category_name'];
        }
        $form_arr [] = $this->createElement ( 'select', 'cid', array (
                'multiOptions' => $option,
                'class' => 'form-control form-filter input-sm' 
        ) );
        $form_arr [] = $this->createElement ( 'text', 'color ', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $form_arr [] = $this->createElement ( 'text', 'weight ', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $form_arr [] = $this->createElement ( 'text', 'size ', array (
                'class' => 'form-control',
                'maxlenght' => '255' 
        ) );
        $form_arr [] = $this->createElement ( 'textarea', 'description', array (
                'class' => 'form-control ckeditor',
                'rows' => '2',
                'cols' => 3 
        ) );
        $form_arr [] = $this->createElement ( 'text', 'price', array (
                'class' => 'form-control',
                'maxlenght' => '11' 
        ) );
        $this->addElements ( $form_arr );
        return $this;
    }
}