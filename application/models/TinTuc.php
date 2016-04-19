<?php
/**
 * User model
 */
class Model_TinTuc extends Common_Model {
    protected $tab = 'tintuc';
    protected $alias = 't';
    public function getItems($opt, &$total = 0, $get_total = true) {
        $name = array ();
        if ($get_total == true) {
            $name = array (
                    new Zend_Db_Expr ( 'SQL_CALC_FOUND_ROWS *' ) 
            );
        }
        
        if (isset ( $opt ['fields'] ) && ! empty ( $opt ['fields'] )) {
            $cols = array_merge ( $name, $opt ['fields'] );
            $select = $this->select ()->from ( array (
                    $this->alias => $this->tab 
            ), $cols );
        } else {
            array_push ( $name, '*' );
            $select = $this->select ()->from ( array (
                    $this->alias => $this->tab 
            ), $name );
        }
        
        if (isset ( $opt ['category'] ) && $opt ['category'] != '') {
            $select->where ( 'category = ?', $opt ['category'] );
        }
        if (isset ( $opt ['title'] ) && $opt ['title'] != '') {
            $select->where ( $this->alias . '.title LIKE ?', '%' . $opt ['title'] . '%' );
        }
        if (isset ( $opt ['body'] ) && $opt ['body'] != '') {
            $select->where ( $this->alias . '.body LIKE ?', '%' . $opt ['body'] . '%' );
        }
        
        $sort_by = 'order';
        if (isset ( $opt ['sort_by'] ) && $opt ['sort_by'] != '') {
            $sort_by = $opt ['sort_by'];
        }
        
        $sort_order = 'DESC';
        if (isset ( $opt ['sort_order'] ) && $opt ['sort_order'] != '') {
            $sort_order = $opt ['sort_order'];
        }
        $order = $this->alias . '.' . $sort_by . ' ' . $sort_order;
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
        if (isset ( $opt ['limit'] ) && $opt ['limit'] != '') {
            $select->limit ( $opt ['limit'] );
        }
        if (isset ( $opt ['paging'] ) && $opt ['paging'] == true && isset ( $opt ['from'] ) && isset ( $opt ['to'] )) {
            $select->limitPage ( $opt ['from'], $opt ['to'] );
        }
        $query = $this->query ( $select );
        
        $iCount = $this->db->query ( 'SELECT FOUND_ROWS() as row' );
        $iCount = $iCount->fetch ();
        $total = $iCount ['row'];
        
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
        if (isset ( $opt ['category'] ) && $opt ['category'] != '') {
            $select->where ( 'category = ?', $opt ['category'] );
        }
        $select->order ( 'update_timestamp DESC' );
        $select->limit ( 1 );
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