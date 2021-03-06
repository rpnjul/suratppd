<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class M_surattugas extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function search_surattugas($no){
        //$this->db->select('tb_srtgs.srtgs_no, tb_srtms.pgw_nip as `asal`,tb_pgw.pgw_jab as `jab_asal`');
        //$this->db->join('tb_srtms', 'tb_srtgs.srtms_no = tb_srtms.srtms_no', 'left');
        //$this->db->join('tb_pgw', 'tb_srtms.pgw_nip = tb_pgw.pgw_nip', 'left');
        $this->db->like('srtgs_no', $no , 'both');
        $this->db->order_by('srtgs_no', 'ASC');
        $this->db->limit(10);
        //var_dump($this->db->get('tb_srtgs')->result());
        return $this->db->get('tb_srtgs')->result();
    }

    function search_surattugas_by_nip($no,$nip){
        //$this->db->select('tb_srtgs.srtgs_no, tb_srtms.pgw_nip as `asal`,tb_pgw.pgw_jab as `jab_asal`');
        //$this->db->join('tb_srtms', 'tb_srtgs.srtms_no = tb_srtms.srtms_no', 'left');
        //$this->db->join('tb_pgw', 'tb_srtms.pgw_nip = tb_pgw.pgw_nip', 'left');
        $this->db->where('pgw_nip', $nip);
        $this->db->like('srtgs_no', $no , 'both');
        $this->db->order_by('srtgs_no', 'ASC');
        $this->db->limit(10);
        //var_dump($this->db->get('tb_srtgs')->result());
        return $this->db->get('tb_srtgs')->result();
    }
    
    /*
     * Get surat tugas by surat tugas_no
     */
    function get_surattugas($srtgs_no)
    {
        return $this->db->get_where('tb_srtgs',array('srtgs_id'=>$srtgs_no))->row_array();
    }

    function get_surattugas_by_join($srtgs_id)
    {
        $this->db->join('tb_srtms', 'tb_srtgs.srtms_no = tb_srtms.srtms_no', 'left');
        $this->db->join('tb_psl', 'tb_srtms.psl_no = tb_psl.psl_no', 'left');
        $this->db->join('tb_direktur', 'tb_psl.direktur_no = tb_direktur.direktur_no', 'left');
        $this->db->join('tb_pgw', 'tb_srtgs.pgw_nip = tb_pgw.pgw_nip', 'left');
        //$this->db->join('tb_pgtgs', 'tb_pgtgs.srtgs_no = tb_srtgs.srtgs_no', 'left');
        return $this->db->get_where('tb_srtgs',array('srtgs_id'=>$srtgs_id))->row_array();
    }
    
    /*
     * Get all surat tugas count
     */
    function get_all_surattugas_count()
    {
        $this->db->from('tb_srtgs');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all surat tugas
     */
    function get_all_surattugas($params = array())
    {
        $this->db->join('tb_pgw', 'tb_pgw.pgw_nip = tb_srtgs.pgw_nip', 'left');
        $this->db->order_by('srtgs_no', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tb_srtgs')->result_array();
    }

        function get_surattugas_by_no($st_no)
    {
        $this->db->join('tb_pgw', 'tb_pgw.pgw_nip = tb_srtgs.pgw_nip', 'left');
        return $this->db->get_where('tb_srtgs',array('srtgs_no'=>$st_no))->row_array();
    }

    function get_all_surattugas_by_nip($params = array(),$nip)
    {
        $this->db->join('tb_pgw', 'tb_pgw.pgw_nip = tb_srtgs.pgw_nip', 'left');
        $this->db->order_by('srtgs_no', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get_where('tb_srtgs',array('tb_srtgs.pgw_nip'=>$nip))->result_array();
    }
        
    /*
     * function to add new surat tugas
     */
    function add_surattugas($params)
    {
        $this->db->insert('tb_srtgs',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update surat tugas
     */
    function update_surattugas($srtgs_no,$params)
    {
        $this->db->where('srtgs_id',$srtgs_no);
        return $this->db->update('tb_srtgs',$params);
    }
    
    /*
     * function to delete surat tugas
     */
    function delete_surattugas($srtgs_no)
    {
        $this->db->where('srtgs_id', $srtgs_no);
        return $this->db->delete('tb_srtgs');
    }
}
