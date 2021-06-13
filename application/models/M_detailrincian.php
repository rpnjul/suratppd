<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detailrincian extends CI_Model {

	function __construct()
	{
	    parent::__construct();
	}
	
	/*
	 * Get daftar_rincian by rcn_id
	 */
	function get_daftar_rincian($rcndtl_id)
	{
	    return $this->db->get_where('tb_rcndtl',array('rcndtl_id'=>$rcndtl_id))->row_array();
	}

	function get_daftar_rincian_by_rcn($rcn_id)
	{
		$this->db->select('*,((rnd_binap * rnd_jmlinap) + rnd_btrkt + rnd_bplg + rnd_sku + rnd_kettmbhn ) as `total` ');
	    return $this->db->get_where('tb_rcndtl',array('rcn_id'=>$rcn_id))->row_array();
	}
	
	/*
	 * Get all daftar_rincian count
	 */
	function get_all_daftar_rincian_count()
	{
	    $this->db->from('tb_rcndtl');
	    return $this->db->count_all_results();
	}

	function add_detail_rincian($params)
	{
	    $this->db->insert('tb_rcndtl',$params);
	    return $this->db->insert_id();
	}

	function update_detail_rincian($rnd_id,$params)
	{
	    $this->db->where('rcn_id',$rnd_id);
	    return $this->db->update('tb_rcndtl',$params);
	}
	
	
}

/* End of file M_detailrincian.php */
/* Location: ./application/models/M_detailrincian.php */