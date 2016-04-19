<?php
/**
 * Form.php
 *
 * @author     ChatDM
 */

/**
 * Common Form
 *
 * @category   Common
 */
require_once 'Zend/Form.php';
class Common_Form extends Zend_Form 
{
    public $lang;
    public $msg = array();
    public $isError = false;
    private $_request;
    protected $typeHtml5 = array('email', 'url', 'number', 'range', 'tel', 'search', 'color');
    public $_locale = array();
    /**
     * コンストラクター
     * @return void
     */
    public function __construct($option=null) 
    {
        $this->lang = Common_Message::getAll();
        parent::__construct($option);
        
        $this->_request = Zend_Controller_Front::getInstance()->getRequest();
    }
    
    /**
     * VN_Add multiple elements at once
     * JP_複数の要素を同時に付加
     * 
     * @param  array $elements
     * @return Zend_Form
     */
    public function addElements(array $elements)
    {
        foreach ($elements as $key => $spec) {
            $spec->removeDecorator('Errors');
            $spec->removeDecorator('HtmlTag');
            $spec->removeDecorator('Label');
            $elements[$key] = $spec;
        }
        
        return parent::addElements($elements);
    }
    
    /**
     * VN_Get element form
     * JP_
     * 
     * @see Zend_Form::getElement()
     */
    public function getElement($name, $key='')
    {
        $element = parent::getElement($name);
        if ($key != '') {
            $oldClass = $element->getAttrib('class');
            $element->setAttrib('class', $oldClass.' error');
        }
        
        return $element;
    }
    /**
     * VN_Create an element
     * JP_要素を生成
     *
     * Acts as a factory for creating elements. Elements created with this
     * method will not be attached to the form, but will contain element
     * settings as specified in the form object (including plugin loader
     * prefix paths, default decorators, etc.).
     *
     * @param  string $type
     * @param  string $name
     * @param  array|Zend_Config $options
     * @return Zend_Form_Element
     */
    public function createElement($type, $name, $options = null)
    {
        if (!in_array($type, $this->typeHtml5)) {
            $element = parent::createElement($type, $name, $options);
        } else { 
            $options['typeHtml5'] =  $type;
            $type = 'text';
            $element = parent::createElement($type, $name, $options);
        }
        $element->removeDecorator('Errors');
        $element->removeDecorator('HtmlTag');
        $element->removeDecorator('Label');

        return $element;
    }
    
    public function createElementHtml5($type, $name, $options = null)
    {
        $element = new Common_Form_Element_Html5($type, $name, $options);
        $element->setAttribs(array('type' => $type));
        $element->removeDecorator('Errors');
        $element->removeDecorator('HtmlTag');
        $element->removeDecorator('Label');
    
        return $element;
    }

    /**
     * 値をフォームに設定する
     * @param array $data
     */
    public function setDataToForm($data=array()) 
    {
        if (!is_array($data)) {
            return $this;
        }
        foreach ($data as $item=>$value) {
            if ($this->__isset($item)) {
                $this->getElement($item)->setValue($value);
            }
        }
        return $this;
    }
    
    /**
     * データフォームをクリアする
     * @return void
     */
    public function clearDataToForm() 
    {
        foreach ($this->getElements() as $name=>$item) {
            $this->getElement($name)->setValue('');
        }
        return $this;
    }
    
    /**
     * 
     */
    public function setDataFromRequest()
    {
        $params = $this->_request->getParams();
        foreach ($this->getElements() as $name=>$item) {
            if (isset($params[$name]) && $this->__isset($name)) {
                $this->getElement($name)->setValue($params[$name]);
            }
        }
        return $this;
    }
    
    /**
     * 
     * @param string $name
     * @param mixed $value
     */
    public function setValue($name, $value)
    {
        $this->setDefault($name, $value);
    }
    
    /**
     * 
     * @param string $name
     * @param mixed $value
     * @return string
     */
    public function getDisplayOfOption($name, $valueDefault=NULL)
    {
        $value = is_null($valueDefault) ? $this->getValue($name) : $valueDefault;
        $options = $this->getElement($name)->getMultiOptions();
        return isset($options[$value]) ? $options[$value] : NULL;
    }
    
    public function getHtmlDisplay($name, $valueDefault=NULL)
    {
        $type = $this->getElement($name)->getType();
        if ($type == 'Zend_Form_Element_Select'
            || $type == 'Zend_Form_Element_Radio') {
            $value = $this->getDisplayOfOption($name, $valueDefault);
            $value = Common_Func::specialChars($value);
        } elseif($type == 'Zend_Form_Element_Textarea') {
            $value = is_null($valueDefault) ? $this->getValue($name) : $valueDefault;
            $value = Common_Func::specialChars($value);
            $value = nl2br($value);
        } else {
            $value = is_null($valueDefault) ? $this->getValue($name) : $valueDefault;
            $value = Common_Func::specialChars($value);
        }
        
        return $value;
    }
    
    public function getHtmlHidden($name, $valueDefault=NULL) {
        $value = is_null($valueDefault) ? $this->getValue($name) : $valueDefault;
        $value = Common_Func::specialChars($value);
        $html = '<input type="hidden" name="'.$name.'" id="'.$name.'" value="'.$value.'"/>';
        return $html;
    }
    
    public function getRequest()
    {
        return Zend_Controller_Front::getInstance()->getRequest();
    }
    
    public function getElementHtml5($name, $key='')
    {
        $element = parent::getElement($name);
        if ($key != '') {
            $oldClass = $element->getAttrib('class');
            $element->setAttrib('class', $oldClass.' error');
        }
        
        $attribs = $element->getAttribs();
        if (!isset($attribs['typeHtml5'])) {
            return $element;
        }
        
        $attribs['type'] = $attribs['typeHtml5'];
        unset($attribs['typeHtml5']);
        
        // build the element
        $disabled = '';
        if ($element->getAttrib('disabled')) {
            // disabled
            $disabled = ' disabled="disabled"';
        }
    
        // XHTML or HTML end tag?
        $endTag = ' />';
        if (!$this->getView()->doctype()->isXhtml()) {
            $endTag= '>';
        }
    
        $xhtml = '<input'
                . ' type="' . (($attribs['type'])?($this->getView()->escape($attribs['type'])):'text') . '"'
                        . ' name="' . $this->getView()->escape($element->getName()) . '"'
                                . ' id="' . $this->getView()->escape($element->getId()) . '"'
                                        . ' value="' . $this->getView()->escape($element->getValue()) . '"'
                                                . $disabled
                                                . $this->_htmlAttribs($attribs)
                                                . $endTag;
    
        return $xhtml;
    }
    
    /**
     * 
     * @param array $attribs
     * @return string
     */
    private function _htmlAttribs($attribs=array())
    {
        if (isset($attribs['type'])) {
            unset($attribs['type']);
        }
        if (isset($attribs['name'])) {
            unset($attribs['name']);
        }
        if (isset($attribs['id'])) {
            unset($attribs['id']);
        }
        if (isset($attribs['value'])) {
            unset($attribs['value']);
        }
        if (isset($attribs['typeHtml5'])) {
            unset($attribs['typeHtml5']);
        }
        $html = '';
        foreach ($attribs  as $key=>$val) {
            $html.= ' '.$key . '="'.$this->getView()->escape($val).'"';
        }
        
        return $html;
    }
}