<?php
/**
 * User model
 */
class Model_User extends Common_Model {
    protected $tab = 'user';
    public function loginAuth($username, $password) {
        if ($username == '') {
            return false;
        }
        $select = $this->select ()->from ( $this->tab )->where ( 'username = ?', $username )->where ( 'password = ?', md5 ( $password ) );
        $query = $this->query ( $select );
        $result = $query->fetch ();
        return $result;
    }
    
    /**
     *
     * @param array $opt            
     * @return number
     */
    public function updateItem($opt) {
        $opt ['fields'] ['update_timestamp'] = time ();
        $res = $this->update ( $this->tab, $opt ['fields'], array (
                'id = ?' => $opt ['id'] 
        ) );
        return $res;
    }
    public function userIsExist($username = '', $password = '') {
        if ($username == '' || $password == '') {
            return false;
        }
        $select = $this->select ();
        if (! empty ( $opt ['fields'] )) {
            $select->from ( $this->tab, $opt ['fields'] );
        } else {
            $select->from ( $this->tab );
        }
        $select->where ( 'username = ?', $username )->where ( 'password = ?', md5 ( $password ) );
        $query = $this->query ( $select );
        $result = $query->fetch ();
        return $result;
    }
}