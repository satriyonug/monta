<?php

class Login extends CI_Controller {

 public function __construct()
 {
    parent::__construct();
    $this->load->model('MLogin');
    $this->load->model('MWeb');
    $this->load->library('session');
    $this->load->helper('form');
    if ($this->session->userdata('status') == 'login') {
    redirect(base_url('dashboard'));
    }
 }
 
 public function index()
 {
    $data['web'] = $this->MWeb->tampil()->row();
    $data['title']  = "Login Aplikasi";
    $this->load->view('login', $data);
 }

 public function aksilogin()
 {
    $id_user = $this->input->post('id_user');
    $password = $this->input->post('password');

    $where = array(
    'id_user' => $id_user,
    'password' => md5($password),
    );

    $cek = $this->MLogin->login("tb_user", $where )->num_rows();

    if ($cek > 0 ) {

        $data_session = array(
            'id_user' => $id_user,
            'status' => "login"
        );

        $this->session->set_userdata($data_session);
        $log = $this->MLogin->validate($id_user,$password);
        $data = $log->row_array();
        if($data['role'] == "Mahasiswa")
        {
            redirect(base_url('dashboard'));
        }
        elseif ($data['role'] == "Dosen")
        {
            redirect(base_url('dosen'));
        }
        
    } else {
        $this->session->set_flashdata('gagal_login', 'gagal');
        redirect(base_url('login'));
    }
 }
} 