<?php
class Sidang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPengajuan');
        $this->load->model('MDosen');
        $this->load->model('Proposal_model');
        $this->load->model('MWeb');
        $this->load->model('MJudul');
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        };

        $id_login   = $this->session->userdata("id_user");
        $datalogin  = $this->db->get_where("tb_user", array('id_user'=> $id_login))->row();
    }

    public function index()
    {
        $data['title']    = "Pengajuan Sidang Tugas Akhir";
        $id_login   = $this->session->userdata("id_user");
        $this->db->select("rmk, id_proposal, nama_mhs, nrp, judul_ta, pembimbing1_ta, nip1, pembimbing2_ta, nip2, revisi");
        $this->db->from('tb_proposal');
        $this->db->where('nrp', $id_login);
        $query = $this->db->get();
        $data['sidang'] = $this->MPengajuan->tampil_sidang_ta($id_login);
        $data['data']   = $query->result_array();
        $data['konten'] = "pengajuan/mengajukan_sidang";
        $data['web']    = $this->MWeb->tampil()->row();
        $data['judul_ta'] = $this->MJudul->tampil($id_login)->result_array();
        $this->load->view('template', $data);
    }

    public function do_upload() {
        
        $id_login   = $this->session->userdata("id_user");
           $data['web']    = $this->MWeb->tampil()->row();
           if ($this->input->post('submit')) {
               $d = $this->input->post('id_ta');
               $a = $this->input->post('nama_mhs');
               $b = $this->input->post('nrp_mhs');
               $j = $this->input->post('rmk');
               $c = $this->input->post('judul_ta');
               $f = $this->input->post('pembimbing1');
               $val1 = explode('+', $f);
               $dosen1 = $val1[0];
               $nip1 = $val1[1]; 
               $g = $this->input->post('pembimbing2');
               $val2 = explode('+', $g);
               $dosen2 = $val2[0];
               $nip2 = $val2[1];
               $h = $this->input->post('berkas_ta');
               
               $config['upload_path']   = './upload/sidang'; 
               $config['allowed_types'] = 'gif|jpg|png|pdf|csv|zip'; 
               
               $config['max_size']      = 0; 
               //  $config['max_width']     = 1024; 
               //  $config['max_height']    = 768;  
               $this->load->library('upload', $config);
                   
               if ( ! $this->upload->do_upload('berkas_ta')) {
                   $error = array('error' => $this->upload->display_errors()); 
                   $this->load->view('upload', $error); 
                }
                   
                else { 
                    $upload_data = $this->upload->data(); 
                }
                
               
               
               date_default_timezone_set('Asia/Jakarta');
               $date = date('Y-m-d H:i:s');
               $objek = array(
                   'id_ta' => $d,
                   'nama' => $a,
                   'nrp' => $b,
                   'rmk' => $j,
                   'judul_ta' => $c,
                   
                   'pembimbing1' => $dosen1,
                   'nip1' => $nip1,
                   'pembimbing2' => $dosen2,
                   'nip2' => $nip2,
                   'berkas' => $upload_data['file_name'],
                   
                   'created_at' => $date
                   
                    );
               
               $status = array(
                   'status' => "Menunggu Verifikasi Pengajuan Sidang"
                );

               $this->db->where('id_proposal', $d);
               $this->db->update('tb_proposal', $status);
               
               $query = $this->MPengajuan->sidang($objek);
 
               if ($query) {
                   $this->session->set_flashdata('berhasil_simpan', 'sukses');
                   redirect(base_url('sidang'));
               }
   
           }
       }

    
    public function edit($id) {
        $data['title']  = "Edit Pengajuan Proposal Tugas Akhir";
        $data['web']    = $this->MWeb->tampil()->row();
        if ($this->input->post('submit')) {
            
            $a = $this->input->post('nama_mhs');
            $b = $this->input->post('nrp_mhs');
            $j = $this->input->post('rmk');
            $c = $this->input->post('judul_ta');
            $d = $this->input->post('abstrak_ta');
            $e = $this->input->post('kata_kunci');
            $f = $this->input->post('pembimbing1');
            $val1 = explode('+', $f);
            $dosen1 = $val1[0];
            $nip1 = $val1[1]; 
            $g = $this->input->post('pembimbing2');
            $val2 = explode('+', $g);
            $dosen2 = $val2[0];
            $nip2 = $val2[1];
            $h = $this->input->post('proposal_ta');
            $i = $this->input->post('referensi_ta');

            $config['upload_path']   = './upload/proposal'; 
            $config['allowed_types'] = 'gif|jpg|png|pdf|csv'; 
            
            $config['max_size']      = 0; 
            //  $config['max_width']     = 1024; 
            //  $config['max_height']    = 768;  
            $this->load->library('upload', $config);
                
            if ( ! $this->upload->do_upload('proposal_ta')) {
                $error = array('error' => $this->upload->display_errors()); 
                $this->load->view('upload', $error); 
             }
                
             else { 
                 $upload_data = $this->upload->data(); 
             }

            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i:s');
            $objek = array(
                
                'nama_mhs' => $a,
                'nrp' => $b,
                'rmk' => $j,
                'judul_ta' => $c,
                'abstrak_ta' => $d,
                'kata_kunci_ta' => $e,
                'pembimbing1_ta' => $dosen1,
                'nip1' => $nip1,
                'pembimbing2_ta' => $dosen2,
                'nip2' => $nip2,
                'proposal_ta' => $upload_data['file_name'],
                'referensi_ta' => $i,
                'updated_at' => $date
                 );


            $this->db->where('id_proposal', $id);
            $query = $this->db->update('tb_proposal', $objek);

            if ($query) {
                $this->session->set_flashdata('berhasil_edit', 'sukses');
                redirect(base_url('pengajuan'));
            }

        } else {
            $data['konten'] = "pengajuan/edit";
            $data['editdata'] = $this->db->get_where("tb_proposal", array('id_proposal'=> $id))->row();
            $data['datadosen'] = $this->MDosen->tampil()->result_array();
            $this->load->view('template', $data); 
        }
    }

    public function edit_judul($id) {
        $data['title']  = "Edit Pengajuan Judul Proposal Tugas Akhir";
        $data['web']    = $this->MWeb->tampil()->row();
        if ($this->input->post('submit')) {
            
            $a = $this->input->post('nama_mhs');
            $b = $this->input->post('nrp_mhs');
            $j = $this->input->post('rmk');
            $c = $this->input->post('judul_ta');
            $d = $this->input->post('abstrak_ta');
            $f = $this->input->post('pembimbing1');
            $val1 = explode('+', $f);
            $dosen1 = $val1[0];
            $nip1 = $val1[1]; 
            

            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i:s');
            $objek = array(
                
                'nama_mhs' => $a,
                'nrp_mhs' => $b,
                'rmk' => $j,
                'judul_ta' => $c,
                'abstrak' => $d,
                'pembimbing_ta' => $dosen1,
                'nip' => $nip1,
                'updated_at' => $date
                 );


            $this->db->where('id', $id);
            $query = $this->db->update('tb_judul', $objek);

            if ($query) {
                $this->session->set_flashdata('berhasil_edit', 'sukses');
                redirect(base_url('pengajuan'));
            }

        } else {
            $data['konten'] = "pengajuan/edit_judul";
            $data['editdata'] = $this->db->get_where("tb_judul", array('id'=> $id))->row();
            $data['datadosen'] = $this->MDosen->tampil()->result_array();
            $this->load->view('template', $data); 
        }
    }

    public function hapus($id)
    {

        $query = $this->MPengajuan->hapus($id);

        if ($query) {
            $this->session->set_flashdata('berhasil_hapus', 'sukses');
            redirect(base_url('pengajuan'));
        }
    }
    
    

    
}