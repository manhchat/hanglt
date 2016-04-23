<?php
/**
 * ZM2000Controller.php
 *
 * @copyright  Copyright 2013 MICROWAVE CO.,LTD. (http://www.micro-wave.net/)
 * @author     MICROWAVE
 */
class Ajax_AdminController extends Common_AjaxAdminController {
    public function categoryAction() {
        $request = $this->getRequest ();
        $params = $request->getParams ();
        $obj = new Model_Category ();
        $iTotalRecords = 0;
        $iDisplayLength = isset ( $params ['length'] ) ? intval ( $params ['length'] ) : 0;
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = isset ( $params ['start'] ) ? intval ( $params ['start'] ) : 0;
        $iDisplayStart = $iDisplayStart < 0 ? 0 : $iDisplayStart;
        $sEcho = isset ( $params ['draw'] ) ? intval ( $params ['draw'] ) : 0;
        $sEcho = $sEcho < 0 ? 0 : $sEcho;
        
        $records = array ();
        $records ["data"] = array ();
        
        // save data
        if (isset ( $params ["customActionType"] ) && $params ["customActionType"] == "group_action") {
            $ids = isset ( $params ['id'] ) ? ( array ) $params ['id'] : array ();
            if (empty ( $ids )) {
                $actionStatus = "FAIL";
                $actionMessage = "Select data to be deleted.";
            } else {
                switch ($params ["customActionName"]) {
                    case 'delete' :
                        // Deleting multiple rows
                        $result = $obj->deleteItem ( array (
                                'ids' => $ids 
                        ) );
                        if (! $result) {
                            $actionStatus = "FAIL";
                            $actionMessage = "Delete data failed.";
                        } else {
                            $actionStatus = "OK";
                            $actionMessage = "Data has been deleted.";
                        }
                        break;
                }
            }
            
            $records ["customActionStatus"] = $actionStatus; // pass custom message(useful for getting status of group actions)
            $records ["customActionMessage"] = $actionMessage; // pass custom message(useful for getting status of group actions)
        }
        // filter data
        $opt = array ();
        if (isset ( $params ['id'] ) && ! empty ( $params ['id'] )) {
            $opt ['id'] = $params ['id'];
        }
        
        if (isset ( $params ['category_name'] ) && ! empty ( $params ['category_name'] )) {
            $opt ['category_name'] = $params ['category_name'];
        }
        if (isset ( $params ['item_order'] ) && $params ['item_order'] !== '') {
            $opt ['item_order'] = intval ( $params ['item_order'] );
        }
        if (isset ( $params ['modified_from'] ) && ! empty ( $params ['modified_from'] )) {
            $opt ['modified_from'] = $params ['modified_from'];
        }
        if (isset ( $params ['modified_to'] ) && ! empty ( $params ['modified_to'] )) {
            $opt ['modified_to'] = $params ['modified_to'];
        }
        
        // SORT FILTER
        $order = isset ( $params ['order'] ) ? $params ['order'] : array ();
        $sort_by = 'id';
        $sort_order = 'desc';
        if (! empty ( $order )) {
            $column = $order [0] ['column'];
            $sort_order = $order [0] ['dir'];
            switch ($column) {
                case 1 :
                    $sort_by = 'category_name';
                    break;
                case 3 :
                    $sort_by = 'item_order';
                    break;
                case 4 :
                    $sort_by = 'update_timestamp';
                    break;
                default :
                    $sort_by = 'item_order';
                    break;
            }
        }
        
        $opt ['sort_by'] = $sort_by;
        $opt ['sort_order'] = $sort_order;
        
        $opt ['index'] = $iDisplayStart;
        $opt ['size'] = $iDisplayLength;
        $opt ['categories_fields'] = array (
                'name' 
        );
        $items = $obj->getItems ( $opt, $iTotalRecords );
        
        foreach ( $items as $item ) {
            $_record = array ();
            $_record [] = '<input type="checkbox" name="id[]" value="' . $item ['id'] . '">';
            $_record [] = $item ['category_name'];
            $image_path = $this->view->baseUrl () . CATEGORY_IMAGE_PATH . '/' . $item ['image'];
            $image_path_preview = $this->view->baseUrl () . CATEGORY_IMAGE_PATH_PREVIEW . '/' . $item ['image'];
            $_record [] = '<a class="fancybox-image" href="' . $image_path . '"><img src="' . $image_path_preview . '" title="' . $item ['category_name'] . '" alt="' . $item ['category_name'] . '" width="100"/></a>';
            $_record [] = $item ['item_order'];
            $_record [] = date ( 'H:i:s d-m-Y', $item ['update_timestamp'] );
            $_record [] = '<a class="btn btn-xs default btn-editable" href="' . $this->view->baseUrl ( 'admin/category/edit/id/' . $item ['id'] ) . '"><i class="fa fa-edit"></i> Edit</a>';
            $records ["data"] [] = $_record;
        }
        $records ["draw"] = $sEcho;
        $records ["recordsTotal"] = $iTotalRecords;
        $records ["recordsFiltered"] = $iTotalRecords;
        
        echo $this->jsonEncode ( $records );
    }
    public function categoryChildAction() {
        $request = $this->getRequest ();
        $params = $request->getParams ();
        $obj = new Model_Category ();
        $iTotalRecords = 0;
        $iDisplayLength = isset ( $params ['length'] ) ? intval ( $params ['length'] ) : 0;
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = isset ( $params ['start'] ) ? intval ( $params ['start'] ) : 0;
        $iDisplayStart = $iDisplayStart < 0 ? 0 : $iDisplayStart;
        $sEcho = isset ( $params ['draw'] ) ? intval ( $params ['draw'] ) : 0;
        $sEcho = $sEcho < 0 ? 0 : $sEcho;
        
        $records = array ();
        $records ["data"] = array ();
        
        // save data
        if (isset ( $params ["customActionType"] ) && $params ["customActionType"] == "group_action") {
            $ids = isset ( $params ['id'] ) ? ( array ) $params ['id'] : array ();
            if (empty ( $ids )) {
                $actionStatus = "FAIL";
                $actionMessage = "Select data to be deleted.";
            } else {
                switch ($params ["customActionName"]) {
                    case 'delete' :
                        // Deleting multiple rows
                        $result = $obj->deleteItem ( array (
                                'ids' => $ids 
                        ) );
                        $actionStatus = "OK";
                        $actionMessage = "Data has been deleted.";
                        break;
                }
            }
            
            $records ["customActionStatus"] = $actionStatus; // pass custom message(useful for getting status of group actions)
            $records ["customActionMessage"] = $actionMessage; // pass custom message(useful for getting status of group actions)
        }
        // filter data
        $opt = array ();
        if (isset ( $params ['id'] ) && ! empty ( $params ['id'] )) {
            $opt ['id'] = $params ['id'];
        }
        
        if (isset ( $params ['name'] ) && ! empty ( $params ['name'] )) {
            $opt ['name'] = $params ['name'];
        }
        if (isset ( $params ['item_order'] ) && $params ['item_order'] !== '') {
            $opt ['item_order'] = intval ( $params ['item_order'] );
        }
        
        // SORT FILTER
        $order = isset ( $params ['order'] ) ? $params ['order'] : array ();
        $sort_by = 'id';
        $sort_order = 'desc';
        if (! empty ( $order )) {
            $column = $order [0] ['column'];
            $sort_order = $order [0] ['dir'];
            switch ($column) {
                case 1 :
                    $sort_by = 'category_name';
                    break;
                case 2 :
                    $sort_by = 'item_order';
                    break;
                default :
                    $sort_by = 'item_order';
                    break;
            }
        }
        
        $opt ['sort_by'] = $sort_by;
        $opt ['sort_order'] = $sort_order;
        
        $opt ['index'] = $iDisplayStart;
        $opt ['size'] = $iDisplayLength;
        $items = $obj->getItems ( $opt, $iTotalRecords );
        
        foreach ( $items as $item ) {
            $_record = array ();
            $_record [] = '<input type="checkbox" name="id[]" value="' . $item ['id'] . '">';
            $_record [] = $item ['category_name'];
            $_record [] = $item ['item_order'];
            $_record [] = '<a class="btn btn-xs default btn-editable" href="' . $this->view->baseUrl ( 'admin/category-child/edit/id/' . $item ['id'] ) . '"><i class="fa fa-edit"></i> Edit</a>';
            $records ["data"] [] = $_record;
        }
        $records ["draw"] = $sEcho;
        $records ["recordsTotal"] = $iTotalRecords;
        $records ["recordsFiltered"] = $iTotalRecords;
        
        echo $this->jsonEncode ( $records );
    }
    
    /**
     * danh sach san pham
     */
    public function productAction() {
        $request = $this->getRequest ();
        $params = $request->getParams ();
        
        $obj = new Model_Product ();
        $iTotalRecords = 0;
        $iDisplayLength = isset ( $params ['length'] ) ? intval ( $params ['length'] ) : 0;
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = isset ( $params ['start'] ) ? intval ( $params ['start'] ) : 0;
        $iDisplayStart = $iDisplayStart < 0 ? 0 : $iDisplayStart;
        $sEcho = isset ( $params ['draw'] ) ? intval ( $params ['draw'] ) : 0;
        $sEcho = $sEcho < 0 ? 0 : $sEcho;
        
        $records = array ();
        $records ["data"] = array ();
        
        // save data
        if (isset ( $params ["customActionType"] ) && $params ["customActionType"] == "group_action") {
            $ids = isset ( $params ['id'] ) ? ( array ) $params ['id'] : array ();
            if (empty ( $ids )) {
                $actionStatus = "FAIL";
                $actionMessage = "Select data to be deleted.";
            } else {
                switch ($params ["customActionName"]) {
                    case 'delete' :
                        // Deleting multiple rows
                        $result = $obj->deleteItem ( array (
                                'ids' => $ids 
                        ) );
                        
                        if (! $result) {
                            $actionStatus = "FAIL";
                            $actionMessage = "Delete data failed.";
                        } else {
                            $actionStatus = "OK";
                            $actionMessage = "Data has been deleted.";
                        }
                        break;
                }
            }
            
            $records ["customActionStatus"] = $actionStatus; // pass custom message(useful for getting status of group actions)
            $records ["customActionMessage"] = $actionMessage; // pass custom message(useful for getting status of group actions)
        }
        // filter data
        $opt = array ();
        if (isset ( $params ['id'] ) && ! empty ( $params ['id'] )) {
            $opt ['id'] = $params ['id'];
        }
        
        if (isset ( $params ['product_name'] ) && ! empty ( $params ['product_name'] )) {
            $opt ['product_name'] = $params ['product_name'];
        }
        if (isset ( $params ['cid'] ) && $params ['cid'] !== '') {
            $opt ['cid'] = intval ( $params ['cid'] );
        }
        if (isset ( $params ['price_from'] ) && ! empty ( $params ['price_from'] )) {
            $opt ['price_from'] = $params ['price_from'];
        }
        if (isset ( $params ['price_to'] ) && ! empty ( $params ['price_to'] )) {
            $opt ['price_to'] = $params ['price_to'];
        }
        // SORT FILTER
        $order = isset ( $params ['order'] ) ? $params ['order'] : array ();
        $sort_by = 'id';
        $sort_order = 'desc';
        if (! empty ( $order )) {
            $column = $order [0] ['column'];
            $sort_order = $order [0] ['dir'];
            switch ($column) {
                case 1 :
                    $sort_by = 'product_name';
                    break;
                case 2 :
                    $sort_by = 'cid';
                    break;
                case 3 :
                    $sort_by = 'price';
                    break;
                case 4 :
                    $sort_by = 'update_timestamp';
                    break;
                default :
                    $sort_by = 'id';
                    break;
            }
        }
        
        $opt ['sort_by'] = $sort_by;
        $opt ['sort_order'] = $sort_order;
        
        $opt ['index'] = $iDisplayStart;
        $opt ['size'] = $iDisplayLength;
        $opt ['get_categogry'] = true;
        $items = $obj->getItems ( $opt, $iTotalRecords );
        
        foreach ( $items as $item ) {
            $_record = array ();
            $_record [] = '<input type="checkbox" name="id[]" value="' . $item ['id'] . '">';
            $_record [] = $item ['product_name'];
            $_record [] = $item ['category_name'];
            $_record [] = Common_Func::productPrice ( $item ['price'] );
            $item ['image'] = json_decode($item ['image'], true);
            $item ['image'] = $item ['image'][0];
            $image_path = $this->view->baseUrl () . PRODUCT_IMAGE_PATH . '/' . $item ['image'];
            $image_path_preview = $this->view->baseUrl () . PRODUCT_IMAGE_PATH_PREVIEW . '/' . $item ['image'];
            $_record [] = '<a class="fancybox-image" href="' . $image_path . '"><img src="' . $image_path_preview . '" title="' . $item ['product_name'] . '" alt="' . $item ['product_name'] . '" width="100"/></a>';
            $_record [] = date ( 'H:i:s d-m-Y', $item ['update_timestamp'] );
            $_record [] = '<a class="btn btn-xs default btn-editable" href="' . $this->view->baseUrl ( 'admin/product/edit/id/' . $item ['id'] ) . '"><i class="fa fa-edit"></i> Edit</a>';
            $records ["data"] [] = $_record;
        }
        $records ["draw"] = $sEcho;
        $records ["recordsTotal"] = $iTotalRecords;
        $records ["recordsFiltered"] = $iTotalRecords;
        
        echo $this->jsonEncode ( $records );
    }
    
