<?php
/**
 * Model.php
 *
 */

/**
 *
 * @author     ChatDM
 */
abstract class Common_Model extends Raonhanh_Model
{
    /**
     *
     * @param string  $table
     * @param array   $data
     * @param array   $where
     * @param boolean $atomic
     * @throws Exception
     * @return
     */
    public function update($table, $data = array(), $where = null, $atomic = true)
    {
        if (!is_array($data)) {
            $data = array($data);
        }

        if ($atomic) {
            $this->db->beginTransaction();
            try {
                // set profile to debuging
                $this->db->getProfiler()->setEnabled(true);
                $time_begin = Common_Func::get_microtime();
                
                // execute
                $rs = $this->db->update($table, $data, $where);
                
                // push data to debuging
                $time_end = Common_Func::get_microtime();
                Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
                $this->db->getProfiler()->setEnabled(false);
                
                $this->db->commit();
                return $rs;
            } catch (Exception $e) {
                // push data to debuging
                $time_end = Common_Func::get_microtime();
                Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
                $this->db->getProfiler()->setEnabled(false);
                
                $this->db->rollBack();
                Raonhanh_Log::error($e);
                throw $e;
            }
        }

        try {
            // set profile to debuging
            $this->db->getProfiler()->setEnabled(true);
            $time_begin = Common_Func::get_microtime();
            
            // execute
            $rs = $this->db->update($table, $data, $where);
            
            // push data to debuging
            $time_end = Common_Func::get_microtime();
            Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
            $this->db->getProfiler()->setEnabled(false);
            
            return $rs;
        } catch (Exception $e) {
            // push data to debuging
            $time_end = Common_Func::get_microtime();
            Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
            $this->db->getProfiler()->setEnabled(false);
            
            Raonhanh_Log::error($e);
            throw $e;
        }
    }

    /**
     *
     * @param string $table
     * @param array $data
     * @param boolean $atomic
     * @throws Exception
     * @return int
     */
    public function insert($table, $data = array(), $atomic = true)
    {
        if (is_null($data)) {
            $data = array();
        }
        if (!is_array($data)) {
            $data = array($data);
        }

        if ($atomic) {
            $this->db->beginTransaction();
            try {
                // set profile to debuging
                $this->db->getProfiler()->setEnabled(true);
                $time_begin = Common_Func::get_microtime();
                
                // execute
                $this->db->insert($table, $data);
                
                // push data to debuging
                $time_end = Common_Func::get_microtime();
                Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
                $this->db->getProfiler()->setEnabled(false);
                $lastId = $this->db->lastInsertId();
                $this->db->commit();
                return $lastId;
            } catch (Exception $e) {
                // push data to debuging
                $time_end = Common_Func::get_microtime();
                Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
                $this->db->getProfiler()->setEnabled(false);
            
                $this->db->rollBack();
                Raonhanh_Log::error($e);
                throw $e;
            }
        }

        try {
            // set profile to debuging
            $this->db->getProfiler()->setEnabled(true);
            $time_begin = Common_Func::get_microtime();
            
            // execute
            $this->db->insert($table, $data);
                
            // push data to debuging
            $time_end = Common_Func::get_microtime();
            Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
            $this->db->getProfiler()->setEnabled(false);
                
            return $this->db->lastInsertId();
        } catch (Exception $e) {
            // push data to debuging
            $time_end = Common_Func::get_microtime();
            Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
            $this->db->getProfiler()->setEnabled(false);
            
            Raonhanh_Log::error($e);
            throw $e;
        }
    }
    
    /**
     * execute query: alias Zend_Db_Select::query()
     * @param Zend_Db_Select $select
     * @return Ambigous <PDO_Statement, Zend_Db_Statement, Zend_Db_Statement_Interface, PDOStatement>
     */
    public function query(Zend_Db_Select $select)
    {
        // set profile to debuging
        $this->db->getProfiler()->setEnabled(true);
        $time_begin = Common_Func::get_microtime();
        
        $query = $select->query();
        
        // push data to debuging
        $time_end = Common_Func::get_microtime();
        Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
        $this->db->getProfiler()->setEnabled(false);
        
        return $query;
    }
    
    /**
     * INSERT or UPDATE if key exists
     * @param string $table
     * @param array $arrayData
     * @param boolean $atomic
     * @throws Exception
     * @return Ambigous <Zend_Db_Statement_Interface, Zend_Db_Statement, PDOStatement>
     */
    public function insertOrUpdate($table, array $arrayData, $atomic = true)
    {
        $query = 'INSERT INTO `'. $table.'` (`'.implode('`, `',array_keys($arrayData)).'`) VALUES ('.implode(', ',array_fill(1, count($arrayData), '?')).') '
                . 'ON DUPLICATE KEY UPDATE `'.implode('` = ?, `',array_keys($arrayData)).'` = ?';
        if ($atomic) {
            $this->db->beginTransaction();
            try {
                // set profile to debuging
                $this->db->getProfiler()->setEnabled(true);
                $time_begin = Common_Func::get_microtime();
            
                // execute
                $result = $this->db->query($query, array_merge(array_values($arrayData),array_values($arrayData)));
            
                // push data to debuging
                $time_end = Common_Func::get_microtime();
                Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
                $this->db->getProfiler()->setEnabled(false);
                
                $this->db->commit();
                return $result;
            } catch (Exception $e) {
                // push data to debuging
                $time_end = Common_Func::get_microtime();
                Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
                $this->db->getProfiler()->setEnabled(false);
            
                $this->db->rollBack();
                Raonhanh_Log::error($e);
                throw $e;
            }
        }
        
        try {
            // set profile to debuging
            $this->db->getProfiler()->setEnabled(true);
            $time_begin = Common_Func::get_microtime();
        
            // execute
            $result = $this->db->query($query, array_merge(array_values($arrayData),array_values($arrayData)));
        
            // push data to debuging
            $time_end = Common_Func::get_microtime();
            Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
            $this->db->getProfiler()->setEnabled(false);
        
            return $result;
        } catch (Exception $e) {
            // push data to debuging
            $time_end = Common_Func::get_microtime();
            Common_Debug::push($this->db->getProfiler()->getLastQueryProfile(), $time_end-$time_begin);
            $this->db->getProfiler()->setEnabled(false);
        
            Raonhanh_Log::error($e);
            throw $e;
        }
    }
}