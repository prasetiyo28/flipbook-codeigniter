<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('MFlipbooks');

	}

	public function index()
	{
		$data2['flipbook'] = $this->MFlipbooks->get_all_pdf();
		$data['content'] = $this->load->view('front/pages/datapdf',$data2,true);
		$this->load->view('front/default',$data);
	}

	public function detail($id)
	{

		$this->load->model('MFlipbooks');
		$data['flipbook'] = $this->MFlipbooks->get_pdf($id);
		$this->load->view('lihat',$data);
		// echo json_encode($data);
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($username == 'admin' && $password == 'admin') {
			$data['username'] = $username;
			$this->session->set_userdata($data);
			redirect('Admin');
		}else{
			$this->session->set_flashdata('gagal','Username atau Password salah');
			redirect('Front');
			// echo 'window.alert("Username atau password salah")';
		}
	}

	public function cek()
	{
		echo base_url();
	}
}

/* End of file Front.php */
/* Location: ./application/controllers/Front.php */ 