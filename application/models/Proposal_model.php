<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proposal_model extends CI_Model {

	
	public function get_proposal()
	{
	    $this->db->select('*');
	    $query = $this->db->get('tb_proposal');
	    return $query->result();

	}
	
	public function get_search_proposal($phoneData)
	{
		$this->db->select('*');
		$this->db->where('id_proposal',$phoneData);
		$res2 = $this->db->get('tb_proposal');
		return $res2;
	}

}