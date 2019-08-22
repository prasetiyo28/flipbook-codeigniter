<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MFlipbooks extends CI_Model {

	function tambah_data($table,$data){
		$this->db->insert($table,$data);
	}
	public function get_pdf($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('book');
		return $query->row();

	}

	public function get_all_pdf()
	{


		$query = $this->db->get('book');
		return $query->result();

	}

	function delete_pdf($id){
		$this->db->where('id',$id);
		$this->db->delete('book');
	}


}

/* End of file MFlipbooks.php */
/* Location: ./application/models/MFlipbooks.php */ 