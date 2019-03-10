<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDosen extends CI_Model {

 public function tampil() {
  return $this->db->get('tb_dosen');
 }
} 