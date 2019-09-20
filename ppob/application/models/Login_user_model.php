<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user_model extends CI_Model {

	public function cek_user()
	{
		return $this->db->where('username',$this->input->post('username'))
						->where('password',sha1($this->input->post('password')))
						->get('pelanggan');
	}
    public function detail_nama()
    {
        return $this->db
                        ->where('nama_pelanggan',$this->input->post('nama_pelanggan'))
                        ->get('pelanggan')->row();
    }
    public function detail_username()
    {
        return $this->db
                        ->where('username',$this->input->post('username'))
                        ->get('pelanggan')->row();
    }
    public function detail_nomor_kwh()
    {
        return $this->db
                        ->where('nomor_kwh',$this->input->post('nomor_kwh'))
                        ->get('pelanggan')->row();
    }

	public function tambah_user()
	{
		$object=array(
			'nama_pelanggan'=>$this->input->post('nama_pelanggan'),
			'alamat'=>$this->input->post('alamat'),
			'nomor_kwh'=>$this->input->post('nomor_kwh'),
			'username'=>$this->input->post('username'),
			'password'=>sha1($this->input->post('password')),
			'id_tarif'=>$this->input->post('id_tarif')
		);
		return $this->db->insert('pelanggan', $object);
	}
	public function is_nama_pelanggan_available($nama_pelanggan)
    {
    	$this->db->where('nama_pelanggan',$nama_pelanggan);
    	$query = $this->db->get('pelanggan');
    	if($query->num_rows()>0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    public function is_username_available($username)
    {
    	$this->db->where('username',$username);
    	$query = $this->db->get('pelanggan');
    	if($query->num_rows()>0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    public function is_nomor_kwh_available($nomor_kwh)
    {
    	$this->db->where('nomor_kwh',$nomor_kwh);
    	$query = $this->db->get('pelanggan');
    	if($query->num_rows()>0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
}

/* End of file Login_user_model.php */
/* Location: ./application/models/Login_user_model.php */