<?php
/**
 * User model
 */
class Model_Product extends Common_Model {
    protected $tab = 'product';
    protected $alias = 'p';
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
        if (isset ( $opt ['get_categogry'] ) && $opt ['get_categogry'] == true) {
            $select->join ( array (
                    'c' => 'category' 
            ), 'c.id = ' . $this->alias . '.cid', array (
                    'cid' => 'c.id',
                    'category_name' => 'category_name' 
            ) );
        }
        if (isset ( $opt ['cid'] ) && $opt ['cid'] != '') {
            $select->where ( 'cid = ?', $opt ['cid'] );
        }
        if (isset ( $opt ['product_name'] ) && $opt ['product_name'] != '') {
            $select->where ( $this->alias . '.product_name LIKE ?', '%' . $opt ['product_name'] . '%' );
        }
        if (isset ( $opt ['body'] ) && $opt ['body'] != '') {
            $select->where ( $this->alias . '.body LIKE ?', '%' . $opt ['body'] . '%' );
        }
        if (isset ( $opt ['price_from'] ) && $opt ['price_from'] != '') {
            $select->where ( $this->alias . '.price >= ?', $opt ['price_from'] );
        }
        if (isset ( $opt ['price_to'] ) && $opt ['price_to'] != '') {
            $select->where ( $this->alias . '.price <= ?', $opt ['price_to'] );
        }
        $select->where ( $this->alias . '.flg = ?', 1 );
        $sort_by = 'update_timestamp';
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
        if (isset ( $opt ['paging'] ) && $opt ['paging'] == true && isset ( $opt ['from'] ) && isset ( $opt ['to'] )) {
            $select->limitPage ( $opt ['from'], $opt ['to'] );
        }
        if (isset ( $opt ['limit'] ) && $opt ['limit'] != '') {
            $select->limit ( $opt ['limit'] );
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
            $select = $this->select ()->from ( array (
                    $this->alias => $this->tab 
            ), $opt ['fields'] );
        } else {
            $select = $this->select ()->from ( array (
                    $this->alias => $this->tab 
            ) );
        }
        if (isset ( $opt ['get_brand'] ) && $opt ['get_brand'] == true) {
            $select->join ( array (
                    'b' => 'brand' 
            ), 'b.id = ' . $this->alias . '.bid', array (
                    'bid' => 'b.id',
                    'brand_name' => 'brand_name' 
            ) );
        }
        if (isset ( $opt ['id'] ) && $opt ['id'] != '') {
            $select->where ( $this->alias . '.id = ?', $opt ['id'] );
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
    public function getMax() {
        $select = $this->select ()->from ( $this->tab, array (
                'max' => 'MAX(priority)' 
        ) );
        $query = $this->query ( $select );
        $result = $query->fetch ();
        return $result;
    }
}