<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class M_dinaspegawai extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get dinas_pegawai by pgwnds_id
     */
    function get_dinas_pegawai($pgwnds_id)
    {
        return $this->db->get_where('tb_pgwnds',array('pgwnds_id'=>$pgwnds_id))->row_array();
    }
    

    function get_dinas_pegawai_by_no($nds_id)
    {   //$q = $this->db->query('select pgw_nip from tb_pgtgs where srtgs_no = "'.$srtgs_no.'"');
        //echo var_dump($q->result());
        //$this->db->join('tb_pgw', 'tb_pgwnds.pgw_nip = tb_pgw.pgw_nip', 'left');
        return $this->db->get_where('tb_pgwnds',array('nds_id'=>$nds_id))->result();
    }

      function get_dinas_pegawai_join_by_id($nds_id)
    {   //$q = $this->db->query('select pgw_nip from tb_pgtgs where srtgs_no = "'.$srtgs_no.'"');
        //echo var_dump($q->result());
        $this->db->join('tb_pgw', 'tb_pgwnds.pgw_nip = tb_pgw.pgw_nip', 'left');
        return $this->db->get_where('tb_pgwnds',array('nds_id'=>$nds_id))->result_array();
    }

    /*
     * Get all dinas_pegawai count
     */
    function get_all_dinas_pegawai_count()
    {
        $this->db->from('tb_pgwnds');
        return $this->db->count_all_results();
    }

    function get_all_dinas_pegawai_count_by_nds($value='')
    {
        $this->db->from('tb_pgwnds');
        $this->db->where('nds_id', $value);
        return $this->db->count_all_results();
    }
        
    /*
     * Get all dinas_pegawai
     */
    function get_all_dinas_pegawai($params = array())
    {
        $this->db->order_by('pgwnds_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tb_pgwnds')->result_array();
    }
        
    /*
     * function to add new dinas_pegawai
     */
    function add_dinas_pegawai($params)
    {
        $this->db->insert('tb_pgwnds',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update dinas_pegawai
     */
    function update_dinas_pegawai($pgwnds_id,$params)
    {
        $this->db->where('pgwnds_id',$pgwnds_id);
        return $this->db->update('tb_pgwnds',$params);
    }


    
    /*
     * function to delete dinas_pegawai
     */
    function delete_dinas_pegawai($pgwnds_id)
    {
        return $this->db->delete('tb_pgwnds',array('pgwnds_id'=>$pgwnds_id));
    }

    function delete_dinas_pegawai_by_nds($nds_id)
    {
        return $this->db->delete('tb_pgwnds',array('nds_id'=>$nds_id));
    }
}