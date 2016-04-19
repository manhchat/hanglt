<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
    protected function _initAutoload() {
        $autoloader = new Zend_Application_Module_Autoloader ( array (
                'namespace' => '',
                'basePath' => APPLICATION_PATH 
        ) );
        return $autoloader;
    }
    protected function _initDatabase() {
        // Loading data connect
        $db = $this->getPluginResource ( 'db' )->getDbAdapter ();
        Zend_Registry::set ( 'db', $db );
    }
    protected function _initApplication() {
        // Loading application
        require APPLICATION_PATH . '/configs/const.config.php';
        
        $locale = new Zend_Locale ();
        $httpLang = $locale->getLanguage ();
        $filepath = APPLICATION_PATH . '/configs/message.' . $httpLang . '.php';
        
        /*
         * if (file_exists($filepath)) { Mw_Message::init($filepath); }
         */
        
        // TODO Set language to screen
        Common_Message::init ( $httpLang, 'jp' );
        // Zensho_Message::export('ja', 'ja');
    }
    protected function _initPlugins() {
        // Access plugin
        $front = Zend_Controller_Front::getInstance ();
        $front->registerPlugin ( new Common_Plugin_Layouts () );
    }
    protected function _initRouter() {
        /*
         * $frontController = Zend_Controller_Front::getInstance(); $router = $frontController->getRouter(); $route = new Zend_Controller_Router_Route_Regex( URL_LIST_PRODUCT.'/(.+)-(\d+)\.'.END_URL, array( 'module' => 'default', 'controller' => 'danh-sach', 'action' => 'san-pham' ), array( 2 => 'cid', 1 => 'category_name' ), URL_LIST_PRODUCT.'/%s-%d.'.END_URL ); $router->addRoute('danhSachSanPham', $route); $route2 = new Zend_Controller_Router_Route_Regex( URL_DETAIL_PRODUCT.'/(.+)-(\d+)\.'.END_URL, array( 'module' => 'default', 'controller' => 'detail', 'action' => 'index' ), array( 2 => 'id', 1 => 'title' ), URL_DETAIL_PRODUCT.'/%s-%d.'.END_URL ); $router->addRoute('detailIndex', $route2); $route3 = new Zend_Controller_Router_Route_Regex( URL_SERVICES.'/(.+)-(\d+)\.'.END_URL, array( 'module' => 'default', 'controller' => 'thong-tin', 'action' => 'index' ), array( 2 => 'category', 1 => 'title' ), URL_SERVICES.'/%s-%d.'.END_URL ); $router->addRoute('thongTinIndex', $route3); $route4 = new Zend_Controller_Router_Route_Regex( URL_NEWS_LIST.'/(.+)-(\d+)\.'.END_URL, array( 'module' => 'default', 'controller' => 'tin-tuc', 'action' => 'danh-sach' ), array( 2 => 'category', 1 => 'title' ), URL_NEWS_LIST.'/%s-%d.'.END_URL ); $router->addRoute('tinTucDanhSach', $route4); $route5 = new Zend_Controller_Router_Route_Regex( URL_NEWS_DETAIL.'/(.+)-(\d+)\.'.END_URL, array( 'module' => 'default', 'controller' => 'tin-tuc', 'action' => 'index' ), array( 2 => 'id', 1 => 'title' ), URL_NEWS_DETAIL.'/%s-%d.'.END_URL ); $router->addRoute('tinTucIndex', $route5);
         */
    }
}

