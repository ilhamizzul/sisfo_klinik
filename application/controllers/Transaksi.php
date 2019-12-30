<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');	
	}

	public function index()
	{
		
	}

	public function detail_transaksi($id_pemeriksaan)
	{
		$data['main_view'] = 'transaksi_view';
		$data['JSON'] = 'JSON/transaksi_JSON';
		$this->load->view('index', $data);
	}

	public function save_transaksi($id_pemeriksaan)
	{
		$hargatotal = $this->input->post('harga_total');
		$datatable = $this->input->post('datatable');
		if ($this->transaksi_model->add_transaksi($id_pemeriksaan, $hargatotal, $datatable) == TRUE) {
		} else {
			$this->session->set_flashdata('failed', 'GAGAL');
			redirect('transaksi/detail_transaksi/'.$id_pemeriksaan);
		}
	}

	public function get_data()
	{
		$output = '';
		$query = '';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->transaksi_model->search_obat($query);
		$output .= '
				<table class="display table table-hover">
            		<tbody>';
		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$output .= '
					<tr>
                        <td class="col-md-1 add_data">'.$row->id_obat.'</td>
                        <td class="col-md-8 add_data">'.$row->nama_obat.'</td>
                        <td class="col-md-1 add_data">'.$row->sisa_stok.'</td>    
                        <td class="col-md-2" ><a id="'.$row->id_obat.'" class="btn btn-md btn-info" onclick="add_item(\''.$row->id_obat.'\')">Add</a></td>
                    </tr>
				';
			}
		} else {
			$output .= '
				<tr>
					<td colspan="3">Data Tidak Ditemukan</td>
				</tr>
			';
		}
		$output .= '</table>';
		echo $output;
		
	}

	public function check_data()
	{
		$query = '';
		if ($this->input->post('id_obat')) {
			$query = $this->input->post('id_obat');
		} 

		$data = $this->transaksi_model->check_item($query);
		
		echo json_encode($data);
	}
}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */