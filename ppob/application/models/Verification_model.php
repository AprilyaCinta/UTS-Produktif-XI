<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verification_model extends CI_Model {

	public function get_pembayaran()
	{
		return $this->db->select('*,pembayaran.status as status_bayar')
				->join('tagihan','tagihan.id_tagihan=pembayaran.id_tagihan')
				->join('penggunaan','penggunaan.id_penggunaan=tagihan.id_penggunaan')
				->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
				->order_by('id_pembayaran','desc')
				->where('pembayaran.status','pending')
				->get('pembayaran')->result();
	}
	public function get_verification($id_pembayaran,$id_tagihan,$status)
	{
		$data_bayar=array(
			'status'=>$status,
			'id_admin'=>$this->session->userdata('id_admin')
		);
		$veri=$this->db->where('id_pembayaran',$id_pembayaran)
				->update('pembayaran',$data_bayar);
		if($veri){
			$data_tagihan=array(
			'status'=>$status
		);
			return $this->db->where('id_tagihan',$id_tagihan)
				->update('tagihan',$data_tagihan);
		}
	}
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