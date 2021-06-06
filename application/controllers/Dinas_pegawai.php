<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Dinas_pegawai extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dinaspegawai');
    } 

    /*
     * Listing of dinas_pegawai
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('dinas_pegawai/index?');
        $config['total_rows'] = $this->M_dinaspegawai->get_all_dinas_pegawai_count();
        $this->pagination->initialize($config);

        $data['dinas_pegawai'] = $this->M_dinaspegawai->get_all_dinas_pegawai($params);
        
        $data['_view'] = 'v_dinas_pegawai/index';
        $data['_landing'] = false;
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new dinas_pegawai
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('ndi_no','Ndi No','required');
		$this->form_validation->set_rules('pgw_nip','Pgw Nip','required|max_length[25]');
		$this->form_validation->set_rules('dnpgw_tgl','Dnpgw Tgl','required');
		$this->form_validation->set_rules('dnpgw_tmp','Dnpgw Tmp','required|max_length[25]');
		$this->form_validation->set_rules('no_pkr','No Pkr','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'ndi_no' => $this->input->post('ndi_no'),
				'pgw_nip' => $this->input->post('pgw_nip'),
				'dnpgw_tgl' => $this->input->post('dnpgw_tgl'),
				'dnpgw_tmp' => $this->input->post('dnpgw_tmp'),
				'no_pkr' => $this->input->post('no_pkr'),
            );
            
            $dinas_pegawai_id = $this->M_dinaspegawai->add_dinas_pegawai($params);
            redirect('dinas_pegawai/index');
        }
        else
        {            
            $data['_view'] = 'v_dinas_pegawai/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a dinas_pegawai
     */
    function edit($dnpgw_id)
    {   
        // check if the dinas_pegawai exists before trying to edit it
        $data['dinas_pegawai'] = $this->M_dinaspegawai->get_dinas_pegawai($dnpgw_id);
        
        if(isset($data['dinas_pegawai']['dnpgw_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('ndi_no','Ndi No','required');
			$this->form_validation->set_rules('pgw_nip','Pgw Nip','required|max_length[25]');
			$this->form_validation->set_rules('dnpgw_tgl','Dnpgw Tgl','required');
			$this->form_validation->set_rules('dnpgw_tmp','Dnpgw Tmp','required|max_length[25]');
			$this->form_validation->set_rules('no_pkr','No Pkr','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'ndi_no' => $this->input->post('ndi_no'),
					'pgw_nip' => $this->input->post('pgw_nip'),
					'dnpgw_tgl' => $this->input->post('dnpgw_tgl'),
					'dnpgw_tmp' => $this->input->post('dnpgw_tmp'),
					'no_pkr' => $this->input->post('no_pkr'),
                );

                $this->M_dinaspegawai->update_dinas_pegawai($dnpgw_id,$params);            
                redirect('dinas_pegawai/index');
            }
            else
            {
                $data['_view'] = 'v_dinas_pegawai/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The dinas_pegawai you are trying to edit does not exist.');
    } 

    /*
     * Deleting dinas_pegawai
     */
    function remove($dnpgw_id)
    {
        $dinas_pegawai = $this->M_dinaspegawai->get_dinas_pegawai($dnpgw_id);

        // check if the dinas_pegawai exists before trying to delete it
        if(isset($dinas_pegawai['dnpgw_id']))
        {
            $this->M_dinaspegawai->delete_dinas_pegawai($dnpgw_id);
            redirect('dinas_pegawai/index');
        }
        else
            show_error('The dinas_pegawai you are trying to delete does not exist.');
    }
    
}