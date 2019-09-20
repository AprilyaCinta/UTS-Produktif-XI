<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tarif_model','tarif');
		$this->load->model('login_user_model','l_user');
	}

	public function index()
	{
		$data['tarif']=$this->tarif->get_tarif();
		$this->load->view('v_login_user',$data);
	}

	public function proses()
	{
		$this->load->model('login_user_model','l_user');
		$login=$this->l_user->cek_user();
		if($login->num_rows()>0){
			$dt_user=$login->row();
			$data_user = array(
				'id_pelanggan' => $dt_user->id_pelanggan,
				'nama_pelanggan'=> $dt_user->nama_pelanggan,
				'username'=> $dt_user->username,
				'password'=>$dt_user->password,
				'login_user'=>true,
				'id_tarif'=>$dt_user->id_tarif
			);
			$this->session->set_userdata( $data_user );
			redirect('dashboard_user','refresh');
		} else {
			$this->session->set_flashdata('pesaneror', '<div class="alert alert-danger">Username dan password tidak cocok</div>');
			redirect('login_user','refresh');
		}

	}
	
	public function simpan()
	{	$this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required',
		array('required' => 'nama admin harus diisi'));
		$this->form_validation->set_rules('username', 'username', 'trim|required',
		array('required' => 'Username harus diisi'));
		$this->form_validation->set_rules('password', 'password', 'trim|required',
		array('required' => 'Password harus diisi'));
		$this->form_validation->set_rules('nomor_kwh', 'nomor_kwh', 'trim|required',
		array('required' => 'Nomor Kwh harus diisi'));
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required',
		array('required' => 'Alamat harus diisi'));
		
		if($this->l_user->is_nama_pelanggan_available($_POST["nama_pelanggan"]))
			{
				$this->session->set_flashdata('pesaneror', 'Nama sudah terdaftar');
				redirect('login_user','refresh');
			}
		elseif($this->l_user->is_username_available($_POST["username"]))
			{
				$this->session->set_flashdata('pesaneror', 'Username sudah terdaftar');
				redirect('login_user','refresh');
			}
		elseif($this->l_user->is_nomor_kwh_available($_POST["nomor_kwh"]))
			{
				$this->session->set_flashdata('pesaneror', 'Nomor Kwh sudah terdaftar');
				redirect('login_user','refresh');
			}
		else{
			$this->load->model('login_user_model','l_user');
			$cek_data=$this->l_user->tambah_user();
			if($cek_data){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Pendaftaran anda sukses</div>');
				redirect('login_user','refresh');
			} else {
				$this->session->set_flashdata('pesaneror', '<div class="alert alert-danger">Pendaftaran anda gagal</div>');
				redirect('login_user','refresh');
			}
		}
	}

}

/* End of file Login_user.php */
/* Location: ./application/controllers/Login_user.php */