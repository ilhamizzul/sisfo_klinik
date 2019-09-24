<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pemeriksaan_pasien_model extends CI_Model {

	public function get_data_pemeriksaan_pasien($id_pasien)
	{
		// return $this->db->select('nama_pasien, id_pemeriksaan, tanggal_pemeriksaan, hasil_pemeriksaan, diagnosis, terapi')
		// 			->from('tb_pemeriksaan')
		// 			->where('tb_pemeriksaan.id_pasien', $id)
		// 			->join('tb_pasien', 'tb_pasien.id_pasien = tb_pemeriksaan.id_pasien')
		// 			->get()
		// 			->result();
		return $this->db->where('id_pasien', $id_pasien)
						->get('tb_pemeriksaan')
						->result();
	}

	public function get_data_pemeriksaan_pasien_by_id($id)
	{
		return $this->db->where('id_pemeriksaan', $id)
						->get('tb_pemeriksaan')
						->row();
	}

	public function delete_data_pemeriksaan_pasien($id)
	{
		$this->db->where('id_pemeriksaan', $id)->delete('tb_pemeriksaan');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}	

	public function add_data_pemeriksaan_pasien($id)
	{
		$data = array(
			'hasil_pemeriksaan' => $this->input->post('hasil_pemeriksaan'),
			'diagnosis' => $this->input->post('diagnosis'),
			'terapi' => $this->input->post('terapi'),
			'tanggal_pemeriksaan' => date('Y-m-d'),
			'id_pasien' => $id
		);

		$this->db->insert('tb_pemeriksaan', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file data_pemeriksaan_pasien_model.php */
/* Location: ./application/models/data_pemeriksaan_pasien_model.php */