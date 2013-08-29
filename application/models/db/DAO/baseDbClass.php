<?php
   
/* 
 *All the basic db functions which are common to all the modules ..
 * 
 * like select, update, delete, insert
 * 
 */

abstract class BaseDbClass
{
    protected $_tableName;
    
    abstract protected static function _getTableName();
    
    protected static function insertRow($data)
    {
        $data['created_datetime'] = date('Y-m-d H:i:s');
        $data['updated_datetime'] = $data['created_datetime'];
        $data['created_userid'] = ($data['created_userid'])?$data['created_userid']: $this->session->userdata('account_id');
        $data['updated_userid'] = ($data['updated_userid'])?$data['updated_userid']: $this->session->userdata('account_id');
        $data['delete_flag'] = ($data['delete_flag'])?$data['delete_flag']:'0';
        
        return $this->db->insert(_getTableName(), $data); 
    }
    
    protected static function _updateRowById($id, $data)
    {
        $data['updated_userid'] = $this->session->userdata('account_id');
        $data['updated_datetime'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update(_getTableName(), $data); 
    }
    
    protected static function _updateRowByCondition($condn, $data)
    {
        $data['updated_userid'] = $this->session->userdata('account_id');
        $data['updated_datetime'] = date('Y-m-d H:i:s');
        return $this->db->update(_getTableName(), $data, $condn);
    }
    
    protected static function _updateMultipleRowsByAttributeMention($attr, $data)
    {
        foreach ($data as $key => $value) {
            $data[$key]['updated_userid'] = $this->session->userdata('account_id');
            $data[$key]['updated_datetime'] = date('Y-m-d H:i:s');
        }
        return $this->db->update_batch(_getTableName(), $data, $attr); 
    }
    
    protected static function _deleteRowById($id)
    {
        $data = array(
            'delete_flag' => '0'
        );
        $data['updated_userid'] = $this->session->userdata('account_id');
        $data['updated_datetime'] = date('Y-m-d H:i:s');
        
        $this->db->where('id', $id);        
        return $this->db->update(_getTableName(), $data);
        //return $this->db->delete(_getTableName(), array('id' => $id)); 
    }
    
    protected static function _deleteRowByCondition($condn)
    {
        $data = array(
            'delete_flag' => '0'
        );
        $data['updated_userid'] = $this->session->userdata('account_id');
        $data['updated_datetime'] = date('Y-m-d H:i:s');
        
        return $this->db->update(_getTableName(), $data, $condn);
        //return $this->db->delete(_getTableName(), $condn); 
    }
    
    protected static function _getRows($selectArray = '', $whereArray = '', $distinct = 0)
    {
        if($selectArray){
            $this->db->select($selectArray);
        }
        if($whereArray){
            $this->db->where($whereArray);
        }        
        if($distinct)
        {
            $this->db->distinct();
        }
        $query = $this->db->get(_getTableName());
        return $query->result();
    }
}
