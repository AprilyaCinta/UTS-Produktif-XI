<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login')!=true){
			redirect(base_url('index.php/login'),'refresh');
		}
		$this->load->model('tarif_model','tarif');
	}

	public function index()
	{
		$data['konten']="v_tarif";
		$data['data_tarif']=$this->tarif->get_tarif();
		$this->load->view('template', $data, FALSE);
	}

	public function simpan_tarif(){	
		$this->form_validation->set_rules('daya', 'Daya', 'trim|required',
			array('required' => 'Daya harus diisi'));
		$this->form_validation->set_rules('tarifperkwh', 'Tarifperkwh', 'trim|required',
			array('required' => 'Tarif harus diisi'));

		if($this->tarif->is_daya_available($_POST["daya"]))
			{
				$this->session->set_flashdata('pesaneror', 'Daya sudah terdaftar');
				redirect('tarif','refresh');
			}
		elseif($this->tarif->is_tarifperkwh_available($_POST["tarifperkwh"]))
			{
				$this->session->set_flashdata('pesaneror', 'Tarif sudah terdaftar');
				redirect('tarif','refresh');
			}
		else{
			if ($this->form_validation->run() == TRUE) {
				$this->load->model('tarif_model','tarif');
				$masuk=$this->tarif->masuk_db();
				if($masuk==true){
					$this->session->set_flashdata('pesan', 'sukses masuk');
				} else {
					$this->session->set_flashdata('pesaneror', 'gagal masuk');
				}
				redirect(base_url('index.php/tarif'),'refresh');
			} else {
				$this->session->set_flashdata('pesaneror', '<div class="alert alert-danger">'.validation_errors().'</div>');
				redirect(base_url('index.php/tarif'),'refresh');

			}
		}
	}

	public function get_detail_tarif($id_tarif='')
	{
		$this->load->model('tarif_model');
		$data_detail=$this->tarif_model->detail_tarif($id_tarif);
		echo json_encode($data_detail);
	}

	public function update_tarif()
	{
		$this->form_validation->set_rules('daya', 'Daya', 'trim|required',array("required"=>"Daya harus diisi"));
		$this->form_validation->set_rules('tarifperkwh', 'Tarifperkwh', 'trim|required',array("required"=>"Tarif perkwh harus diisi"));
		if($this->tarif->is_daya_available($_POST["daya"]))
			{
				$this->session->set_flashdata('pesaneror', 'Daya sudah terdaftar');
				redirect('tarif','refresh');
			}
		elseif($this->tarif->is_tarifperkwh_available($_POST["tarifperkwh"]))
			{
				$this->session->set_flashdata('pesaneror', 'Tarif sudah terdaftar');
				redirect('tarif','refresh');
			}
		else{
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesaneror', ''.validation_errors().'');
				redirect(base_url('index.php/tarif'),'refresh');
			} else {
				$this->load->model('tarif_model');
				$proses_update=$this->tarif_model->update_tarif();
				if($proses_update){
					$this->session->set_flashdata('pesan', 'sukses update');
				} else {
					$this->session->set_flashdata('pesaneror', 'gagal update');
				}
				redirect(base_url('index.php/tarif'),'refresh');
			}
		}
	}
	
	public function hapus_tarif($id_tarif='')
	{
		$this->load->model('tarif_model','tarif');
		$hapus=$this->tarif->hapus_tarif($id_tarif);
		if($hapus){
			$this->session->set_flashdata('pesan', 'sukses hapus data');
			} else {
				$this->session->set_flashdata('pesan', 'gagal hapus data');
			}
			redirect(base_url('index.php/tarif'),'refresh');
	}

}

/* End of file tarif.php */
/* Location: ./application/controllers/tarif.php */