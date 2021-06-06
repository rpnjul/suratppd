<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Surat_tugas extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_surattugas');
        $this->load->model('M_suratmasuk');
        $this->load->model('M_pengikuttgs');
        $this->load->model('M_pegawai');
        $this->load->library('Loader');
        if (!$this->session->has_userdata('status')) {
            $data['_view'] = 'v_home/index';
            $data['_landing'] = true;
            $this->load->view('layouts/content',$data);
        }
    } 

    /*
     * Listing of surat_tugas
     */
    function index()
    {
        if ($this->session->has_userdata('status')) {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('surat_tugas/index?');
        $config['total_rows'] = $this->M_surattugas->get_all_surattugas_count();
        $this->pagination->initialize($config);

       // if ($this->session->userdata('level')!='Pejabat Lelang') {
        $data['surat_tugas'] = $this->M_surattugas->get_all_surattugas($params);
        //}else{
        //    $data['surat_tugas'] = $this->M_surattugas->get_all_surattugas_by_nip($params,$this->session->userdata('nip'));
        //}
        // $data['pegawai']=$this->M_pegawai->get_pegawai_by_nip( $data['surat_tugas']['pgw_nip']);
        
        $data['_view'] = 'v_surattugas/index';
        $data['_landing'] = false;
        $data['judul'] = "Surat tugas";
        $load = $this->loader->load($data);
        $this->load->view('layouts/content',$load);
        }else{
            redirect('login');
        }
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_surattugas->search_surattugas($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->srtgs_no;
                    echo json_encode($arr_result);
            }
        }
    }

    function get_autocomplete_by_nip(){
        if (isset($_GET['term'])) {
            $result = $this->M_surattugas->search_surattugas_by_nip($_GET['term'],$this->session->userdata('nip'));
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->srtgs_no;
                    echo json_encode($arr_result);
            }
        }
    }

        private function kodeotomatis()
            {

                ///  ST-999/WKN.08/9999
                $res = $this->db->query('select max(right(srtgs_no,4)) as `urut_tahun`,max(substring(srtgs_no,4,3)) as `urut` from tb_srtgs')->row();
                $tgl = date('/Y');
               // echo $res->urut.'<br>';
                //echo substr($tgl, 1,4);
                if (isset($res->urut)) {
                    //$urut = intval($res->urut);
                    $urut = intval($res->urut);
    /*                echo $urut.'<br>';
                    echo $bln.'<br>';
                    echo $thn.'<br>';
                    echo substr($tgl, 1,2).'<br>';
                    echo substr($tgl, 4,4).'<br>';*/
                    if (substr($tgl, 1,4)==$res->urut_tahun) { ## tahun
                        if ($urut >= 999) {
                                $urut+=0;
                        }else{
                                $urut++;
                        }
                    }else{
                        $urut=1;
                    }
                }else{
                    $urut=1;
                }
                $str_length = strlen($urut);
                $dig = substr("000{$urut}", $str_length);
                return 'ST-'.$dig.'/WKN.08'.$tgl;
        }

    public function cek_nip($nip){
       $nip = explode(' - ', $nip)[0];
       $cek = $this->M_pegawai->get_pegawai_by_nip($nip);
       if(!isset($cek))
       {
          $this->form_validation->set_message('cek_nip', 'Data tidak sesuai');
          return FALSE;
       } 
       return TRUE;
    } 

    public function cek_suratmasuk($nomor){
       $cek = $this->M_suratmasuk->get_suratmasuk_by_no($nomor);
       if(!isset($cek))
       {
          $this->form_validation->set_message('cek_suratmasuk', 'Nomor tidak sesuai');
          return FALSE;
       } 
       return TRUE;
    }

    function rules(){
        $this->form_validation->set_message('max_length', '{field} tidak dapat lebih dari {param} karakter.');
        $this->form_validation->set_message('required', 'Memerlukan {field}.');
        $this->form_validation->set_message('is_unique', '{field} telah digunakan.');
    }

    /*
     * Adding a new surat_tuga
     */
    function add()
    {   

        if ($this->session->has_userdata('status') & $this->session->userdata('level')=='Kepala Sub Bagian Umum') {
        $this->load->library('form_validation');

		//$this->form_validation->set_rules('srtgs_no','Nomor Surat Tugas','required|is_unique[`tb_srtgs`.srtgs_no]|max_length[30]');
        $this->form_validation->set_rules('srtgs_tgl','Tanggal berangkat','required');
        $this->form_validation->set_rules('srtgs_kmb','Tanggal kembali','required');
        $this->form_validation->set_rules('srtms_no','Ref. Surat masuk','required|callback_cek_suratmasuk|is_unique[tb_srtgs.srtms_no]');
		$this->form_validation->set_rules('pgw_nip','Pegawai','required|callback_cek_nip');
        $this->form_validation->set_rules('srtgs_tmt','Tempat bertugas','required');
		$this->rules();
        if($this->form_validation->run())     
        {   
            $tgl = strtotime($this->input->post('srtgs_tgl'));
            $kmb = strtotime($this->input->post('srtgs_kmb'));
            $kmb = date('Y-m-d',$kmb);
            $pgw =  explode(' - ', $this->input->post('pgw_nip'))[0];
            $tgl = date('Y-m-d',$tgl);
            $kode = $this->kodeotomatis();
            $params = array(
				'srtgs_no' => $kode,
                'srtms_no' => $this->input->post('srtms_no'),
                'srtgs_tbr' => $this->input->post('srtgs_tbr'),
                'srtgs_tmt' => $this->input->post('srtgs_tmt'),
				'srtgs_tgl' => $tgl,
                'srtgs_kmb' => $kmb,
                'srtgs_sts' => 1,
				'pgw_nip' => $pgw
            );
            
            $surat_tugas_id = $this->M_surattugas->add_surattugas($params);
            if (isset(($surat_tugas_id))) {
                if (!empty($this->input->post('pengikut'))) {
                    foreach ($this->input->post('pengikut') as $key => $value) {
                        if ($this->cek_nip($value['pgw_nip'])) {
                            $p = explode(' - ', $value['pgw_nip'])[0];
                            $par = array(
                                'srtgs_no'=>$kode,
                                'pgw_nip'=>$p
                            );
                            $pengikut = $this->M_pengikuttgs->add_pengikut_tgs($par);  
                        }
                    }
                }
            }
            redirect('surat_tugas/index');
        }
        else
        {            
            $data['judul'] = "Surat tugas";
            $data['_view'] = 'v_surattugas/add';
            $data['kode']=$this->kodeotomatis();
            $data['_landing'] = false;
            $load = $this->loader->load($data);
            $this->load->view('layouts/content',$load);
        }
        }else{
            redirect('login');
        }
    }  

    /*
     * Editing a surat_tuga
     */
    function edit($st_no)
    {   
        // check if Data  surat_tuga exists before trying to edit it
        if ($this->session->has_userdata('status') & $this->session->userdata('level')=='Kepala Sub Bagian Umum') {
        
        $data['surat_tugas'] = $this->M_surattugas->get_surattugas($st_no);
        $pgw = $this->M_pegawai->get_pegawai_by_nip($data['surat_tugas']['pgw_nip']);
        //$data['surat_tugas']['pgw_nip'] = $pgw['pgw_nip'].' - '.$pgw['pgw_nm'].' ('.$pgw['pgw_jab'].')';
        $data['pengikut_tugas'] = $this->M_pengikuttgs->get_pengikut_tgs_by_no($data['surat_tugas']['srtgs_no']);
        //$pgk = $this->M_pegawai->get_pegawai_by_nip($data['pengikut_tugas']->pgw_nip);
        //$data['pengikut_tugas']->pgw_nip = $pgk['pgw_nip'].' - '.$pgk['pgw_nm'].' ('.$pgk['pgw_jab'].')';
        $data['count_ikut'] = $this->M_pengikuttgs->count_by_no($data['surat_tugas']['srtgs_no']);;
        if(isset($data['surat_tugas']['srtgs_id']))
        {
            $this->load->library('form_validation');
            $nomor =  ($this->input->post('srtms_no') !=  $data['surat_tugas']['srtms_no']) ? '|is_unique[tb_srtgs.srtms_no]' : '';         
            //$this->form_validation->set_rules('srtgs_no','Nomor Surat Tugas','required|max_length[30]'.$nomor);
            $this->form_validation->set_rules('srtgs_tgl','Tanggal berangkat','required');
            $this->form_validation->set_rules('srtgs_kmb','Tanggal kembali','required');
            $this->form_validation->set_rules('srtms_no','Ref. Surat masuk','required|callback_cek_suratmasuk'.$nomor);
            $this->form_validation->set_rules('pgw_nip','Pegawai','required|callback_cek_nip');
            $this->form_validation->set_rules('srtgs_tmt','Tempat bertugas','required');
            $this->rules();
        
            if($this->form_validation->run())     
            {   
                $tgl = strtotime($this->input->post('srtgs_tgl'));
                $kmb = strtotime($this->input->post('srtgs_kmb'));
                $kmb = date('Y-m-d',$kmb);
                $pgw =  explode(' - ', $this->input->post('pgw_nip'))[0];
                $tgl = date('Y-m-d',$tgl);
                $params = array(
                    'srtgs_tmt' => $this->input->post('srtgs_tmt'),
                    'srtgs_tgl' => $tgl,
                    'srtgs_kmb' => $kmb,
                    'pgw_nip' => $pgw
                );

                $surat_tugas_id = $this->M_surattugas->update_surattugas($st_no,$params);  
                if (isset(($surat_tugas_id))) {
                    $pengikut = $this->M_pengikuttgs->delete_pengikut_tgs($data['surat_tugas']['srtgs_no']);
                    if (!empty($this->input->post('pengikut'))) {
                        foreach ($this->input->post('pengikut') as $key => $value) {
                             if ($this->cek_nip($value['pgw_nip'])) {
                                 $p = explode(' - ', $value['pgw_nip'])[0];
                                 if ($this->cek_nip($value['pgw_nip'])) {
                                     $par = array(
                                        'pgw_nip'=>$p,
                                        'srtgs_no'=>$data['surat_tugas']['srtgs_no']
                                    );
                                     $pengikut = $this->M_pengikuttgs->add_pengikut_tgs($par);
                                 }    
                             }
                        }
                    }
                }          
                redirect('surat_tugas/index');
            }else{
                $data['_view'] = 'v_surattugas/edit';
                $data['judul'] = "Surat tugas";
                $data['_landing'] = false;
                $load = $this->loader->load($data);
                $this->load->view('layouts/content',$load);
            }
        }
        else
            show_error('Data tidak ditemukan');
    }else{
        redirect('login');
    }
    } 

    /*
     * Deleting surat_tuga
     */
    function remove()
    {
        $st_no = $this->input->post('id');
            if ($this->session->has_userdata('status') & $this->session->userdata('level')=='Kepala Sub Bagian Umum') {
                $surat_tuga = $this->M_surattugas->get_surattugas($st_no);
                if(isset($surat_tuga['srtgs_no']))
                {
                    $this->M_surattugas->delete_surattugas($st_no);
                    redirect('surat_tugas/index');
                }
                else
                    show_error('Data tidak ditemukan');
            }else{
                redirect('login');
            }
    }

    public function cetak($value='')
    {
        if($this->session->has_userdata('status')){
            $data['logo'] = "";
            $data['judul']="SURAT TUGAS";
            $data['surat_tugas']= $this->M_surattugas->get_surattugas_by_join($value);
            //var_dump(  $data['surat_tugas']);
            if (isset($data['surat_tugas'])) {
                $data['pengikut_tugas']= $this->M_pengikuttgs->get_pengikut_tgs_by_no_join($data['surat_tugas']['srtgs_no']);
                $data['nama_file']  = 'Surat tugas '.$this->loader->konversi_tanggal($data['surat_tugas']['srtgs_tgl']);
                $data['kepala_kantor'] = $this->M_pegawai->search_pegawai('Kepala Kantor');
                $data['tembusan'] = $this->M_pegawai->search_pegawai('Kepala Sub Bagian Umum');
                $this->loader->cetak('P',$data);
            }else{
                redirect('surat_tugas');
            }
        }else{
            redirect('login');
        }
    }
    
}