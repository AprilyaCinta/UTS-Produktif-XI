<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
			
		if($this->session->userdata('login')!=true){
			redirect(base_url('index.php/login'),'refresh');
		}
		$this->load->model('dashboard_model','dashboard');

	}

	public function index()
	{
		$data['konten']="home";
		$data['tagihanl'] = $this->dashboard->get_tagihanl();
		$data['tagihant'] = $this->dashboard->get_tagihant();
		$data['totaltagihan'] = $this->dashboard->get_totaltagihan();
		$data['totalpelanggan'] = $this->dashboard->get_totalpelanggan();
		$data['totaladmin'] = $this->dashboard->get_totaladmin();
		$data['totalmanager'] = $this->dashboard->get_totalmanager();
		$this->load->view('template',$data);
	}
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */