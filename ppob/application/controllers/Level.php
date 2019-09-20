<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login')!=true){
			redirect(base_url('index.php/login'),'refresh');
		}
		$this->load->model('level_model','level');
	}

	public function index()
	{
		$data['konten']="v_level";
		$data['data_level']=$this->level->get_level();
		$this->load->view('template', $data, FALSE);
	}

	public function get_detail_level($id_level='')
	{
		$this->load->model('level_model');
		$data_detail=$this->level_model->detail_level($id_level);
		echo json_encode($data_detail);
	}
	
	public function update_level()
	{
		$this->form_validation->set_rules('nama_level', 'nama level', 'trim|required',array("required"=>"Nama level harus diisi"));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required',
		array('required' => 'deskripsi harus diisi'));

		if($this->level->is_nama_level_available($_POST["nama_level"]))
			{
				$this->session->set_flashdata('pesaneror', 'Nama Level sudah terdaftar');
				redirect('level','refresh');
			}
		elseif($this->level->is_deskripsi_available($_POST["deskripsi"]))
			{
				$this->session->set_flashdata('pesaneror', 'Deskripsi sudah terdaftar');
				redirect('level','refresh');
			}
		else{
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('level','refresh');
			} else {
				$proses_update=$this->level_model->update_level();
				if($proses_update){
					$this->session->set_flashdata('pesan', 'sukses update');
				} else {
					$this->session->set_flashdata('pesaneror', 'gagal update');
				}
				redirect('level','refresh');
			}
		}
	}

}

/* End of file Level.php */
/* Location: ./application/controllers/Level.php */