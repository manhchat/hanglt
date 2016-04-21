<?php
/**
 * Form_Admin_System.php
 *
 */

/**
 * Form_Admin_System
 *
 * @category   Common
 */
class Form_Admin_System extends Common_Form {
    
    public function init() {
    	$form_arr[] = $this->createElement('text', 'company', array('class'=>'form-control','maxlenght'=>'255'));
        $form_arr[] = $this->createElement('text', 'address', array('class'=>'form-control','maxlenght'=>'255'));
        $form_arr[] = $this->createElement('text', 'email', array('class'=>'form-control','maxlenght'=>'255'));
        $form_arr[] = $this->createElement('text', 'phone', array('class'=>'form-control','maxlenght'=>'255'));
        $this->addElements($form_arr);
        return $this;
    }
}