<?php
class Rmk extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('MLogin');
  $this->load->model('MWeb');
  $this->load->model('MPengajuan');
  $this->load->model('MDosen');
  $this->load->model('Proposal_model');
  $this->load->library('session');
  if ($this->session->userdata('status') != 'login') {
   redirect(base_url('login'));
  }
 }

    public function index()
    {
        $data['konten'] = "rmk/dashboard_rmk";
        $data['title']  = "Tugas Akhir";
		$data['web'] = $this->MWeb->tampil()->row();
		if ($this->input->post('submit')) {
			$rmk = $this->input->post('rmk');
			if ($rmk == "ALL") {
				$data['datas'] = $this->Proposal_model->get_proposal();
			}
			else{
				
				$data['datas'] = $this->Proposal_model->get_proposal_rmk($rmk);
			}
			$data['search'] = $rmk = $this->input->post('rmk');
		}
		else {
			$data['datas'] = $this->Proposal_model->get_proposal();
			$data['search'] = "ALL";
		}
		// $data['datados'] = $this->MDosen->tampil()->result();
        $this->load->view('rmk/template_rmk', $data);
    }

    
    
    public function edit_status_proposal()
	{
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		
		$data=array(
			"status"=>$_POST['status'],
			'updated_at' => $date
		);
		$this->db->where('id_proposal', $_POST['id_proposal']);
		$this->db->update('tb_proposal',$data);
		$this->session->set_flashdata('berhasil_edit',"sukses");
		redirect(base_url('rmk'));
 
	}

	public function revisi_proposal()
	{
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		
		$data=array(
			"revisi"=>$_POST['revisi'],
			'updated_at' => $date
		);
		$this->db->where('id_proposal', $_POST['id_proposal']);
		$this->db->update('tb_proposal',$data);
		$this->session->set_flashdata('berhasil_edit',"sukses");
		redirect(base_url('rmk'));
 
	}
} 