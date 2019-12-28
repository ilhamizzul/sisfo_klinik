<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_obat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_obat_model');
		$this->load->model('detail_obat_model');
	}

	public function index()
	{
		$data['main_view'] = 'data_obat_view';
		$data['JSON'] = 'JSON/data_obat_JSON';
		if ($this->data_obat_model->get_data_obat() == NULL) {
			if ($this->data_obat_model->recap_stock_obat() == TRUE) {
				$data['data_obat'] = $this->data_obat_model->get_data_obat();	
			} else {
				var_dump('error');
			}
		} else {
			$data['data_obat'] = $this->data_obat_model->get_data_obat();
		}
		
		$this->load->view('index', $data);
	}

	public function detail_obat($id_obat, $nama_obat)
	{
		$data['main_view'] = 'detail_obat_view';
		$data['JSON'] = 'JSON/data_obat_JSON';
		$data['stok_bulan'] = $this->detail_obat_model->get_stock_this_month($id_obat);
		$data['nama_obat'] = $nama_obat;
		$data['stock_by_year'] = $this->detail_obat_model->get_stock_by_year($id_obat);
		$this->load->view('index', $data);
	}

	public function graf_stok_obat($id_obat, $nama_obat, $tahun)
	{
		$data['main_view'] 	= 'graf_stok_obat_view';
		$data['JSON'] 		= 'JSON/graph_obat_JSON';
		$data['data_stock']	= $this->detail_obat_model->get_data_for_graph($id_obat, $tahun);
		$i = 0;
		foreach ($this->detail_obat_model->get_data_for_graph($id_obat, $tahun) as $graph_data) {
			$graph_stock[$i]['bulan'] 		= $graph_data->bulan;
		 	$graph_stock[$i]['stok_masuk'] 	= $graph_data->stok_masuk;
		 	$graph_stock[$i]['stok_keluar'] = $graph_data->stok_keluar;
		 	$graph_stock[$i]['sisa_stok'] 	= $graph_data->sisa_stok;
		 	$i++;
		};
		$data['graph_stock'] = json_encode($graph_stock);
		$this->load->view('index', $data);
	}

	public function get_data_obat_by_id($id_obat)
	{
		$data_obat = $this->data_obat_model->get_data_obat_by_id($id_obat);
		echo json_encode($data_obat);
	}

	public function tambah_obat()
	{
		if ($this->data_obat_model->tambah_data_obat() == TRUE) {
			$this->session->set_flashdata('success', 'Tambah Data Obat Berhasil');
			redirect('data_obat');
		} else {
			$this->session->set_flashdata('failed', 'Tambah Data Obat Gagal. Silahkan coba lagi atau hubungi admin!');
			redirect('data_obat');
		}
		
	}

	public function edit_obat($id_obat)
	{
		if ($this->data_obat_model->edit_data_obat($id_obat) == TRUE) {
			$this->session->set_flashdata('success', 'Edit Data Obat Berhasil');
			redirect('data_obat');
		} else {
			$this->session->set_flashdata('failed', 'Edit Data Obat Gagal. Silahkan coba lagi atau hubungi admin!');
			redirect('data_obat');
		}
		
	}

	public function delete_obat($id_obat)
	{
		if ($this->data_obat_model->delete_obat($id_obat) == TRUE) {
			$this->session->set_flashdata('success', 'Data Obat Berhasil Dihapus');
			redirect('data_obat');
		} else {
			$this->session->set_flashdata('failed', 'Data Obat Gagal Dihapus, Silahkan Hubungi Admin');
			redirect('data_obat');
		}
		
	}

	public function tambah_stock($stock, $id_obat)
	{
		$data_stock = $this->data_obat_model->get_stok_obat_by_date($id_obat);
		if ($this->data_obat_model->tambah_stok_obat($stock, $id_obat, $data_stock)) {
			$this->session->set_flashdata('success', 'Tambah Stock Berhasil');
			redirect('data_obat');
		} else {
			$this->session->set_flashdata('failed', 'Tambah Stock Gagal. Silahkan coba lagi atau hubungi admin!');
			redirect('data_obat');
		}
	}

}

/* End of file data_obat.php */
/* Location: ./application/controllers/data_obat.php */