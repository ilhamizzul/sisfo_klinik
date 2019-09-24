<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index()
	{
		$data['main_view'] = 'dashboard_view';
		$data['JSON'] = 'JSON/dashboard_JSON';
		$data['count_all_pasien'] = $this->dashboard_model->count_pasien();
		$data['count_pemeriksaan_hari'] = $this->dashboard_model->count_pemeriksaan_hari();
		$data['count_pemeriksaan_bulan'] = $this->dashboard_model->count_pemeriksaan_bulan();
		$data['recap_data'] = json_encode($this->dashboard_model->graf_pemeriksaan());
		$this->load->view('index', $data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */