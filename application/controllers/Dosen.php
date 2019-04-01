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
     $this->db->select("rmk, status, id, status, nama_mhs, nrp_mhs, judul_ta");
     $this->db->from('tb_judul');
     $this->db->where('nip', $id_login);
     $this->db->order_by('id', 'DESC');
     $query = $this->db->get();
     $data['data']   = $query->result_array();
     $this->load->view('dosen/template_dosen', $data);
    }

    public function verifikasi($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        
        $objek = array(
                
            'status' => "1",
            'updated_at' => $date
             );

        $this->db->where('id', $id);
        $query = $this->db->update('tb_judul', $objek);
        if ($query) {
            $this->session->set_flashdata('berhasil_edit', 'sukses');
            redirect(base_url('dosen'));
        }
    } 

    public function tolak($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        
        $objek = array(
                
            'status' => "2",
            'updated_at' => $date
             );

        $this->db->where('id', $id);
        $query = $this->db->update('tb_judul', $objek);
        if ($query) {
            $this->session->set_flashdata('berhasil_edit', 'sukses');
            redirect(base_url('dosen'));
        }
    } 

    public function catatan()
	{
		date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		
		$data=array(
			"catatan"=>$_POST['catatan'],
			'updated_at' => $date
		);
		$this->db->where('id', $_POST['id']);
		$this->db->update('tb_judul',$data);
		$this->session->set_flashdata('berhasil_edit',"sukses");
		redirect(base_url('dosen'));
 
    }
    
    public function get_proposal_result()
	{

            $proposalData = $this->input->post('proposalData');

            if(isset($proposalData) and !empty($proposalData)){
                $records = $this->Proposal_model->get_search_judul($proposalData);
                $output = '';
                foreach($records->result_array() as $row){
                	$output .= '    
						<table class="table">
							<tr>
								<td><b>ID Judul</b></td>
								<td>'.$row["id"].'</td>
							</tr>
							<tr>
								<td><b>Nama</b></td>
								<td>'.$row["nama_mhs"].'</td>						    		
							</tr>						    		
							<tr>
								<td><b>NRP</b></td>
								<td>'.$row["nrp_mhs"].'</td>						    		
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
								<td><b>Abstrak</b></td>
								<td>'.$row['abstrak'].'</td>						    		
							</tr>						    			
							<tr>
								<td><b>Pembimbing</b></td>
								<td>'.$row['pembimbing_ta'].'</td>						    		
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


} 