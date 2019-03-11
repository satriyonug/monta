<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proposal_model');
	}
	public function index()
	{
		// $data['konten'] = "dashboard_view";
     	// $data['title']  = "Tugas Akhir";
		$data['datas'] = $this->Proposal_model->get_proposal();
		$this->load->view('dashboard_view',$data);
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

	public function download($id){

        if(ini_get('zlib.output_compression')) 
        { 
            ini_set('zlib.output_compression', 'Off'); 
        }
            $this->load->helper('file');

            $fileInfo = $this->Proposal_model->getRows(array('id' => $id));
            $fileoriginalname = $fileInfo['proposal_ta'];

            $Path    =   "upload/proposal/".$fileInfo['proposal_ta'];
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
