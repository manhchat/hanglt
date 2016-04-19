<?php
class Ajax_Bootstrap extends Zend_Application_Module_Bootstrap {
    protected function _initAutoload() {
        $autoloader = new Zend_Application_Module_Autoloader ( array (
                'namespace' => 'Ajax_',
                'basePath' => APPLICATION_PATH . '/modules/ajax' 
        ) );
        return $autoloader;
    }
}
