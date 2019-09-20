<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		$this->session->sess_destroy();
		redirect('login_user','refresh');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */