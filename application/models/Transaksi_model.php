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

	public function get_id_transaksi_by_id_pemeriksaan($id_pemeriksaan)
	{
		return $this->db->select('id_transaksi')
						->from('tb_transaksi')
						->where('id_pemeriksaan', $id_pemeriksaan)
						->get()
						->row();
	}

	public function get_stock_obat_by_id($id_obat)
	{
		return $this->db->select('stok_keluar, sisa_stok')
						->from('tb_stok_obat')
						->where('id_obat', $id_obat)
						->where("DATE_FORMAT(bulan,'%Y-%m')", date("Y-m"))
						->get()
						->row();
	}

	public function add_transaksi($id_pemeriksaan, $harga_total, $datatable)
	{
		$data_header = array(
			'harga_total' => $harga_total, 
			'id_pemeriksaan' => $id_pemeriksaan
		);

		$this->db->insert('tb_transaksi', $data_header);
		if ($this->db->affected_rows() > 0) {

			$id_transaksi = $this->get_id_transaksi_by_id_pemeriksaan($id_pemeriksaan);
			for ($i=0; $i<count($datatable); $i++) {
				$data_detail = array(
					'rincian_obat'	=> $datatable[$i]['rincian_obat'],
					'jumlah'		=> $datatable[$i]['jumlah'],
					'harga'			=> $datatable[$i]['harga'],
					'id_transaksi' 	=> $id_transaksi->id_transaksi,
					'id_obat'		=> $datatable[$i]['id_obat']
				);
				$this->db->insert('tb_detail_transaksi', $data_detail);
			}

			if ($this->db->affected_rows() > 0) {
				$data_status = array('status_transaksi' => 'sudah' );
				$this->db->where('id_pemeriksaan', $id_pemeriksaan)->update('tb_pemeriksaan', $data_status);

				if ($this->db->affected_rows() > 0) {
					for ($i=0; $i<count($datatable); $i++) {
						$stock = $this->get_stock_obat_by_id($datatable[$i]['id_obat']);
						$data_stock = array(
							'stok_keluar' => $stock->stok_keluar + $datatable[$i]['jumlah'],
							'sisa_stok' => $stock->sisa_stok - $datatable[$i]['jumlah'] 
						);
						$this->db->where('id_obat', $datatable[$i]['id_obat'])->update('tb_stok_obat', $data_stock);
					}

					if ($this->db->affected_rows() > 0) {
						return TRUE;
					} else {
						return FALSE;
					}
					
				} else {
					return FALSE;
				}
				
			} else {
				return FALSE;
			}
			
		} else {
			return FALSE;
		}
		
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