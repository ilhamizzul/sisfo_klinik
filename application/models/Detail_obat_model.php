<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_obat_model extends CI_Model {

	public function get_stock_this_month($id_obat)
	{
		return $this->db->select('stok_masuk, stok_keluar, sisa_stok')
						->where('id_obat', $id_obat)
						->where("DATE_FORMAT(bulan,'%Y-%m')", date('Y-m'))
						->get('tb_stok_obat')
						->row();
	}

	public function get_stock_by_year($id_obat)
	{
		return $this->db->select('DATE_FORMAT(bulan, "%Y") as tahun, id_obat')
						->from('tb_stok_obat')
						->group_by('DATE_FORMAT(bulan,'.'"%Y"'.')')
						->where('id_obat', $id_obat)
						->get()
						->result();
	}

	public function get_data_for_graph($id_obat, $tahun)
	{
		return $this->db->select('stok_masuk, stok_keluar, sisa_stok, DATE_FORMAT(bulan, "%M") as bulan')
		// return $this->db->select('stok_masuk, stok_keluar, sisa_stok, bulan')
						->where('id_obat', $id_obat)
						->where('DATE_FORMAT(bulan,'.'"%Y"'.')', $tahun)
						->group_by('DATE_FORMAT(bulan,'.'"%M"'.')')
						->order_by("bulan", 'desc')
						->get('tb_stok_obat')
						->result();
	}

}

/* End of file detail_obat_model.php */
/* Location: ./application/controllers/detail_obat_model.php */