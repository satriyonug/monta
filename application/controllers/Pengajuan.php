<?php
class Pengajuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPengajuan');
        
        $this->load->model('MWeb');
        $this->load->library('session');
        $this->load->helper('form');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url('login'));
        };

        $id_login   = $this->session->userdata("id_user");
        $datalogin  = $this->db->get_where("tb_user", array('id_user'=> $id_login))->row();
    }

    public function index()
    {
        $data['title']  = "Proposal Tugas Akhir";
        $id_login   = $this->session->userdata("id_user");
        $this->db->select("CONCAT(prefix,id_proposal) AS 'ID_TA', id_proposal, status, nama_mhs, nrp, judul_ta, pembimbing1_ta, pembimbing2_ta");
        $this->db->from('tb_proposal');
        $this->db->where('nrp', $id_login);
        $query = $this->db->get();
        $data['data']   = $query->result_array();
        $data['konten'] = "pengajuan/index";
        $data['web']    = $this->MWeb->tampil()->row();
        $this->load->view('template', $data);
    }

    public function tambah() {
     $data['title']    = "Pengajuan Proposal TA";
        $data['web']    = $this->MWeb->tampil()->row();
        if ($this->input->post('submit')) {

            $a = $this->input->post('nama_mhs');
            $b = $this->input->post('nrp_mhs');
            $j = $this->input->post('rmk');
            $c = $this->input->post('judul_ta');
            $d = $this->input->post('abstrak_ta');
            $e = $this->input->post('kata_kunci');
            $f = $this->input->post('pembimbing1');
            $g = $this->input->post('pembimbing2');
            $h = $this->input->post('proposal_ta');
            $i = $this->input->post('referensi_ta');

            $config['upload_path']          = './upload/proposal/';
            $config['allowed_types']        = 'pdf|csv';
            $config['file_name']            = $this->input->post('proposal_ta');
            $config['overwrite']			= true;
            $config['max_size']             = 1024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload()) {
                $this->upload->data("file_name");
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
                'pembimbing1_ta' => $f,
                'pembimbing2_ta' => $g,
                'proposal_ta' => $h,
                'referensi_ta' => $i,
                'status' => 'Mendaftar',
                'created_at' => $date,
                'updated_at' => $date
                 );

            $query = $this->MPengajuan->simpan($objek);

            if ($query) {
                $this->session->set_flashdata('berhasil_simpan', 'sukses');
                redirect(base_url('pengajuan'));
            }

        } else {
            $data['konten'] = "pengajuan/insert";
            $this->load->view('template', $data);
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
            $g = $this->input->post('pembimbing2');
            $h = $this->input->post('proposal_ta');
            $i = $this->input->post('referensi_ta');

            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i:s');
            $objek = array(
                
                'nama_mhs' => $a,
                'nrp' => $b,
                'rmk' => $j,
                'judul_ta' => $c,
                'abstrak_ta' => $d,
                'kata_kunci_ta' => $e,
                'pembimbing1_ta' => $f,
                'pembimbing2_ta' => $g,
                'proposal_ta' => $h,
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