    /**
     * danh sach slide
     */
    public function slideAction() {
        $request = $this->getRequest ();
        $params = $request->getParams ();
        $obj = new Model_Slide ();
        $iTotalRecords = 0;
        $iDisplayLength = isset ( $params ['length'] ) ? intval ( $params ['length'] ) : 0;
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = isset ( $params ['start'] ) ? intval ( $params ['start'] ) : 0;
        $iDisplayStart = $iDisplayStart < 0 ? 0 : $iDisplayStart;
        $sEcho = isset ( $params ['draw'] ) ? intval ( $params ['draw'] ) : 0;
        $sEcho = $sEcho < 0 ? 0 : $sEcho;
        
        $records = array ();
        $records ["data"] = array ();
        
        // save data
        if (isset ( $params ["customActionType"] ) && $params ["customActionType"] == "group_action") {
            $ids = isset ( $params ['id'] ) ? ( array ) $params ['id'] : array ();
            if (empty ( $ids )) {
                $actionStatus = "FAIL";
                $actionMessage = "Select data to be deleted.";
            } else {
                switch ($params ["customActionName"]) {
                    case 'delete' :
                        // Deleting multiple rows
                        $result = $obj->deleteItem ( array (
                                'ids' => $ids 
                        ) );
                        
                        if (! $result) {
                            $actionStatus = "FAIL";
                            $actionMessage = "Delete data failed.";
                        } else {
                            $actionStatus = "OK";
                            $actionMessage = "Data has been deleted.";
                        }
                        break;
                }
            }
            
            $records ["customActionStatus"] = $actionStatus; // pass custom message(useful for getting status of group actions)
            $records ["customActionMessage"] = $actionMessage; // pass custom message(useful for getting status of group actions)
        }
        // filter data
        $opt = array ();
        // $opt['fields'] = array('id,certificate_no,tech_id,tech_name,tech_alias,title,alias,days,retail_price,contact_price,status');
        if (isset ( $params ['id'] ) && ! empty ( $params ['id'] )) {
            $opt ['id'] = $params ['id'];
        }
        
        if (isset ( $params ['title'] ) && ! empty ( $params ['title'] )) {
            $opt ['title'] = $params ['title'];
        }
        if (isset ( $params ['url'] ) && ! empty ( $params ['url'] )) {
            $opt ['url'] = $params ['url'];
        }
        
        // SORT FILTER
        $order = isset ( $params ['order'] ) ? $params ['order'] : array ();
        $sort_by = 'id';
        $sort_order = 'desc';
        if (! empty ( $order )) {
            $column = $order [0] ['column'];
            $sort_order = $order [0] ['dir'];
            switch ($column) {
                case 1 :
                    $sort_by = 'title';
                    break;
                /*
                 * case 2 : $sort_by = 'cid'; break;
                 */
                case 3 :
                    $sort_by = 'url';
                    break;
                case 4 :
                    $sort_by = 'update_timestamp';
                    break;
                default :
                    $sort_by = 'id';
                    break;
            }
        }
        
        $opt ['sort_by'] = $sort_by;
        $opt ['sort_order'] = $sort_order;
        
        $opt ['index'] = $iDisplayStart;
        $opt ['size'] = $iDisplayLength;
        $items = $obj->getItems ( $opt, $iTotalRecords );
        
        foreach ( $items as $item ) {
            $_record = array ();
            $_record [] = '<input type="checkbox" name="id[]" value="' . $item ['id'] . '">';
            $_record [] = $item ['title'];
            $image_path = $this->view->baseUrl () . SLIDE_IMAGE_PATH . '/' . $item ['image'];
            $image_path_preview = $this->view->baseUrl () . PREVIEW_SLIDE_IMAGE_PATH . '/' . $item ['image'];
            $_record [] = '<a class="fancybox-image" href="' . $image_path . '"><img src="' . $image_path_preview . '" title="' . $item ['title'] . '" alt="' . $item ['title'] . '" width="100"/></a>';
            $_record [] = $item ['url'];
            $_record [] = date ( 'H:i:s d-m-Y', $item ['update_timestamp'] );
            $status = '';
            if ($item ['type'] == 1) {
                $status = 'Active';
            } else {
                $status = 'Inactive';
            }
            $_record [] = $status;
            $_record [] = '<a class="btn btn-xs default btn-editable" href="' . $this->view->baseUrl ( 'admin/slide/edit/id/' . $item ['id'] ) . '"><i class="fa fa-edit"></i> Edit</a>';
            $records ["data"] [] = $_record;
        }
        $records ["draw"] = $sEcho;
        $records ["recordsTotal"] = $iTotalRecords;
        $records ["recordsFiltered"] = $iTotalRecords;
        
        echo $this->jsonEncode ( $records );
    }
    
