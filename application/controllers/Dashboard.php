<?php
class Dashboard extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('MLogin');
  $this->load->model('MWeb');
  $this->load->model('MDosen');
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
     $data['datados'] = $this->MDosen->tampil()->result_array();
     if ($this->input->post('submit')) {
        $rmk = $this->input->post('rmk');
        $status = $this->input->post('status');
        $dosen = $this->input->post('dosen');
        if (($rmk == "Semua RMK") and ($status == "Semua Status") and ($dosen == "Semua Dosen")) {
            $data['datas'] = $this->Proposal_model->get_proposal();
        }
        else{
            $data['datas'] = $this->Proposal_model->get_proposal_condition($rmk,$status,$dosen);
        }
        $data['rmk'] = $rmk;
        $data['status'] = $status; 
        $data['dosen'] = $dosen;
    }
    else {
        $data['datas'] = $this->Proposal_model->get_proposal();
        $data['rmk'] = "Semua RMK";
        $data['status'] = "Semua Status";
        $data['dosen'] = "Semua Dosen";
    }
     
     $this->load->view('template', $data);
    }
} 