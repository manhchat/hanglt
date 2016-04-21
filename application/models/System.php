<?php
/**
 * User model
 */
class Model_System extends Common_Model
{
    protected $tab = 'system';
    protected $alias = 's';
    
    public function getItem() {
        
        if (!empty($opt['fields'])) {
            $select = $this->select()
            ->from($this->tab, $opt['fields']);
        } else {
            $select = $this->select()
            ->from($this->tab);
        }
        $select->where('id = ?', 1)
        		->limit(1);
        $query = $this->query($select);
        $result = $query->fetch();
        return $result;
        
    }
    public function updateItem($opt, $where=array())
    {
        $res = $this->update($this->tab, $opt['fields'], $where);
        return $res;
    }
    
    public function insertItem($opt) {
        $this->insert ( $this->tab, $opt ['fields'] );
        return true;
    }
}