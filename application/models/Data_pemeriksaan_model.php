<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pemeriksaan_model extends CI_Model {

	public function get_pemeriksaan_by_year()
	{
		return  $this->db->select('DATE_FORMAT(tanggal_pemeriksaan,'.'"%Y"'.') as tahun')
						->group_by('DATE_FORMAT(tanggal_pemeriksaan,'.'"%Y"'.')')
						->order_by('tahun', 'desc')
						->get('tb_pemeriksaan')
						->result();
	}

	public function get_pemeriksaan_by_month()
	{
		return  $this->db->select('DATE_FORMAT(tanggal_pemeriksaan,'.'"%M"'.') as bulan')
						->where("DATE_FORMAT(tanggal_pemeriksaan,'%Y')", $this->uri->segment(3))
						->group_by('DATE_FORMAT(tanggal_pemeriksaan,'.'"%M"'.')')
						->order_by('bulan', 'desc')
						->get('tb_pemeriksaan')
						->result();
	}	

	public function get_pemeriksaan_by_day()
	{
		return  $this->db->select('DATE_FORMAT(tanggal_pemeriksaan,'.'"%d"'.') as hari')
						->where("DATE_FORMAT(tanggal_pemeriksaan,'%Y')", $this->uri->segment(3))
						->where("DATE_FORMAT(tanggal_pemeriksaan,'%M')", $this->uri->segment(4))
						->group_by('DATE_FORMAT(tanggal_pemeriksaan,'.'"%d"'.')')
						->order_by('hari', 'asc')
						->get('tb_pemeriksaan')
						->result();
	}	

	public function get_data_pemeriksaan_by_day($year, $month, $day)
	{
		$date = $month.' '.$day.' '.$year;
		return $this->db->select('nama_pasien, tanggal_pemeriksaan, hasil_pemeriksaan, diagnosis, terapi')
						->join('tb_pasien', 'tb_pasien.id_pasien = tb_pemeriksaan.id_pasien')
						//->where("DATE_FORMAT(tanggal_pemeriksaan,'%Y-%M-%d')", $year.'-'.$month.'-'.$day)
						->where('tanggal_pemeriksaan', date('Y-m-d', strtotime($date)))
						->get('tb_pemeriksaan')
						->result();
	}

	public function get_data_pemeriksaan_by_month()
	{
		return $this->db->select('nama_pasien, tanggal_pemeriksaan, hasil_pemeriksaan, diagnosis, terapi')
						->join('tb_pasien', 'tb_pasien.id_pasien = tb_pemeriksaan.id_pasien')
						->where("DATE_FORMAT(tanggal_pemeriksaan,'%Y-%M')", $this->uri->segment(3).'-'.$this->uri->segment(4))
						->get('tb_pemeriksaan')
						->result();
	}

	public function get_data_pemeriksaan_by_year()
	{
		return $this->db->select('nama_pasien, tanggal_pemeriksaan, hasil_pemeriksaan, diagnosis, terapi')
						->join('tb_pasien', 'tb_pasien.id_pasien = tb_pemeriksaan.id_pasien')
						->where("DATE_FORMAT(tanggal_pemeriksaan,'%Y')", $this->uri->segment(3))
						->get('tb_pemeriksaan')
						->result();
	}

	public function get_data_pemeriksaan_by_id($id)
	{
		return $this->db->where('id_pemeriksaan', $id)->get('tb_pemeriksaan')->row();
	}

	public function get_graf_pemeriksaan_by_year()
	{
		return $this->db->select('DATE_FORMAT(tanggal_pemeriksaan,'.'"%Y"'.') as date, COUNT(id_pemeriksaan) as total')
						->group_by('DATE_FORMAT(tanggal_pemeriksaan,'.'"%Y"'.')')
						->get('tb_pemeriksaan')
						->result();
	}	

	public function get_graf_pemeriksaan_by_month()
	{
		return $this->db->select('DATE_FORMAT(tanggal_pemeriksaan,'.'"%M"'.') as date, COUNT(id_pemeriksaan) as total')
						->where("DATE_FORMAT(tanggal_pemeriksaan,'%Y')", $this->uri->segment(3))
						->group_by('DATE_FORMAT(tanggal_pemeriksaan,'.'"%M"'.')')
						->get('tb_pemeriksaan')
						->result();
	}	

	public function get_graf_pemeriksaan_by_day()
	{
		return $this->db->select('DATE_FORMAT(tanggal_pemeriksaan,'.'"%d"'.') as date, COUNT(id_pemeriksaan) as total')
						->where("DATE_FORMAT(tanggal_pemeriksaan,'%Y-%M')", $this->uri->segment(3).'-'.$this->uri->segment(4))
						->group_by('tanggal_pemeriksaan')
						->get('tb_pemeriksaan')
						->result();
	}	

}

/* End of file data_pemeriksaan_model.php */
/* Location: ./application/models/data_pemeriksaan_model.php */