<?php
class Dashboard extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('MLogin');
  $this->load->model('MWeb');
  $this->load->model('MPengajuan');
  $this->load->model('Proposal_model');
  $this->load->library('session');
  if ($this->session->userdata('status') != 'login') {
   redirect(base_url('login'));
  }
 }

    public function index()
    {
     $data['konten'] = "dashboard_view";
     $data['title']  = "Tugas Akhir";
     $data['web'] = $this->MWeb->tampil()->row();
     $data['datas'] = $this->Proposal_model->get_proposal();
		
     $id_login = $this->session->userdata("id_user");
     
     $this->load->view('template', $data);
    }
} 