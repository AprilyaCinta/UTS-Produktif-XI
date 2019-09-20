<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model {

	public function get_level()
	{
		return $this->db->get('level')->result();
	}

	 public function masuk_db()
	{
			$data_level=array(
				'nama_level'=>$this->input->post('nama_level'),
				'deskripsi'=>$this->input->post('deskripsi'),
			);
			$sql_masuk=$this->db->insert('level', $data_level);
			return $sql_masuk;	
	}

	public function detail_level($id_level)
	{
		return $this->db->where('id_level',$id_level)->get('level')->row();
	}

	public function update_level()
	{
		
		$dt_up_level=array(
			'nama_level'=>$this->input->post('nama_level'),
			'deskripsi'=>$this->input->post('deskripsi'),
		);
	return $this->db->where('id_level',$this->input->post('id_level'))->update('level', $dt_up_level);
	}
	
	public function is_nama_level_available($nama_level)
    {
    	$this->db->where('nama_level',$nama_level);
    	$query = $this->db->get('level');
    	if($query->num_rows()>0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    public function is_deskripsi_available($deskripsi)
    {
    	$this->db->where('deskripsi',$deskripsi);
    	$query = $this->db->get('level');
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

/* End of file Level_model.php */
/* Location: ./application/models/Level_model.php */