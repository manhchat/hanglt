<?php
/**
 * User model
 */
class Model_Category extends Common_Model {
    protected $tab = 'category';
    public function getItems($opt, &$total = 0, $get_total = true) {
        $name = array ();
        if ($get_total == true) {
            $name = array (
                    new Zend_Db_Expr ( 'SQL_CALC_FOUND_ROWS *' ) 
            );
        }
        
        if (isset ( $opt ['fields'] ) && ! empty ( $opt ['fields'] )) {
            $cols = array_merge ( $name, $opt ['fields'] );
            $select = $this->select ()->from ( $this->tab, $cols );
        } else {
            array_push ( $name, '*' );
            $select = $this->select ()->from ( $this->tab, $name );
        }
        
        if (isset ( $opt ['category_name'] ) && $opt ['category_name'] != '') {
            $select->where ( 'category_name LIKE ?', '%' . $opt ['category_name'] . '%' );
        }
        if (isset ( $opt ['item_order'] ) && $opt ['item_order'] != '') {
            $select->where ( 'item_order = ?', $opt ['item_order'] );
        }
        
        // condition
        if (isset ( $opt ['status'] ) && $opt ['status'] != '') {
            $select->where ( 'status = ?', $opt ['status'] );
        }
        $sort_by = 'item_order';
        if (isset ( $opt ['sort_by'] ) && $opt ['sort_by'] != '') {
            $sort_by = $opt ['sort_by'];
        }
        
        $sort_order = 'DESC';
        if (isset ( $opt ['sort_order'] ) && $opt ['sort_order'] != '') {
            $sort_order = $opt ['sort_order'];
        }
        $order = $sort_by . ' ' . $sort_order;
        $select->order ( $order );
        $index = NULL;
        if (isset ( $opt ['index'] )) {
            $index = ( int ) $opt ['index'];
        }
        
        $size = NULL;
        if (isset ( $opt ['size'] )) {
            $size = ( int ) $opt ['size'];
        }
        if (isset ( $opt ['size'] ) && isset ( $opt ['index'] )) {
            $select->limit ( $size, $index );
        }
        $query = $this->query ( $select );
        if ($get_total == true) {
            $iCount = $this->db->query ( 'SELECT FOUND_ROWS() as row' );
            $iCount = $iCount->fetch ();
            $total = $iCount ['row'];
        }
        
        $result = $query->fetchAll ();
        return $result;
    }
    public function getItem($opt) {
        if (! empty ( $opt ['fields'] )) {
            $select = $this->select ()->from ( $this->tab, $opt ['fields'] );
        } else {
            $select = $this->select ()->from ( $this->tab );
        }
        if (isset ( $opt ['id'] ) && $opt ['id'] != '') {
            $select->where ( 'id = ?', $opt ['id'] );
        }
        if (isset ( $opt ['category_name'] ) && $opt ['category_name'] != '') {
            $select->where ( 'category_name LIKE ?', '%' . $opt ['category_name'] . '%' );
        }
        
        if (isset ( $opt ['item_order'] ) && $opt ['item_order'] != '') {
            $select->where ( 'item_order = ?', $opt ['item_order'] );
        }
        $query = $this->query ( $select );
        $result = $query->fetch ();
        return $result;
    }
    public function updateItem($opt) {
        $opt ['fields'] ['update_timestamp'] = time ();
        $res = $this->update ( $this->tab, $opt ['fields'], array (
                'id = ?' => $opt ['id'] 
        ) );
        return $res;
    }
    public function insertItem($opt) {
        $opt ['fields'] ['update_timestamp'] = time ();
        $opt ['fields'] ['create_timestamp'] = time ();
        $res = $this->insert ( $this->tab, $opt ['fields'] );
        return $res;
    }
    public function deleteItem($opt) {
        return $this->delete ( $this->tab, array (
                'id IN(?)' => $opt ['ids'] 
        ) );
    }
}