<?php
class Admin_Bootstrap extends Zend_Application_Module_Bootstrap {
    protected function _initAutoload() {
        Raonhanh_Session::init ( array (
                'Namespace' => SESSION_NAMESPACE,
                'ExpirationSeconds' => SESSION_LIFETIME 
        ) );
        $autoloader = new Zend_Application_Module_Autoloader ( array (
                'namespace' => 'Admin_',
                'basePath' => APPLICATION_PATH . '/modules/admin' 
        ) );
        return $autoloader;
    }
}
