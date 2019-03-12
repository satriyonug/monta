<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MJudul extends CI_Model {

 public function tampil($nrp) {
       $this->db->where('nrp_mhs', $nrp);
  return $this->db->get('tb_judul');
 }

 public function simpan($data) {
  return $this->db->insert('tb_judul', $data);
 }

 public function hapus($data)
 {
  $hapus = $this->db->where('id', $data);
        return $this->db->delete('tb_judul', $hapus);
 }

 public function get_search_judul($judul)
{
      $this->db->select('*');
      $this->db->where('id',$judul);
      $res2 = $this->db->get('tb_judul');
      return $res2;
}


} 