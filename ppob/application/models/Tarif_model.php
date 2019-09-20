<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif_model extends CI_Model {

	public function get_tarif()
	{
		return $this->db->get('tarif')->result();
	}

	 public function masuk_db()
	{
		
			$data_tarif=array(
				'daya'=>$this->input->post('daya'),
				'tarifperkwh'=>$this->input->post('tarifperkwh'),
			);
			$sql_masuk=$this->db->insert('tarif', $data_tarif);
			return $sql_masuk;	
	}

	public function detail_tarif($id_tarif)
	{
		return $this->db->where('id_tarif',$id_tarif)->get('tarif')->row();
	}
	
	public function update_tarif()
	{
		
		$dt_up_tarif=array(
				'daya'=>$this->input->post('daya'),
				'tarifperkwh'=>$this->input->post('tarifperkwh'),
		);
	return $this->db->where('id_tarif',$this->input->post('id_tarif'))->update('tarif', $dt_up_tarif);
	}
	public function hapus_tarif($id_tarif)
	{
		return $this->db->where('id_tarif',$id_tarif)->delete('tarif');
	}
	public function is_daya_available($daya)
    {
    	$this->db->where('daya',$daya);
    	$query = $this->db->get('tarif');
    	if($query->num_rows()>0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    public function is_tarif_available($tarifperkwh)
    {
    	$this->db->where('tarifperkwh',$tarifperkwh);
    	$query = $this->db->get('tarif');
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

/* End of file tarif_model.php */
/* Location: ./application/models/tarif_model.php */