<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('MFlipbooks');

	}
	public function index()
	{
		$data2['flipbook'] = $this->MFlipbooks->get_all_pdf();

		$data['content'] = $this->load->view('admin/pages/datapdf',$data2,true);
		$this->load->view('admin/default',$data);
	}

	public function detail($id)
	{

		$this->load->model('MFlipbooks');
		$data['flipbook'] = $this->MFlipbooks->get_pdf($id);
		$this->load->view('lihat',$data);
		// echo json_encode($data);
	}

	public function save_pdf()
	{
		$data['title'] = $this->input->post('title');
		$new_name = 'pdf'.time();

		$nama_file = $_FILES["pdf"]['name'];
		$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
		$nama_upload = $new_name.".".$ext;

		$data['files']=$nama_upload;
		
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5000;
		$config['file_name']             = $new_name;


		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('pdf')){
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('alert','gagal');
			// redirect('guru/indonesia_apetizer');
			// redirect($_SERVER['HTTP_REFERER']);

			echo json_encode($error);
		}else{

			$this->MFlipbooks->tambah_data('book',$data);
			$this->session->set_flashdata('alert','berhasil');
			// redirect('mitra');
			redirect($_SERVER['HTTP_REFERER']);

		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */ 