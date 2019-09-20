<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login')!=true){
			redirect(base_url('index.php/login'),'refresh');
		}
		$this->load->model('admin_model','admin');
		$this->load->model('level_model','level');
	}

	public function index()
	{
		$data['konten']="v_admin";
		$data['data_admin']=$this->admin->get_admin();
		$data['data_level']=$this->level->get_level();
		$this->load->view('template', $data, FALSE);
	}

	public function simpan_admin()
	{
		$this->form_validation->set_rules('nama_admin', 'Nama admin', 'trim|required',
		array('required' => 'nama admin harus diisi'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required',
		array('required' => 'Username harus diisi'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
		array('required' => 'Password harus diisi'));
		$this->form_validation->set_rules('id_level', 'Nama Level', 'trim|required',
		array('required' => 'Nama level harus diisi'));

		if($this->admin->is_nama_admin_available($_POST["nama_admin"]))
			{
				$this->session->set_flashdata('pesaneror', 'Nama sudah terdaftar');
				redirect('admin','refresh');
			}
			elseif($this->admin->is_username_available($_POST["username"]))
			{
				$this->session->set_flashdata('pesaneror', 'Username sudah terdaftar');
				redirect('admin','refresh');
			}
			else{
				if ($this->admin->masuk_db()) {
					$this->session->set_flashdata('pesan', 'Sukses Tambah Akun');
					redirect('admin','refresh');
				} else{
					$this->session->set_flashdata('pesaneror', 'Gagal Tambah Akun');
					redirect('admin','refresh');
				}
			}
	}

	public function get_detail_admin($id_admin='')
	{
		$this->load->model('admin_model');
		$data_detail=$this->admin_model->detail_admin($id_admin);
		echo json_encode($data_detail);
	}

	public function update_admin()
	{	
		$this->form_validation->set_rules('nama_admin', 'nama admin', 'trim|required|callback_CheckNama',
			array("required"=>"Nama level harus diisi"));
		if($this->admin->is_nama_admin_available($_POST["nama_admin"]))
			{
				$this->session->set_flashdata('pesaneror', 'Nama sudah terdaftar');
				redirect('admin','refresh');
			}
		else{
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesaneror', validation_errors());
				redirect(base_url('index.php/admin'),'refresh');
			} else {
				$proses_update=$this->admin_model->update_admin();
				if($proses_update){
					$this->session->set_flashdata('pesan', 'sukses update');
				} else {
					$this->session->set_flashdata('pesaneror', 'gagal update');
				}
				redirect('admin','refresh');
			}
		}
	}

	public function hapus_admin($id_admin='')
	{
		$this->load->model('admin_model','admin');
		$hapus=$this->admin->hapus_admin($id_admin);
		if($hapus){
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');
			} else {
				$this->session->set_flashdata('pesaneror', 'Gagal Hapus Data');
			}
			redirect('admin','refresh');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */