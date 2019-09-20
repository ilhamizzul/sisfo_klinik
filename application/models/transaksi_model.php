<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function search_obat($query)
	{
		$this->db->select('tb_obat.id_obat, nama_obat, harga_jual, sisa_stok')
				->from('tb_obat')
				->join('tb_stok_obat', 'tb_stok_obat.id_obat = tb_obat.id_obat')
				->where("DATE_FORMAT(bulan,'%Y-%m')", date("Y-m"));
		if ($query != '') {
			$this->db->like('tb_obat.id_obat', $query)
					->or_like('nama_obat', $query)
					->where("DATE_FORMAT(bulan,'%Y-%m')", date("Y-m"));
		}
		return $this->db->get();
	}

	public function check_item($id_obat)
	{
		return $this->db->select('tb_obat.id_obat, nama_obat, harga_jual, sisa_stok')
						->from('tb_obat')
						->join('tb_stok_obat', 'tb_stok_obat.id_obat = tb_obat.id_obat')
						->where("DATE_FORMAT(bulan,'%Y-%m')", date("Y-m"))
						->where('tb_obat.id_obat', $id_obat)
						->get()
						->row();
	}

}

/* End of file transaksi_model.php */
/* Location: ./application/models/transaksi_model.php */