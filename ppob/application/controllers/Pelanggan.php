<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login')!=true){
			redirect(base_url('index.php/login'),'refresh');
		}
		$this->load->model('Login_user_model','l_user');
		$this->load->model('pelanggan_model');
	}

	public function index()
	{
		$data['konten']="v_pelanggan";
		$this->load->model('pelanggan_model','pelanggan');
		$data['data_pelanggan']=$this->pelanggan->get_pelanggan();
		$this->load->model('tarif_model','tarif');
		$data['data_tarif']=$this->tarif->get_tarif();
		$this->load->view('template', $data, FALSE);
	}

	public function simpan_pelanggan()
	{
		$this->form_validation->set_rules('nama_pelanggan', 'Nama pelanggan', 'trim|required',
		array('required' => 'nama pelanggan harus diisi'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required',
		array('required' => 'Username harus diisi'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
		array('required' => 'Password harus diisi'));
		$this->form_validation->set_rules('id_tarif', 'Nama tarif', 'trim|required',
		array('required' => 'Nama tarif harus diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',
		array('required' => 'Alamat harus diisi'));
		$this->form_validation->set_rules('nomor_kwh', 'Nomor KWH', 'trim|required',
		array('required' => 'Nomor KWH harus diisi'));

		if($this->l_user->is_nama_pelanggan_available($_POST["nama_pelanggan"]))
			{
				$this->session->set_flashdata('pesaneror', 'Nama sudah terdaftar');
				redirect('pelanggan','refresh');
			}
		elseif($this->l_user->is_username_available($_POST["username"]))
			{
				$this->session->set_flashdata('pesaneror', 'Username sudah terdaftar');
				redirect('pelanggan','refresh');
			}
		elseif($this->l_user->is_nomor_kwh_available($_POST["nomor_kwh"]))
			{
				$this->session->set_flashdata('pesaneror', 'Nomor Kwh sudah terdaftar');
				redirect('pelanggan','refresh');
			}
		else{
			if ($this->form_validation->run() == TRUE) {
				$this->load->model('pelanggan_model','pelanggan');
				$masuk=$this->pelanggan->masuk_db();
				if($masuk==true){
					$this->session->set_flashdata('pesan', 'sukses masuk');
				} else {
					$this->session->set_flashdata('pesaneror', 'gagal masuk');
				}
				redirect('pelanggan','refresh');
			} else {
				$this->session->set_flashdata('pesaneror', validation_errors());
				redirect('pelanggan','refresh');

			}
		}
	}

	public function get_detail_pelanggan($id_pelanggan='')
	{
		$this->load->model('pelanggan_model');
		$data_detail=$this->pelanggan_model->detail_pelanggan($id_pelanggan);
		echo json_encode($data_detail);
	}

	public function update_pelanggan()
	{
		$this->form_validation->set_rules('nama_pelanggan', 'Nama pelanggan', 'trim|required',
		array('required' => 'nama pelanggan harus diisi'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required',
		array('required' => 'Username harus diisi'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
		array('required' => 'Password harus diisi'));
		$this->form_validation->set_rules('id_tarif', 'Nama tarif', 'trim|required',
		array('required' => 'Nama tarif harus diisi'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',
		array('required' => 'Alamat harus diisi'));
		$this->form_validation->set_rules('nomor_kwh', 'Nomor KWH', 'trim|required',
		array('required' => 'Nomor KWH harus diisi'));

		if($this->l_user->is_nama_pelanggan_available($_POST["nama_pelanggan"])!=$this->l_user->detail_nama())
			{
				$this->session->set_flashdata('pesaneror', 'Nama sudah terdaftar');
				redirect('pelanggan','refresh');
			}
		elseif($this->l_user->is_username_available($_POST["username"])!=$this->l_user->detail_username())
			{
				$this->session->set_flashdata('pesaneror', 'Username sudah terdaftar');
				redirect('pelanggan','refresh');
			}
		elseif($this->l_user->is_nomor_kwh_available($_POST["nomor_kwh"])!=$this->l_user->detail_nomor_kwh())
			{
				$this->session->set_flashdata('pesaneror', 'Nomor Kwh sudah terdaftar');
				redirect('pelanggan','refresh');
			}
		elseif($this->input->post('password')==null){
			$this->session->set_flashdata('pesaneror', 'test password kosong');
				redirect('pelanggan','refresh');
		}

		else{
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesaneror', validation_errors());
				redirect('pelanggan','refresh');
			} else {
				$this->load->model('pelanggan_model');
				$proses_update=$this->pelanggan_model->update_pelanggan();
				if($proses_update){
					$this->session->set_flashdata('pesan', 'sukses update');
				} else {
					$this->session->set_flashdata('pesaneror', 'gagal update');
				}
				redirect('pelanggan','refresh');
			}
		}
	}
	public function hapus_pelanggan($id_pelanggan='')
	{
		$this->load->model('pelanggan_model','pelanggan');
		$hapus=$this->pelanggan->hapus_pelanggan($id_pelanggan);
		if($hapus){
			$this->session->set_flashdata('pesan', 'sukses hapus data');
			} else {
				$this->session->set_flashdata('pesaneror', 'gagal hapus data');
			}
			redirect('pelanggan','refresh');
	}

}

/* End of file pelanggan.php */
/* Location: ./application/controllers/pelanggan.php */