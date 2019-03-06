<?php
class Kaprodi extends CI_Controller {

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
        $data['konten'] = "kaprodi/dashboard_kaprodi";
        $data['title']  = "Tugas Akhir";
        $data['web'] = $this->MWeb->tampil()->row();
        $id_login   = $this->session->userdata("id_user");
        $this->db->select("CONCAT(prefix,id_proposal) AS 'ID_TA', rmk, status, id_proposal, status, nama_mhs, nrp, judul_ta");
        $this->db->from('tb_proposal');
        $query = $this->db->get();
        $data['data']   = $query->result_array();
        $this->load->view('kaprodi/template_kaprodi', $data);
    }
} 