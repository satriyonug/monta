<?php
class Dosen extends CI_Controller {

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
  $id_login   = $this->session->userdata("id_user");
  $datalogin  = $this->db->get_where("tb_user", array('id_user'=> $id_login))->row();
 }

    public function index()
    {
     $data['konten'] = "dosen/dashboard_dosen";
     $data['title']  = "Tugas Akhir";
     $data['web'] = $this->MWeb->tampil()->row();
     $nama   = $this->session->userdata("nama");
     $this->db->select("CONCAT(prefix,id_proposal) AS 'ID_TA', rmk, status, id_proposal, status, nama_mhs, nrp, judul_ta");
     $this->db->from('tb_proposal');
     $this->db->where('pembimbing1_ta', "Abdul Munif");
     $query = $this->db->get();
     $data['data']   = $query->result_array();
     $this->load->view('dosen/template_dosen', $data);
    }
} 