<?php
/**
 * @author ChatDM
 */
abstract class Common_FrontController extends Common_BaseController
{
    
    
    public function preDispatch()
    {
        $this->view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=UTF-8');
        $this->view->headMeta()->appendHttpEquiv('Content-Style-Type', 'text/css');
        $this->view->headMeta()->appendHttpEquiv('Content-Script-Type', 'text/javaScript');
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/reset.css', 'all' ) );
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/style.css', 'all' ) );
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/tools.css', 'all' ) );
        $this->view->headLink ()->appendStylesheet ( $this->view->baseUrl ( 'css/front/lightbox.css', 'all' ) );
        $this->view->headScript()->prependFile($this->view->baseUrl('assets/global/plugins/jquery.min.js'));
    }
}