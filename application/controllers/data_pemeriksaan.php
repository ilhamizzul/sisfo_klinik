<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pemeriksaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_pemeriksaan_model');
	}

	public function index()
	{
		$data['main_view'] = 'data_pemeriksaan_view';
		$data['JSON'] = 'JSON/data_pemeriksaan_JSON';
		$data['pemeriksaan_tahun'] = $this->data_pemeriksaan_model->get_pemeriksaan_by_year();
		$data['pemeriksaan_bulan'] = $this->data_pemeriksaan_model->get_pemeriksaan_by_month();
		$data['pemeriksaan_hari'] = $this->data_pemeriksaan_model->get_pemeriksaan_by_day();
		$data['data_pemeriksaan_tahun'] = $this->data_pemeriksaan_model->get_data_pemeriksaan_by_year();
		$data['data_pemeriksaan_bulan'] = $this->data_pemeriksaan_model->get_data_pemeriksaan_by_month();
		if ($this->uri->total_segments() < 3) {
           $data['graph'] = json_encode($this->data_pemeriksaan_model->get_graf_pemeriksaan_by_year()); 
        } else if($this->uri->total_segments() < 4) {
            $data['graph'] = json_encode($this->data_pemeriksaan_model->get_graf_pemeriksaan_by_month()); 
        } else if($this->uri->total_segments() < 5) {
            $data['graph'] = json_encode($this->data_pemeriksaan_model->get_graf_pemeriksaan_by_day());
        }
        $this->load->view('index', $data);
	}

	public function date()
	{
		$data['main_view'] = 'data_pemeriksaan_view';
		$data['JSON'] = 'JSON/data_pemeriksaan_JSON';
		$data['pemeriksaan_tahun'] = $this->data_pemeriksaan_model->get_pemeriksaan_by_year();
		$data['pemeriksaan_bulan'] = $this->data_pemeriksaan_model->get_pemeriksaan_by_month();
		$data['pemeriksaan_hari'] = $this->data_pemeriksaan_model->get_pemeriksaan_by_day();
		$data['data_pemeriksaan_tahun'] = $this->data_pemeriksaan_model->get_data_pemeriksaan_by_year();
		$data['data_pemeriksaan_bulan'] = $this->data_pemeriksaan_model->get_data_pemeriksaan_by_month();
		if ($this->uri->total_segments() < 3) {
           $data['graph'] = json_encode($this->data_pemeriksaan_model->get_graf_pemeriksaan_by_year()); 
        } else if($this->uri->total_segments() < 4) {
            $data['graph'] = json_encode($this->data_pemeriksaan_model->get_graf_pemeriksaan_by_month()); 
        } else if($this->uri->total_segments() < 5) {
            $data['graph'] = json_encode($this->data_pemeriksaan_model->get_graf_pemeriksaan_by_day());
        }
		$this->load->view('index', $data);
	}

	public function data($year, $month, $day)
	{
		$data['main_view'] = 'detail_data_pemeriksaan_view';
		$data['JSON'] = 'JSON/data_pemeriksaan_JSON';
		$data['data_pemeriksaan'] = $this->data_pemeriksaan_model->get_data_pemeriksaan_by_day($year, $month, $day);
		$this->load->view('index', $data);
	}

}

/* End of file data_pemeriksaan.php */
/* Location: ./application/controllers/data_pemeriksaan.php */