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

 public function sidang($data) {
      return $this->db->insert('tb_sidang', $data);
     }

public function tampil_sidang() {
      $this->db->select('tb_sidang.*, tb_proposal.status');
      $this->db->join('tb_proposal', 'tb_proposal.id_proposal = tb_sidang.id_ta');
      $this->db->order_by('id','DESC');
      $query = $this->db->get('tb_sidang');
      return $query->result();
}


public function get_sidang_rmk($rmk)
	{
		$this->db->select('*');
		$this->db->where('rmk',$rmk);
	    $query = $this->db->get('tb_sidang');
	    return $query->result();

	}


} 