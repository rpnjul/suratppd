<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class M_pegawai extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_login($username,$usr_pass)
    {
        $sql = "SELECT * FROM tb_pgw WHERE (pgw_eml = ? OR pgw_nip= ? ) AND pgw_snd = ?";
        return $this->db->query($sql, array($username,$username, $usr_pass))->row_array();
    }
    
    /*
     * Get tb_pgw by pgw_nip
     */
    function get_pegawai($pgw_id)
    {
        return $this->db->get_where('tb_pgw',array('pgw_id'=>$pgw_id))->row_array();
    }

    function cek_admin()
    {
        $q = $this->db->query("select * from tb_pgw where pgw_jab = 'Admin' and pgw_sts='1'");
        return $q->num_rows();
    }

    function cek_kasubbag(){
        $q = $this->db->query("SELECT * FROM tb_pgw WHERE pgw_jab = 'Kepala Sub Bagian Umum'");
        return $q->num_rows();
    }
    function kasubbag(){
        $q = $this->db->query("SELECT * FROM tb_pgw WHERE pgw_jab = 'Kepala Sub Bagian Umum'");
        return $q->row_array();
    }


    function cek_kepala()
    {
        $q = $this->db->query("select * from tb_pgw where pgw_jab = 'Kepala Kantor' ");
        return $q->num_rows();
    }

    function get_pegawai_by_nip($pgw_nip)
    {
        return $this->db->get_where('tb_pgw',array('pgw_nip'=>$pgw_nip))->row_array();
    }
    
    function get_pegawai_on_surattugas($pgw_id)
    {
        $this->db->join('tb_srtgs', 'tb_pgw.pgw_nip = tb_srtgs.pgw_nip', 'left');
        $this->db->join('tb_pgtgs', 'tb_pgw.pgw_nip = tb_pgtgs.pgw_nip', 'left');
        return $this->db->get_where('tb_pgtgs',array('srtgs_id'=>$pgw_id))->row_array();
    } 

    function get_pegawai_on_suratmasuk($pgw_id)
    {
        $this->db->join('tb_pgw', 'tb_pgw.pgw_nip = tb_srtms.pgw_nip', 'left');
        return $this->db->get_where('tb_srtms',array('tb_srtms.pgw_nip'=>$pgw_id))->row_array();
    }

    /*
     * Get all tb_pgw count
     */
    function get_all_pegawai_count()
    {
        $this->db->from('tb_pgw');
        return $this->db->count_all_results();
    }

    function is_pegawai($nip,$email){
           return $this->db->query("select * from tb_pgw where pgw_nip = '$nip' and pgw_eml = '$email' ")->row_array();
    }

    function search_pegawai($nip){
           $q = $this->db->query("select * from tb_pgw where pgw_nip like '%$nip%' or pgw_nm like '%$nip%' or pgw_jab like '%$nip%' ");
          // var_dump($q->result());
           return $q->result();
    }

    function search_pegawai_pejabat_lelang($nip){
           $q = $this->db->query("select * from tb_pgw where (pgw_nip like '%$nip%' or pgw_nm like '%$nip%')");
          // var_dump($q->result());
           return $q->result();
    }   

    function search_pegawai_bak($cari){
        $this->db->like('pgw_nip', $cari , 'both');
        $this->db->order_by('pgw_nm', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_pgw')->result();
    }
        
    /*
     * Get all tb_pgw
     */
    function get_all_pegawai($params = array())
    {
        $this->db->order_by('pgw_nm', 'ASC');
        //$kecuali = array('Kepala Sub Bagian Umum','Admin' );
        //$this->db->where_not_in('pgw_jab', $kecuali);
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tb_pgw')->result_array();
    }
        function get_all($params = array())
    {
        $this->db->order_by('pgw_nm', 'ASC');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tb_pgw')->result_array();
    }

    function get_all_pegawai_result()
    {
        $this->db->order_by('pgw_nm', 'ASC');
        //$kecuali = array('Kepala Sub Bagian Umum','Admin' );
        //$this->db->where_not_in('pgw_jab', $kecuali);
        return $this->db->get('tb_pgw')->result();
    }
        
    /*
     * function to add new tb_pgw
     */
    function add_pegawai($params)
    {
        $this->db->insert('tb_pgw',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tb_pgw
     */
    function update_pegawai($pgw_id,$params)
    {
        $this->db->where('pgw_id',$pgw_id);
        return $this->db->update('tb_pgw',$params);
    }
    
    /*
     * function to delete tb_pgw
     */
    function delete_pegawai($pgw_id)
    {   $this->db->where('pgw_id', $pgw_id);
        return $this->db->delete('tb_pgw');
    }
}
