<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class M_dataanggaran extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get data_anggaran by da_id
     */
    function get_data_anggaran($da_id)
    {
        return $this->db->get_where('tb_agrn',array('da_id'=>$da_id))->row_array();
    }
     
    /*
     * Get all data_anggaran count
     */
    function get_all_data_anggaran_count()
    {
        $this->db->from('tb_agrn');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all data_anggaran
     */
    function get_all_data_anggaran($params = array())
    {
        $this->db->order_by('da_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tb_agrn')->result_array();
    }
        
    /*
     * function to add new data_anggaran
     */
    function add_data_anggaran($params)
    {
        $this->db->insert('tb_agrn',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update data_anggaran
     */
    function update_data_anggaran($da_id,$params)
    {
        $this->db->where('da_id',$da_id);
        return $this->db->update('tb_agrn',$params);
    }
    
    /*
     * function to delete data_anggaran
     */
    function delete_data_anggaran($da_id)
    {
        return $this->db->delete('tb_agrn',array('da_id'=>$da_id));
    }
}