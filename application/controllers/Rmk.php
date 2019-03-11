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

    public function get_proposal_result()
	{

            $proposalData = $this->input->post('proposalData');

            if(isset($proposalData) and !empty($proposalData)){
                $records = $this->Proposal_model->get_search_proposal($proposalData);
                $output = '';
                foreach($records->result_array() as $row){
                	$output .= '    
						<table class="table">
							<tr>
								<td><b>ID Proposal</b></td>
								<td>'.$row["id_proposal"].'</td>
							</tr>
							<tr>
								<td><b>Nama</b></td>
								<td>'.$row["nama_mhs"].'</td>						    		
							</tr>						    		
							<tr>
								<td><b>NRP</b></td>
								<td>'.$row["nrp"].'</td>						    		
							</tr>	
							<tr>
								<td><b>RMK</b></td>
								<td>'.$row["rmk"].'</td>						    		
							</tr>
							<tr>
								<td><b>Judul</b></td>
								<td>'.$row['judul_ta'].'</td>						    		
							</tr>						    			
							<tr>
								<td><b>Pembimbing 1</b></td>
								<td>'.$row['pembimbing1_ta'].'</td>						    		
							</tr>
							<tr>
								<td><b>Pembimbing 2</b></td>
								<td>'.$row["pembimbing2_ta"].'</td>
							</tr>						    								    		
							<tr>
								<td><b>Status</b></td>
								<td>'.$row["status"].'</td>						    		
							</tr>						    								    		
						</table>
					';

                }				
                echo $output;
            }
            else {
            	echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Phone'.'</li></ul></center>';
            }
 
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