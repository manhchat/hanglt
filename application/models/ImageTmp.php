<?php
/**
 * User model
 */
class Model_ImageTmp extends Common_Model {
    protected $tab = 'image_tmp';
    public function updateItem($opt) {
        $res = $this->update ( $this->tab, $opt ['fields'], array (
                'id = ?' => $opt ['id'] 
        ) );
        return $res;
    }
    public function insertItem($data) {
        $res = $this->insert ( $this->tab, $data );
        return $res;
    }
    public function deleteItem($id) {
        return $this->delete ( $this->tab, array (
                'id = ?' => $id 
        ) );
    }
    
    public function deleteItems($ids) {
        if (empty($ids)) {
            return false;
        }
        return $this->delete ( $this->tab, array (
                'id IN(?)' => $ids
        ) );
    }
    
    /**
     * Get image uploaded
     *
     * @param string $id            
     * @return boolean
     */
    public function getDataImageTmp($id = '') {
        if ($id == '') {
            return false;
        }
        $select = $this->select ()->from ( $this->tab, array (
                'id',
                'path',
                'created' 
        ) )->where ( 'id = ?', $id );
        $query = $this->query ( $select );
        $data = $query->fetch ();
        return $data;
    }
    
    /**
     * Get image uploaded
     *
     * @param string $id            
     * @return boolean
     */
    public function getImageTmp($ids = array()) {
        if (empty ( $ids )) {
            return array ();
        }
        $select = $this->select ()->from ( $this->tab, array (
                'id',
                'path',
                'created' 
        ) )->where ( 'id IN(?)', $ids );
        $query = $this->query ( $select );
        $data = $query->fetchAll ();
        return $data;
    }
}