<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function index()
	{
		$this->load->view('lihat');
	}

	public function detail($id)
	{

		$this->load->model('MFlipbooks');
		$data['flipbook'] = $this->MFlipbooks->get_pdf($id);
		$this->load->view('lihat',$data);
		// echo json_encode($data);
	}

	public function cek()
	{
		echo base_url();
	}
}

/* End of file Front.php */
/* Location: ./application/controllers/Front.php */ 