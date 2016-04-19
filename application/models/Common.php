<?php
/**
 * User model
 */
class Model_Common extends Common_Model {
    public function countUrl($opt, $table) {
        $select = $this->select ()->from ( $table, array (
                'count' => 'COUNT(*)' 
        ) );
        if (isset ( $opt ['alias'] ) && $opt ['alias'] != '') {
            $select->where ( "REPLACE
                            (REPLACE
                            (REPLACE
                            (REPLACE
                            (REPLACE
                            (REPLACE
                            (REPLACE
                            (REPLACE
                            (REPLACE
                            (REPLACE (alias, '-0', ''),
                            '-1', ''),
                            '-2', ''),
                            '-3', ''),
                            '-4', ''),
                            '-5', ''),
                            '-6', ''),
                            '-7', ''),
                            '-8', ''),
                            '-9', '') = ?", $opt ['alias'] );
        }
        $query = $this->query ( $select );
        $result = $query->fetch ();
        return $result ['count'];
    }
}