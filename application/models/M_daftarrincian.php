<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class M_daftarrincian extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get daftar_rincian by rcn_id
     */
    function get_daftar_rincian($rcn_id)
    {
        $this->db->join('tb_pgw', 'tb_rcn.pgw_nip = tb_pgw.pgw_nip', 'left');
        $this->db->join('tb_rcndtl', 'tb_rcndtl.rcn_id = tb_rcn.rcn_id', 'left');
        return $this->db->get_where('tb_rcn',array('tb_rcn.rcn_id'=>$rcn_id))->row_array();
    }

    function search_rincian_by_surattugas($no){
        $this->db->like('srtgs_no', $no , 'both');
        $this->db->order_by('srtgs_no', 'ASC');
        $this->db->join('tb_pgw', 'tb_rcn.pgw_nip = tb_pgw.pgw_nip', 'left');
        $this->db->join('tb_rcndtl', 'tb_rcndtl.rcn_id = tb_rcn.rcn_id', 'left');
        $this->db->limit(10);
        //var_dump($this->db->get('tb_srtgs')->result());
        return $this->db->get('tb_rcn')->result();
    }

    function search_rincian_by_surattugas2($no){
        $this->db->like('srtgs_no', $no , 'both');
        $this->db->order_by('srtgs_no', 'ASC');
        $this->db->join('tb_pgw', 'tb_rcn.pgw_nip = tb_pgw.pgw_nip', 'left');
        $this->db->join('tb_rcndtl', 'tb_rcndtl.rcn_id = tb_rcn.rcn_id', 'left');
        $this->db->limit(10);
        //var_dump($this->db->get('tb_srtgs')->result());
        return $this->db->get('tb_rcn')->row_array();
    }
    
    /*
     * Get all daftar_rincian count
     */
    function get_all_daftar_rincian_count()
    {
        $this->db->from('tb_rcn');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all daftar_rincian
     */
    function get_all_daftar_rincian($params = array())
    {
        $this->db->select('tb_rcn.rcn_id as `rcn_id`,tb_rcn.pgw_nip as `pgw_nip`,tb_rcn.rcn_tgl as `rcn_tgl`,tb_rcn.srtgs_no as `srtgs_no`,tb_pgw.pgw_nm as `pgw_nm`',false);   
        $this->db->join('tb_pgw', 'tb_rcn.pgw_nip = tb_pgw.pgw_nip', 'left');
        $this->db->join('tb_rcndtl', 'tb_rcndtl.rcn_id = tb_rcn.rcn_id', 'left');
        $this->db->order_by('tb_rcn.rcn_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        //var_dump($this->db->get('tb_rcn')->result_array());
        return $this->db->get('tb_rcn')->result_array();
    }
        
    /*
     * function to add new daftar_rincian
     */
    function add_daftar_rincian($params)
    {
        $this->db->insert('tb_rcn',$params);
        //var_dump( $this->db->insert_id());
        return $this->db->insert_id();
    }

    /*
     * function to update daftar_rincian
     */
    function update_daftar_rincian($rcn_id,$params)
    {
        $this->db->where('rcn_id',$rcn_id);
        return $this->db->update('tb_rcn',$params);
    }

    /*
     * function to delete daftar_rincian
     */
    function delete_daftar_rincian($rcn_id)
    {
        return $this->db->delete('tb_rcn',array('rcn_id'=>$rcn_id));
    }
}
