<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function count_pasien()
	{
		return $this->db->count_all_results('tb_pasien');
	}	

	public function count_pemeriksaan_hari()
	{
		return $this->db->where('tanggal_pemeriksaan', date('Y-m-d'))->count_all_results('tb_pemeriksaan');
	}

	public function count_pemeriksaan_bulan()
	{
		return $this->db->where("DATE_FORMAT(tanggal_pemeriksaan,'%Y-%m')", date('Y-m'))
						->count_all_results('tb_pemeriksaan');	
	}

	public function graf_pemeriksaan()
	{
		// return $this->db->where(month('tanggal_pemeriksaan'), month(now()))->count_all_results('tb_pemeriksaan');	
		return $this->db->select('DATE_FORMAT(tanggal_pemeriksaan,'.'"%d"'.') as tanggal, COUNT(id_pemeriksaan) as total')
						->where("DATE_FORMAT(tanggal_pemeriksaan,'%Y-%m')", date('Y-m'))
						->group_by('tanggal_pemeriksaan')
						->get('tb_pemeriksaan')
						->result();
	}

}

/* End of file dashboard_model.php */
/* Location: ./application/models/dashboard_model.php */