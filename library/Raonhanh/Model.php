<?php
/**
 * Model.php
 *
 */

/**
 *
 * @author     Raonhanh
 */
abstract class Raonhanh_Model
{
    /**
     *
     * @var Zend_Db_Adapter_Abstract
     */
    protected $db = null;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->db = Zend_Registry::get('db');
    }

    /**
     *
     * @return Zend_Db_Select
     */
    public function select()
    {
    	return $this->db->select();
    }

    /**
     * 
     * Update
     * @param string $table
     * @param array $data
     * @param array $where
     * @param false $atomic
     * @return bool
     */
    public function update($table, $data = array(), $where = null, $atomic = true)
    {
        if (!is_array($data)) {
            $data = array($data);
        }

        if ($atomic) {
            $this->db->beginTransaction();
            try {
                $rs = $this->db->update($table, $data, $where);
                $this->db->commit();
                return $rs;
            } catch (Exception $e) {
                $this->db->rollBack();
                Raonhanh_Log::error($e);
                throw $e;
            }
        }

        try {
            return $rs = $this->db->update($table, $data, $where);
        } catch (Exception $e) {
            Raonhanh_Log::error($e);
            throw $e;
        }
    }

    /**
     * Insert
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
                $this->db->insert($table, $data);
                $this->db->commit();
                $lastId = $this->db->lastInsertId();
                return $lastId;
            } catch (Exception $e) {
                $this->db->rollBack();
                Raonhanh_Log::error($e);
                throw $e;
            }
        }

        try {
            $this->db->insert($table, $data);
            return $this->db->lastInsertId();
        } catch (Exception $e) {
            Raonhanh_Log::error($e);
            throw $e;
        }
    }

    /**
     * Delete.
     *
     * @param string $table
     * @param array $where
     * @param boolean $atomic
     * @throws Exception
     * @return
     */
    public function delete($table, $where = null, $atomic = true)
    {
        if ($atomic) {
            $this->db->beginTransaction();
            try {
                $rs = $this->db->delete($table, $where);
                $this->db->commit();
                return $rs;
            } catch (Exception $e) {
                $this->db->rollBack();
                Raonhanh_Log::error($e);
                throw $e;
            }
        }

        try {
            return $this->db->delete($table, $where);
        } catch (Exception $e) {
            Raonhanh_Log::error($e);
            throw $e;
        }
    }


    public function getDb()
    {
        return $this->db;
    }
}

define('NO_TRANSACTION', false);
