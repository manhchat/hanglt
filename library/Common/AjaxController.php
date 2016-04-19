<?php
/**
 * @author ChatDM
 */
abstract class Common_AjaxController extends Zend_Controller_Action
{
    protected $lang = array();
    
    public function init()
    {
        parent::init();
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout->disableLayout();
        $this->lang = Common_Message::getAll();
    }
    
    public function jsonEncode($data = array()) {
        if (IS_DEBUG === TRUE) {
            $data['sql'] = Common_Debug::printSql();
        }
        return Zend_Json::encode($data);
    }
    
    public function jsonDecode($data = array()) {
        return Zend_Json::decode($data);
    }
    
    /**
     * API 処理の Template Method.
     *
     * @return void
     */
    public function indexAction()
    {
        try {
            $this->initialize();
    
            $this->execute();
    
        } catch (Exception $e) {
    
            $this->errorHandler($e);
        }
    }
    
    /**
     * @see Api::initialize()
     */
    public function initialize()
    {
        /* Log */
        Raonhanh_Log::init(LOG_DIRECTORY_PATH, API_LOG_FILE, LOG_LEVEL);
    
    }
    
/**
     * @see Api::errorHandler()
     */
    public function errorHandler(Exception $e)
    {
        // エラーJSON返却処理
        $this->jsonEncode(array(
                'result'  => $result,
                'message' => $e->getMessage(),
                'sql' => Common_Debug::printSql()
        ));
    }
}