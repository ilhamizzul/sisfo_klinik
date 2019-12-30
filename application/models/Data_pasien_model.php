<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pasien_model extends CI_Model {

	public function get_data_pasien()
	{
		return $this->db->where('delete_status', 'false')->get('tb_pasien')->result();
	}

	public function get_data_pasien_by_id($id)
	{
		return $this->db->where('id_pasien', $id)->get('tb_pasien')->row();
	}

	public function add_data_pasien()
	{
		$data = array(
			'nama_pasien' => $this->input->post('nama_pasien'), 
			'alamat' => $this->input->post('alamat'),
			'nomor_telepon' => $this->input->post('nomor_telepon'), 
			'tempat_lahir' => $this->input->post('tempat_lahir'), 
			'tanggal_lahir' => $this->input->post('tanggal_lahir'), 
			'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga'),
			'delete_status' => 'false'
		);

		$this->db->insert('tb_pasien', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_data_pasien($id)
	{
		$data = array(
			'nama_pasien' => $this->input->post('nama_pasien'), 
			'alamat' => $this->input->post('alamat'), 
			'nomor_telepon' => $this->input->post('nomor_telepon'), 
			'tempat_lahir' => $this->input->post('tempat_lahir'), 
			'tanggal_lahir' => $this->input->post('tanggal_lahir'), 
			'nama_kepala_keluarga' => $this->input->post('nama_kepala_keluarga') 
		);

		$this->db->where('id_pasien', $id)->update('tb_pasien', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function delete_data_pasien($id)
	{
		$data = array('delete_status' => 'true' );

		$this->db->where('id_pasien', $id)->update('tb_pasien', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

/* End of file data_pasien_model.php */
/* Location: ./application/models/data_pasien_model.php */