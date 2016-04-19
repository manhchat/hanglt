<?php
/**
 * @author ChatDM
 */
abstract class Common_AjaxAdminController extends Common_AjaxController
{
    
    public function init()
    {
        parent::init();
        if (!Common_Authentication::isAuth()) {
            throw new Exception('Access denied');
        }
    }
    
}