    /**
     * danh sach tin tuc
     */
    public function newsAction() {
        $request = $this->getRequest ();
        $params = $request->getParams ();
        $obj = new Model_News ();
        $iTotalRecords = 0;
        $iDisplayLength = isset ( $params ['length'] ) ? intval ( $params ['length'] ) : 0;
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = isset ( $params ['start'] ) ? intval ( $params ['start'] ) : 0;
        $iDisplayStart = $iDisplayStart < 0 ? 0 : $iDisplayStart;
        $sEcho = isset ( $params ['draw'] ) ? intval ( $params ['draw'] ) : 0;
        $sEcho = $sEcho < 0 ? 0 : $sEcho;
        
        $records = array ();
        $records ["data"] = array ();
        
        // save data
        if (isset ( $params ["customActionType"] ) && $params ["customActionType"] == "group_action") {
            $ids = isset ( $params ['id'] ) ? ( array ) $params ['id'] : array ();
            if (empty ( $ids )) {
                $actionStatus = "FAIL";
                $actionMessage = "Select data to be deleted.";
            } else {
                switch ($params ["customActionName"]) {
                    case 'delete' :
                        // Deleting multiple rows
                        $result = $obj->deleteItem ( array (
                                'ids' => $ids 
                        ) );
                        
                        if (! $result) {
                            $actionStatus = "FAIL";
                            $actionMessage = "Delete data failed.";
                        } else {
                            $actionStatus = "OK";
                            $actionMessage = "Data has been deleted.";
                        }
                        break;
                }
            }
            
            $records ["customActionStatus"] = $actionStatus; // pass custom message(useful for getting status of group actions)
            $records ["customActionMessage"] = $actionMessage; // pass custom message(useful for getting status of group actions)
        }
        // filter data
        $opt = array ();
        // $opt['fields'] = array('id,certificate_no,tech_id,tech_name,tech_alias,title,alias,days,retail_price,contact_price,status');
        if (isset ( $params ['id'] ) && ! empty ( $params ['id'] )) {
            $opt ['id'] = $params ['id'];
        }
        
        if (isset ( $params ['title'] ) && ! empty ( $params ['title'] )) {
            $opt ['title'] = $params ['title'];
        }
        if (isset ( $params ['body'] ) && ! empty ( $params ['body'] )) {
            $opt ['body'] = $params ['body'];
        }
        
        // SORT FILTER
        $order = isset ( $params ['order'] ) ? $params ['order'] : array ();
        $sort_by = 'id';
        $sort_order = 'desc';
        if (! empty ( $order )) {
            $column = $order [0] ['column'];
            $sort_order = $order [0] ['dir'];
            switch ($column) {
                case 1 :
                    $sort_by = 'title';
                    break;
                case 2 :
                    $sort_by = 'body';
                    break;
                case 3 :
                    $sort_by = 'update_timestamp';
                    break;
                default :
                    $sort_by = 'id';
                    break;
            }
        }
        
        $opt ['sort_by'] = $sort_by;
        $opt ['sort_order'] = $sort_order;
        
        $opt ['index'] = $iDisplayStart;
        $opt ['size'] = $iDisplayLength;
        $items = $obj->getItems ( $opt, $iTotalRecords );
        $category = Common_Codedef::getID ( 'CATEGORY_COMMON' );
        foreach ( $items as $item ) {
            $_record = array ();
            $_record [] = '<input type="checkbox" name="id[]" value="' . $item ['id'] . '">';
            $_record [] = $item ['title'];
            $_record [] = isset ( $category [$item ['category']] ) ? $category [$item ['category']] : '';
            $_record [] = date ( 'H:i:s d-m-Y', $item ['update_timestamp'] );
            $_record [] = '<a class="btn btn-xs default btn-editable" href="' . $this->view->baseUrl ( 'admin/news/edit/id/' . $item ['id'] ) . '"><i class="fa fa-edit"></i> Edit</a>';
            $records ["data"] [] = $_record;
        }
        $records ["draw"] = $sEcho;
        $records ["recordsTotal"] = $iTotalRecords;
        $records ["recordsFiltered"] = $iTotalRecords;
        
        echo $this->jsonEncode ( $records );
    }
    /**
     * danh sach tin tuc
     */
    public function tinTucAction() {
        $request = $this->getRequest ();
        $params = $request->getParams ();
        $obj = new Model_News ();
        $iTotalRecords = 0;
        $iDisplayLength = isset ( $params ['length'] ) ? intval ( $params ['length'] ) : 0;
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = isset ( $params ['start'] ) ? intval ( $params ['start'] ) : 0;
        $iDisplayStart = $iDisplayStart < 0 ? 0 : $iDisplayStart;
        $sEcho = isset ( $params ['draw'] ) ? intval ( $params ['draw'] ) : 0;
        $sEcho = $sEcho < 0 ? 0 : $sEcho;
        
        $records = array ();
        $records ["data"] = array ();
        
        // save data
        if (isset ( $params ["customActionType"] ) && $params ["customActionType"] == "group_action") {
            $ids = isset ( $params ['id'] ) ? ( array ) $params ['id'] : array ();
            if (empty ( $ids )) {
                $actionStatus = "FAIL";
                $actionMessage = "Select data to be deleted.";
            } else {
                switch ($params ["customActionName"]) {
                    case 'delete' :
                        // Deleting multiple rows
                        $result = $obj->deleteItem ( array (
                                'ids' => $ids 
                        ) );
                        
                        if (! $result) {
                            $actionStatus = "FAIL";
                            $actionMessage = "Delete data failed.";
                        } else {
                            $actionStatus = "OK";
                            $actionMessage = "Data has been deleted.";
                        }
                        break;
                }
            }
            
            $records ["customActionStatus"] = $actionStatus; // pass custom message(useful for getting status of group actions)
            $records ["customActionMessage"] = $actionMessage; // pass custom message(useful for getting status of group actions)
        }
        // filter data
        $opt = array ();
        // $opt['fields'] = array('id,certificate_no,tech_id,tech_name,tech_alias,title,alias,days,retail_price,contact_price,status');
        if (isset ( $params ['id'] ) && ! empty ( $params ['id'] )) {
            $opt ['id'] = $params ['id'];
        }
        
        if (isset ( $params ['title'] ) && ! empty ( $params ['title'] )) {
            $opt ['title'] = $params ['title'];
        }
        if (isset ( $params ['body'] ) && ! empty ( $params ['body'] )) {
            $opt ['body'] = $params ['body'];
        }
        
        // SORT FILTER
        $order = isset ( $params ['order'] ) ? $params ['order'] : array ();
        $sort_by = 'id';
        $sort_order = 'desc';
        if (! empty ( $order )) {
            $column = $order [0] ['column'];
            $sort_order = $order [0] ['dir'];
            switch ($column) {
                case 1 :
                    $sort_by = 'title';
                    break;
                case 2 :
                    $sort_by = 'body';
                    break;
                case 3 :
                    $sort_by = 'update_timestamp';
                    break;
                default :
                    $sort_by = 'id';
                    break;
            }
        }
        
        $opt ['sort_by'] = $sort_by;
        $opt ['sort_order'] = $sort_order;
        
        $opt ['index'] = $iDisplayStart;
        $opt ['size'] = $iDisplayLength;
        $items = $obj->getItems ( $opt, $iTotalRecords );
        foreach ( $items as $item ) {
            $_record = array ();
            $_record [] = '<input type="checkbox" name="id[]" value="' . $item ['id'] . '">';
            $_record [] = $item ['title'];
            $image_path = $this->view->baseUrl () . NEWS_IMAGE_PATH . '/' . $item ['image'];
            $image_path_preview = $this->view->baseUrl () . PREVIEW_NEWS_IMAGE_PATH . '/' . $item ['image'];
            $_record [] = '<a class="fancybox-image" href="' . $image_path . '"><img src="' . $image_path_preview . '" title="' . $item ['title'] . '" alt="' . $item ['title'] . '" width="100"/></a>';
            $_record [] = date ( 'H:i:s d-m-Y', $item ['update_timestamp'] );
            $_record [] = '<a class="btn btn-xs default btn-editable" href="' . $this->view->baseUrl ( 'admin/tin-tuc/edit/id/' . $item ['id'] ) . '"><i class="fa fa-edit"></i> Edit</a>';
            $records ["data"] [] = $_record;
        }
        $records ["draw"] = $sEcho;
        $records ["recordsTotal"] = $iTotalRecords;
        $records ["recordsFiltered"] = $iTotalRecords;
        
        echo $this->jsonEncode ( $records );
    }
    public function changePasswordAction() {
        $request = $this->getRequest ();
        $params = $request->getParams ();
        if ($params ['password_old'] == '') {
            return;
        }
        $obj = new Model_User ();
        $username = Common_Authentication::getID ( 'username' );
        $password = $params ['password_old'];
        $isExit = $obj->userIsExist ( $username, $password );
        if ($isExit) {
            echo "true";
        } else {
            echo "false";
        }
        return;
    }
    
