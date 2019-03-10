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
     $id_login   = $this->session->userdata("id_user");
     $this->db->select("CONCAT(prefix,id_proposal) AS 'ID_TA', rmk, status, id_proposal, status, nama_mhs, nrp, judul_ta");
     $this->db->from('tb_proposal');
     $this->db->where('nip1', $id_login);
     $this->db->order_by('id_proposal', 'DESC');
     $query = $this->db->get();
     $data['data']   = $query->result_array();
     $this->load->view('dosen/template_dosen', $data);
    }

    public function verifikasi($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        
        $objek = array(
                
            'status' => "Mendaftar",
            'updated_at' => $date
             );

        $this->db->where('id_proposal', $id);
        $query = $this->db->update('tb_proposal', $objek);
        if ($query) {
            $this->session->set_flashdata('berhasil_edit', 'sukses');
            redirect(base_url('dosen'));
        }
    } 

} 