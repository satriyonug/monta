<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proposal_model extends CI_Model {

	
	public function get_proposal()
	{
		$this->db->select('*');
		$this->db->order_by('id_proposal','DESC');
	    $query = $this->db->get('tb_proposal');
	    return $query->result();

	}

	public function get_proposal_condition($rmk, $status, $dosen)
	{
		if (($rmk != "Semua RMK") and ($status == "Semua Status") and ($dosen == "Semua Dosen")) {
            $this->db->select('*');
			$this->db->where("(rmk = '$rmk')");
			$query = $this->db->get('tb_proposal');
		} 
		elseif (($rmk != "Semua RMK") and ($status != "Semua Status") and ($dosen == "Semua Dosen")) {
            $this->db->select('*');
			$this->db->where('rmk',$rmk)
			->where('status',$status);
			$query = $this->db->get('tb_proposal');
		}
		elseif (($rmk != "Semua RMK") and ($status == "Semua Status") and ($dosen != "Semua Dosen")) {
            $this->db->select('*');
			$this->db->where("(rmk = '$rmk') and ((pembimbing1_ta = '$dosen') or (pembimbing2_ta = '$dosen'))");
			$query = $this->db->get('tb_proposal');
		}
		elseif (($rmk == "Semua RMK") and ($status != "Semua Status") and ($dosen == "Semua Dosen")) {
            $this->db->select('*');
			$this->db->where('status',$status);
			$query = $this->db->get('tb_proposal');
		}
		elseif (($rmk == "Semua RMK") and ($status != "Semua Status") and ($dosen != "Semua Dosen")) {
			$this->db->select('*');
			$this->db->where("(status = '$status') and ((pembimbing1_ta = '$dosen') or (pembimbing2_ta = '$dosen'))");
			$query = $this->db->get('tb_proposal');
		}
		elseif (($rmk == "Semua RMK") and ($status == "Semua Status") and ($dosen != "Semua Dosen")) {
			$this->db->select('*');
			$this->db->where("((pembimbing1_ta = '$dosen') or (pembimbing2_ta = '$dosen'))");
			$query = $this->db->get('tb_proposal');
		}
		else {
			$this->db->select('*');
			$this->db->where("(rmk = '$rmk') and (status = '$status') 
			and ((pembimbing1_ta = '$dosen') or (pembimbing2_ta = '$dosen'))");
			$query = $this->db->get('tb_proposal');
		}
	    return $query->result();
	}

	public function get_proposal_rmk($rmk)
	{
		$this->db->select('*');
		$this->db->where('rmk',$rmk);
	    $query = $this->db->get('tb_proposal');
	    return $query->result();

	}
	
	public function get_search_proposal($proposal)
	{
		$this->db->select('*');
		$this->db->where('id_proposal',$proposal);
		$res2 = $this->db->get('tb_proposal');
		return $res2;
	}

	public function get_search_judul($judul)
{
      $this->db->select('*');
      $this->db->where('id',$judul);
      $res2 = $this->db->get('tb_judul');
      return $res2;
}


	function getRows($params = array()){
        $this->db->select('proposal_ta');
        $this->db->from('tb_proposal');
		$this->db->where('id_proposal',$params['id']);
		//get records
		$query = $this->db->get();
		$result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        return $result;
	}

	function getRowsSidang($params = array()){
        $this->db->select('berkas');
        $this->db->from('tb_sidang');
		$this->db->where('id_ta',$params['id']);
		//get records
		$query = $this->db->get();
		$result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        return $result;
	}
}