    /**
     * danh sach brand
     */
    public function brandAction() {
        $request = $this->getRequest ();
        $params = $request->getParams ();
        $obj = new Model_Brand ();
        $iTotalRecords = 0;
        $iDisplayLength = isset ( $params ['length'] ) ? intval ( $params ['length'] ) : 0;
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = isset ( $params ['start'] ) ? intval ( $params ['start'] ) : 0;
        $iDisplayStart = $iDisplayStart < 0 ? 0 : $iDisplayStart;
        $sEcho = isset ( $params ['draw'] ) ? intval ( $params ['draw'] ) : 0;
        $sEcho = $sEcho < 0 ? 0 : $sEcho;
        
        $records = array ();
        $records ["data"] = array ();
        
        // save data
        if (isset ( $params ["customActionType"] ) && $params ["customActionType"] == "group_action") {
            $ids = isset ( $params ['id'] ) ? ( array ) $params ['id'] : array ();
            if (empty ( $ids )) {
                $actionStatus = "FAIL";
                $actionMessage = "Select data to be deleted.";
            } else {
                switch ($params ["customActionName"]) {
                    case 'delete' :
                        // Deleting multiple rows
                        $result = $obj->deleteItem ( array (
                                'ids' => $ids 
                        ) );
                        
                        if (! $result) {
                            $actionStatus = "FAIL";
                            $actionMessage = "Delete data failed.";
                        } else {
                            $actionStatus = "OK";
                            $actionMessage = "Data has been deleted.";
                        }
                        break;
                }
            }
            
            $records ["customActionStatus"] = $actionStatus; // pass custom message(useful for getting status of group actions)
            $records ["customActionMessage"] = $actionMessage; // pass custom message(useful for getting status of group actions)
        }
        // filter data
        $opt = array ();
        // $opt['fields'] = array('id,certificate_no,tech_id,tech_name,tech_alias,title,alias,days,retail_price,contact_price,status');
        if (isset ( $params ['id'] ) && ! empty ( $params ['id'] )) {
            $opt ['id'] = $params ['id'];
        }
        
        if (isset ( $params ['brand_name'] ) && ! empty ( $params ['brand_name'] )) {
            $opt ['brand_name'] = $params ['brand_name'];
        }
        
        // SORT FILTER
        $order = isset ( $params ['order'] ) ? $params ['order'] : array ();
        $sort_by = 'id';
        $sort_order = 'desc';
        if (! empty ( $order )) {
            $column = $order [0] ['column'];
            $sort_order = $order [0] ['dir'];
            switch ($column) {
                case 1 :
                    $sort_by = 'brand_name';
                    break;
                /*
                 * case 2 : $sort_by = 'cid'; break;
                 */
                case 2 :
                    $sort_by = 'item_order';
                    break;
                case 3 :
                    $sort_by = 'update_timestamp';
                    break;
                default :
                    $sort_by = 'id';
                    break;
            }
        }
        
        $opt ['sort_by'] = $sort_by;
        $opt ['sort_order'] = $sort_order;
        
        $opt ['index'] = $iDisplayStart;
        $opt ['size'] = $iDisplayLength;
        $items = $obj->getItems ( $opt, $iTotalRecords );
        
        foreach ( $items as $item ) {
            $_record = array ();
            $_record [] = '<input type="checkbox" name="id[]" value="' . $item ['id'] . '">';
            $_record [] = $item ['brand_name'];
            $_record [] = $item ['item_order'];
            $_record [] = date ( 'H:i:s d-m-Y', $item ['update_timestamp'] );
            $_record [] = '<a class="btn btn-xs default btn-editable" href="' . $this->view->baseUrl ( 'admin/brand/edit/id/' . $item ['id'] ) . '"><i class="fa fa-edit"></i> Edit</a>';
            $records ["data"] [] = $_record;
        }
        $records ["draw"] = $sEcho;
        $records ["recordsTotal"] = $iTotalRecords;
        $records ["recordsFiltered"] = $iTotalRecords;
        
        echo $this->jsonEncode ( $records );
    }
    public function uploadAction() {
        $upload = new Zend_File_Transfer ();
        $files = $upload->getFileInfo ();
        if ($upload->isValid ( 'image' )) {
            $extension = pathinfo ( $files ['image'] ['name'], PATHINFO_EXTENSION );
            $pathImage = RESOURCE_IMAGE_UPLOADED . DS . 'tmp'.DS.'large';
            $pathImagePreview = RESOURCE_IMAGE_UPLOADED . DS . 'tmp'.DS.'preview';
            
            $pathGen = uniqid () . str_replace ( " ", "", str_replace ( ".", "", microtime () ) );
            $pathCreated = $pathImage . DS . $pathGen;
            $pathPreivewCreated = $pathImagePreview . DS . $pathGen;
            if (mkdir ( $pathCreated ) && mkdir($pathPreivewCreated)) {
                $newName = uniqid () . '.' . $extension;
                $pathNewImage = $pathCreated . DS . $newName;
                $pathNewImagePreview = $pathPreivewCreated . DS . $newName;
                Common_Func::uploadImage ( $files ['image'] ['tmp_name'], $pathNewImage, false );
                Common_Func::uploadImage ( $pathNewImage, $pathNewImagePreview);
                // Insert to image_tmp table
                $pathInsert = $pathGen . DS . $newName;
                
                $obj = new Model_ImageTmp ();
                $data = array (
                        'path' => $pathInsert,
                        'created' => date ( 'Y-m-d H:i:s' ) 
                );
                $insert = $obj->insertItem ( $data );
                echo json_encode ( array (
                        'flg' => true,
                        'id' => $insert,
                        'path' => $this->view->baseUrl ( 'uploaded/tmp/preview/' . $pathGen . '/' . $newName ) 
                ) );
                exit ();
            }
        }
    }
    public function removeImageAction() {
        $id = $this->getParam ( 'id' );
        $obj = new Model_ImageTmp ();
        $dataImage = $obj->getDataImageTmp ( $id );
        if (! empty ( $dataImage ) && $dataImage != false) {
            $dataImageArr = explode ( DS, $dataImage ['path'] );
            $path = RESOURCE_IMAGE_UPLOADED . DS . 'tmp' . DS . 'large' . DS . $dataImageArr [0];
            $path_preview = RESOURCE_IMAGE_UPLOADED . DS . 'tmp' . DS . 'preview' . DS . $dataImageArr [0];
            if (Common_Func::deleteFileAndFolder ( $path ) && Common_Func::deleteFileAndFolder ( $path_preview )) {
                $obj->deleteItem ( $dataImage ['id'] );
                echo json_encode ( array (
                        'flg' => true 
                ) );
                exit ();
            }
        }
    }
}