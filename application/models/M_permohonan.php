<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permohonan extends CI_Model {

	function __construct()
	{
	    parent::__construct();
	}
	
	function search_permohonan($cari){
		$this->db->select('tb_psl.psl_no as `psl_no`,tb_direktur.direktur_nm as `direktur_nm`');
		$this->db->join('tb_direktur', 'tb_psl.direktur_no = tb_direktur.direktur_no', 'left');
		$this->db->where('tb_psl.psl_sts', '1');
	    $this->db->like('tb_psl.psl_no', $cari , 'both');
	    $this->db->order_by('tb_direktur.direktur_nm', 'ASC');
	    $this->db->limit(3);
	    return $this->db->get('tb_psl')->result();
	}

	function get_permohonan($psl_id)
	{
	    return $this->db->query("select * from tb_psl inner join tb_direktur on tb_psl.direktur_no = tb_direktur.direktur_no where tb_psl.psl_id = '$psl_id'")->row_array();
	}

	function get_permohonan_by_join($psl_id)
	{
	    $this->db->join('tb_direktur', 'tb_psl.direktur_no = tb_direktur.direktur_no', 'left');
	    $this->db->join('tb_psllmp', 'tb_psllmp.psl_id = tb_psl.psl_id', 'left');
	    return $this->db->get_where('tb_psl',array('tb_psl.psl_id'=>$psl_id))->row_array();
	}


	function get_permohonan_by_no($psl_no)
	{
	    return $this->db->get_where('tb_psl',array('psl_no'=>$psl_no))->result_array();
	}

	function get_lampiran($psl_id)
	{
	    return $this->db->get_where('tb_psllmp',array('psl_id'=>$psl_id))->row_array();
	}

	function get_all_permohonan($params = array())
	{
		$this->db->join('tb_direktur', 'tb_psl.direktur_no = tb_direktur.direktur_no', 'left');
	    $this->db->order_by('tb_psl.psl_tgl, tb_psl.psl_no', 'desc');
	    if(isset($params) && !empty($params))
	    {
	        $this->db->limit($params['limit'], $params['offset']);
	    }
	    return $this->db->get('tb_psl')->result_array();
	}

	function get_all_lampiran($params = array())
	{
	    $this->db->join('tb_psl', 'tb_psllmp.psl_id = tb_psl.psl_id', 'right');
	    $this->db->order_by('tb_psl.psl_tgl', 'desc');
	    if(isset($params) && !empty($params))
	    {
	        $this->db->limit($params['limit'], $params['offset']);
	    }
	    return $this->db->get('tb_psllmp')->result_array();
	}

	/*
	 * Get all permohonan count
	 */
	function get_all_permohonan_count()
	{
	    $this->db->from('tb_psl');
	    return $this->db->count_all_results();
	}

	function add_permohonan($params)
	{
	    $this->db->insert('tb_psl',$params);
	    return $this->db->insert_id();
	}

	function add_lampiran($params)
	{
	    $this->db->insert('tb_psllmp',$params);
	    return $this->db->insert_id();
	}

	function update_lampiran($psl_id,$params)
	{
	    $this->db->where('psl_id',$psl_id);
	    return $this->db->update('tb_psllmp',$params);
	}

	function update_permohonan($psl_id,$params)
	{
	    $this->db->where('psl_id',$psl_id);
	    return $this->db->update('tb_psl',$params);
	}

	public function delete_permohonan($psl_id)
	{
		return $this->db->delete('tb_psl',array("psl_id"=>$psl_id));
	}

	public function delete_lampiran($psl_id)
	{
		return $this->db->delete('tb_psllmp',array("psl_id"=>$psl_id));
	}
	
}

/* Location: ./application/models/M_detailrincian.php */