<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai');
    } 

    /*
     * Listing of user
     */
    function index()
    {

        if (($this->session->userdata['status']=='login')) {
            redirect('dash');
        } else {
            redirect('login');
        }
    }
    public function login()
    {
        if ($this->session->has_userdata('status')) {
            redirect('dash');
        }else{
            $this->load->library('form_validation');
            $this->form_validation->set_rules('u_email','Email','required');
            $this->form_validation->set_rules('u_password','Password','required');
            if ($this->form_validation->run()) {
                $email = $this->input->post('u_email');
                $password = $this->input->post('u_password');
                $data['user'] = $this->M_pegawai->get_login($email,$password);
                if (isset($data['user']['usr_id'])) {
                    $data['pegawai'] = $this->M_pegawai->get_pegawai_by_nip($data['user']['pgw_nip']);
                    $login = array(
                        'nip' => $data['user']['pgw_nip'],
                        'nama' => $data['pegawai']['pgw_nm'],
                        'email' => $data['user']['usr_eml'],
                        'level' => $data['user']['usr_lvl'],
                        'status' => "login"
                        );
                    $this->session->set_userdata($login);
                    redirect('dash');
                }else{
                    $data['_view'] = 'v_home/index';
                    $data['_landing'] = true;
                    $this->load->view('layouts/main',$data);
                }
            }else{
                    $data['_view'] = 'v_home/index';
                    $data['_landing'] = true;
                    $this->load->view('layouts/main',$data);
            }
        }
       
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
    
}
