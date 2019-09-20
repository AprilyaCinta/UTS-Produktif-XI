<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	
	public function get_tagihanl()
	{
		return $this->db->select('count(*) as tagihanl') 
						->where('status','lunas')
						->get('pembayaran')
						->row();
	}
 
	public function get_tagihant()
	{	return $this->db->select('count(*) as tagihant') 
						->where('status','ditolak')
						->get('pembayaran')
						->row();
	}
	
	public function get_totaltagihan()
	{
		return $this->db->select('count(*) as totaltagihan') 
						->get('pembayaran')
						->row();
	}

	public function get_totalpelanggan()
	{
		return $this->db->select('count(*) as totalpelanggan') 
						->get('pelanggan')
						->row();
	}
	public function get_totaladmin()
	{
		return $this->db->select('count(*) as totaladmin')
						->where('id_level','2')
						->get('admin')
						->row();
	}
	public function get_totalmanager()
	{
		return $this->db->select('count(*) as totalmanager') 
						->where('id_level','1')
						->get('admin')
						->row();
	}
}

/* End of file Verification_model.php */
/* Location: ./application/models/Verification_model.php */