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
						->where('delete_status', 'false')
						->order_by('id_pemeriksaan', 'desc')
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
		$data = array('delete_status' => 'true' );
		$this->db->where('id_pemeriksaan', $id)->update('tb_pemeriksaan', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}	

	public function get_transaction_note($id)
	{
		$query1 =  $this->db->select('nama_obat, harga_jual, harga_total, rincian_obat, jumlah, harga')
				->from('tb_transaksi')
				->join('tb_detail_transaksi', 'tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi')
				->join('tb_obat', 'tb_obat.id_obat = tb_detail_transaksi.id_obat')
				->where('id_pemeriksaan', $id)
				->get()
				->result();
		$query2 = $this->db->select('harga_total, waktu_transaksi')
						->from('tb_transaksi')
						->where('id_pemeriksaan', $id)
						->get()
						->row();
		$data = [$query1, $query2];
		return $data;
	}

	public function add_data_pemeriksaan_pasien($id)
	{
		$data = array(
			'hasil_pemeriksaan' => $this->input->post('hasil_pemeriksaan'),
			'diagnosis' => $this->input->post('diagnosis'),
			'terapi' => $this->input->post('terapi'),
			'tanggal_pemeriksaan' => date('Y-m-d'),
			'id_pasien' => $id,
			'status_transaksi' => 'belum',
			'delete_status' => 'false'
		);

		$this->db->insert('tb_pemeriksaan', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function edit_data_pemeriksaan_pasien($id)
	{
		$data = array(
			'hasil_pemeriksaan' => $this->input->post('hasil_pemeriksaan'),
			'diagnosis' => $this->input->post('diagnosis'),
			'terapi' => $this->input->post('terapi')
		);

		$this->db->where('id_pemeriksaan', $id)->update('tb_pemeriksaan', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file data_pemeriksaan_pasien_model.php */
/* Location: ./application/models/data_pemeriksaan_pasien_model.php */