<?php
/**
 * Layouts
 * @author ChatDM
 */
class Common_Plugin_Layouts extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        $this->setRequest($request);
        $module = $request->getModuleName();
        $layoutOjb = Zend_Layout::getMvcInstance();
        $layout = $layoutOjb->getLayout();
        
        $layoutPath = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $module . 
                        DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'layouts';
        if (file_exists($layoutPath)) {
            $pathLay = $layoutPath;
        } else {
            $pathLay = APPLICATION_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'layouts';
        }
        if ($layout && $pathLay . DIRECTORY_SEPARATOR . $layout . '.phtml') {
            $option = array('layout' => $layout, 'layoutPath' => $pathLay);
            Zend_Layout::startMvc($option);
        }
    }
}