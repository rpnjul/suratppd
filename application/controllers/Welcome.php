<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pegawai');
	}

   function index()
    {
    	$cek = $this->M_pegawai->cek_kepala();
        if ($cek->pgw_jab>0) {
            $cek = $this->M_pegawai->cek_admin();
            if(($cek>0)){
                if (($this->session->has_userdata('status'))) {
                    redirect('dash');
                } else {
                    redirect('login');
                }
            }else{
                echo "<script><script>";
            }
        }else{
            ##redirect('daftar');
            redirect('register/head-office');
        }
    }

    public function errors_503() {
    	$data = array(
    		'title' => "503"
    	);
    	$this->load->view('layouts/stisla/dist/errors-503', $data);
    }

    public function errors_403() {
    	$data = array(
    		'title' => "403"
    	);
    	$this->load->view('layouts/stisla/dist/errors-403', $data);
    }

    public function errors_404() {
    	$data = array(
    		'title' => "404"
    	);
    	$this->load->view('layouts/stisla/dist/errors-404', $data);
    }

    public function errors_500() {
    	$data = array(
    		'title' => "500"
    	);
    	$this->load->view('layouts/stisla/dist/errors-500', $data);
    }
}
