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

    public function pengajuan_ta()
    {
        $data['konten'] = "rmk/dashboard_rmk";
        $data['title']  = "Pengajuan Tugas Akhir";
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
	
	public function sidang_ta()
    {
        $data['konten'] = "rmk/sidang_ta";
        $data['title']  = "Pengajuan Sidang Tugas Akhir";
		$data['web'] = $this->MWeb->tampil()->row();
		$data['dosen'] = $this->MDosen->tampil()->result_array();
		
		if ($this->input->post('submit')) {
			$rmk = $this->input->post('rmk');
			if ($rmk == "ALL") {
				$data['datas'] = $this->MPengajuan->tampil_sidang();
			}
			else{
				
				$data['datas'] = $this->MPengajuan->get_sidang_rmk($rmk);
			}
			$data['search'] = $rmk = $this->input->post('rmk');
		}
		else {
			$data['datas'] = $this->MPengajuan->tampil_sidang();
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
			'status'=>$_POST['status'],
			'tgl_sidang_proposal' => $_POST['tgl_sidang_proposal'],
			'updated_at' => $date
		);
		$this->db->where('id_proposal', $_POST['id_proposal']);
		$this->db->update('tb_proposal',$data);
		$this->session->set_flashdata('berhasil_edit',"sukses");
		redirect(base_url('rmk/pengajuan_ta'));
 
	}

	public function edit_sidang($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		
		$objek = array(
			'status' => "Maju Sidang",
			'updated_at' => $date
             );

        $this->db->where('id_proposal', $id);
		$query = $this->db->update('tb_proposal', $objek);
		
		if ($query) {
            $this->session->set_flashdata('berhasil_edit', 'sukses');
            redirect(base_url('rmk/sidang_ta'));
        }
	}
	
	public function edit_tanggal_sidang()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
		
		$sidang = array(
			'dosen_penguji1' => $_POST['penguji1'],
			'dosen_penguji2' => $_POST['penguji2'],
			'tgl_sidang_ta' => $_POST['tgl_sidang_ta']
		);
		
		$this->db->where('id_ta', $_POST['id']);
        $query_sidang = $this->db->update('tb_sidang', $sidang);
        if ($query_sidang) {
            $this->session->set_flashdata('berhasil_edit', 'sukses');
            redirect(base_url('rmk/sidang_ta'));
        }
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
		redirect(base_url('rmk/pengajuan_ta'));
 
	}

	public function download_berkas($id)
	{
		
		if(ini_get('zlib.output_compression')) 
		{ 
			ini_set('zlib.output_compression', 'Off'); 
		}
			$this->load->helper('file');

			$fileInfo = $this->Proposal_model->getRowsSidang(array('id' => $id));
			$fileoriginalname = $fileInfo['berkas'];

			$Path    =   "upload/sidang/".$fileInfo['berkas'];
			$mime = get_mime_by_extension($Path);

			header('Pragma: public');     // required
			header('Expires: 0');         // no cache
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($Path)).' GMT');
			header('Cache-Control: private',false);
			header('Content-Type: '.$mime);  
			header('Content-Disposition: attachment; filename="'.$fileoriginalname.'"');  // Add the file name
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: '.filesize($Path)); 
			header('Connection: close');
			readfile($Path); 
			exit();
	}
} 