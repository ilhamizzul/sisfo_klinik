<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_obat_model extends CI_Model {

	public function get_data_obat()
	{
		return $query = $this->db->select('tb_obat.id_obat, nama_obat, harga_jual, harga_beli, sisa_stok')
						->join('tb_stok_obat', 'tb_stok_obat.id_obat = tb_obat.id_obat')
						->where("DATE_FORMAT(bulan,'%Y-%m')", date('Y-m'))
						->where('delete_status', 'false')
						->get('tb_obat')
						->result();
		// if ($query->num_rows() > 0) {
		// 	return $query;
		// } else {
		// 	$this->recap_stock_obat();
		// 	return $query;
		// 	// return 'gaada';
		// }
	}	

	public function recap_stock_obat()
	{
		$id_obat = $this->db->select('id_obat')
							->from('tb_obat')
							->where('id_obat !=', '')
							->get()->result();	
		$total_obat = $this->db->select('count(id_obat) as total_obat')
								->from('tb_obat')
								->where('id_obat !=', '')
								->get()->row();	
		$i = 0;
		foreach ($id_obat as $data) {
			$stock = $this->get_last_month_stok_obat_by_id($id_obat[$i]->id_obat);
			$recap = array(
				'id_obat' 		=> $id_obat[$i]->id_obat,
				'bulan' 		=> date('Y-m-d'), 
				'stok_masuk' 	=> '0', 
				'sisa_stok'		=> $stock->sisa_stok, 
				'stok_keluar' 	=> '0'  
			);
			$this->db->insert('tb_stok_obat', $recap);
			$i++;	
		}
		return TRUE;
		
	}

	
	public function get_last_month_stok_obat_by_id($id_obat)
	{
		return $this->db->select('stok_masuk, sisa_stok, bulan')
						->where('id_obat', $id_obat)
						->where("DATE_FORMAT(bulan,'%Y-%m')", date('Y-m', strtotime('-1 month')))
						->get('tb_stok_obat')
						->row();
	}

	public function get_data_obat_by_id($id_obat)
	{
		return $this->db->select('*')
						->join('tb_stok_obat', 'tb_stok_obat.id_obat = tb_obat.id_obat')
						->where('tb_obat.id_obat', $id_obat)
						->where("DATE_FORMAT(bulan,'%Y-%m')", date('Y-m'))
						->get('tb_obat')
						->row();
	}

	public function get_stok_obat_by_date($id_obat)
	{
		return $this->db->select('stok_masuk, sisa_stok, bulan')
						->where('id_obat', $id_obat)
						->where("DATE_FORMAT(bulan,'%Y-%m')", date('Y-m'))
						->get('tb_stok_obat')
						->row();
	}


	public function tambah_data_obat()
	{
		$data = array(
			'id_obat' 		=> $this->input->post('kode_obat'), 
			'nama_obat' 	=> $this->input->post('nama_obat'), 
			'harga_jual' 	=> $this->input->post('harga_jual'), 
			'harga_beli' 	=> $this->input->post('harga_beli'),
			'delete_status' => 'false'
		);

		$this->db->insert('tb_obat', $data);

		$data2 = array(
			'id_obat' 		=> $this->input->post('kode_obat'), 
			'bulan' 		=> date('Y-m-d'),
			'sisa_stok'		=> '0', 
			'stok_masuk' 	=> '0', 
			'stok_keluar' 	=> '0'  
		);

		$this->db->insert('tb_stok_obat', $data2);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}

	public function edit_data_obat($id_obat)
	{
		$data = array(
			'nama_obat' => $this->input->post('nama_obat'), 
			'harga_jual' => $this->input->post('harga_jual'), 
			'harga_beli' => $this->input->post('harga_beli')
		);

		$this->db->where('id_obat', $id_obat)->update('tb_obat', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function tambah_stok_obat($stock, $id_obat, $data_stock)
	{	
		//HISTORI TAMBAH STOK
		if ($this->get_stok_obat_by_date($id_obat) != NULL) {
			$data_stock = array(
				'stok_masuk' 	=> $data_stock->stok_masuk + $this->input->post('stok_masuk'), 
				'sisa_stok'		=> $data_stock->sisa_stok + $this->input->post('stok_masuk'),
				'bulan' 		=> date('Y-m-d'), 
			);

			$this->db->where('id_obat', $id_obat)
					->where("DATE_FORMAT(bulan,'%Y-%m')", date('Y-m'))
					->update('tb_stok_obat', $data_stock);
		} 
		// else {
		// 	$data_stock = array(
		// 		'id_obat' 		=> $id_obat, 
		// 		'bulan' 		=> date('Y-m-d'), 
		// 		'stok_masuk' 	=> $this->input->post('stok_masuk'), 
		// 		'sisa_stok'		=> $this->input->post('stok_masuk'), 
		// 		'stok_keluar' 	=> '0'  
		// 	);

		// 	$this->db->insert('tb_stok_obat', $data_stock);
		// }
		//END

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}

	public function delete_obat($id_obat)
	{
		$data = array(
			'delete_status' => 'true', 
		);

		$this->db->where('id_obat', $id_obat)->update('tb_obat', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file data_obat_model.php */
/* Location: ./application/models/data_obat_model.php */