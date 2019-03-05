<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPengajuan extends CI_Model {

 public function tampil() {
  return $this->db->get('tb_proposal');
 }

 public function simpan($data) {
  return $this->db->insert('tb_proposal', $data);
 }

 public function hapus($data)
 {
  $hapus = $this->db->where('id_proposal', $data);
        return $this->db->delete('tb_proposal', $hapus);
 }


} 