<?php
class MLogin extends CI_Model {

 public function login($table, $where)
 {
  return $this->db->get_where($table, $where);
 }

 public function validate($id_user, $password)
 {
    $log = $this->db->query("SELECT * FROM tb_user WHERE id_user='$id_user' AND password=MD5('$password') LIMIT 1");
    return $log;
 }
 
} 