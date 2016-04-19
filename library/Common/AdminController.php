<?php
/**
 * @author ChatDM
 */
abstract class Common_AdminController extends Common_BaseController
{
    protected $requireLogin = TRUE;
    
    public function init() {
        parent::init();
        if (!Common_Authentication::isAuth()) {
            return $this->redirector('index', 'login');
        }
        Raonhanh_Session::updateExpirationSeconds(SESSION_LIFETIME);
    }
    public function preDispatch()
    {
        parent::preDispatch();
        $this->view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=UTF-8');
        $this->view->headMeta()->appendHttpEquiv('Content-Style-Type', 'text/css');
        $this->view->headMeta()->appendHttpEquiv('Content-Script-Type', 'text/javaScript');
        
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('assets/global/plugins/font-awesome/css/font-awesome.min.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('assets/global/plugins/bootstrap/css/bootstrap.min.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('assets/global/plugins/uniform/css/uniform.default.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('assets/global/plugins/select2/select2.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('assets/global/plugins/bootstrap-datepicker/css/datepicker.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('assets/global/css/components.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('assets/global/css/plugins.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/admin/global.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('assets/global/plugins/fancybox/source/jquery.fancybox.css'));
        $this->view->headLink()->appendStylesheet($this->view->baseUrl('css/admin/dropzone.css'));
        
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/jquery-migrate.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/jquery-ui/jquery-ui.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/bootstrap/js/bootstrap.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/jquery.blockui.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/jquery.cokie.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/uniform/jquery.uniform.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/select2/select2.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/plupload/js/plupload.full.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/jquery-validation/js/jquery.validate.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/jquery-validation/js/additional-methods.min.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js'));
        $script = 'var ROOT_PATH = "'.$this->view->baseUrl().'";';
        $this->view->headScript()->appendScript($script, $type = 'text/javascript');
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/scripts/metronic.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/global/scripts/datatable.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('assets/ckeditor/ckeditor.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/common/index.js'));
        $this->view->headScript()->appendFile($this->view->baseUrl('js/dropzone.js'));
    }
    public function url(array $array, $null=null, $true=true, $false=false)
    {
        if (isset($array['url_alias'])) {
            $array['url_alias'] = Common_Func::urlAlias($array['url_alias']);
        }
        return $this->view->url($array ,$null, $true, $false);
    }
    
    public function disableLayout()
    {
        return $this->_helper->layout->disableLayout();
    }
    
    public function setNoRender($option=true)
    {
        return  $this->_helper->viewRenderer->setNoRender($option);
    }
}