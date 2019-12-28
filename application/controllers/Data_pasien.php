<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pasien extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_pasien_model');
		$this->load->model('data_pemeriksaan_pasien_model');
	}

	public function index()
	{
		$data['main_view'] = 'data_pasien_view';
		$data['JSON'] = 'JSON/data_pasien_JSON';
		$data['data_pasien'] = $this->data_pasien_model->get_data_pasien();
		$this->load->view('index', $data);	
	}

	public function get_data_pasien_by_id($id)
	{
		$data_pasien = $this->data_pasien_model->get_data_pasien_by_id($id);
		echo json_encode($data_pasien);
	}

	public function tambah_pasien()
	{
		if ($this->data_pasien_model->add_data_pasien() == TRUE) {
			$this->session->set_flashdata('success', 'Tambah Data Pasien Berhasil');
			redirect('data_pasien');
		} else {
			$this->session->set_flashdata('failed', 'Tambah Data Pasien Gagal, Silahkan Coba Lagi Atau Segera Hubungi Developer');
			redirect('data_pasien');
		}
		
	}

	public function edit_pasien($id)
	{
		if ($this->data_pasien_model->edit_data_pasien($id) == TRUE) {
			$this->session->set_flashdata('success', 'Edit Data Pasien Berhasil');
			redirect('data_pasien');
		} else {
			$this->session->set_flashdata('failed', 'Edit Data Pasien Gagal, Silahkan Coba Lagi Atau Segera Hubungi Developer');
			redirect('data_pasien');
		}
		
	}

	public function hapus_pasien($id_pasien)
	{
		if ($this->data_pasien_model->delete_data_pasien($id_pasien) == TRUE) {
			$this->session->set_flashdata('success', 'Hapus Data Pasien Berhasil');
			redirect('data_pasien');
		} else {
			$this->session->set_flashdata('failed', 'Hapus Data Pasien Gagal, Silahkan Coba Lagi Atau Segera Hubungi Developer');
			redirect('data_pasien');
		}
		
	}

	public function data_pemeriksaan_pasien($id, $nama_pasien)
	{
		$data['main_view'] = 'data_pemeriksaan_pasien_view';
		$data['JSON'] = 'JSON/data_pemeriksaan_pasien_JSON';
		$data['nama_pasien'] = $nama_pasien;
		$data['data_pemeriksaan'] = $this->data_pemeriksaan_pasien_model->get_data_pemeriksaan_pasien($id);
		$this->load->view('index', $data);
	}

	public function get_nota()
	{
		$output = '';
		$query = '';
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->data_pemeriksaan_pasien_model->get_transaction_note($query);

		$output .= '
		<h5 style="margin-top:-30px">'.$data[1]->waktu_transaksi.'</h5>
		<table class="display table table-bordered">
                        <tr>
                            <th>Nama Obat</th>
                            <th>Rincian Obat</th>
                            <th>Jumlah Obat</th>
                            <th>Harga</th>
                        </tr>';
        foreach ($data[0] as $row) {
        	$output .= '<tr>
        					<td>'.$row->nama_obat.'</td>
        					<td>'.$row->rincian_obat.'</td>
        					<td>'.$row->jumlah.'</td>
        					<td>Rp. '.$row->harga.'</td>
        				</tr>';
        }
        $output .= '<tr>
                        <th colspan="3">Total Harga</th>
                        <th>Rp. '.$data[1]->harga_total.'</th>
                    </tr>
                </table>';
		echo $output;        
	}

	public function get_data_pemeriksaan_pasien_by_id($id)
	{
		$data_pemeriksaan_pasien = $this->data_pemeriksaan_pasien_model->get_data_pemeriksaan_pasien_by_id($id);
		echo json_encode($data_pemeriksaan_pasien);
	}

	public function tambah_data_pemeriksaan($id_pasien, $nama_pasien)
	{
		if ($this->data_pemeriksaan_pasien_model->add_data_pemeriksaan_pasien($id_pasien) == TRUE) {
			$this->session->set_flashdata('success', 'Tambah Data Pemeriksaan Pasien <b>'.urldecode($nama_pasien).'</b> Berhasil');
			redirect('data_pasien/data_pemeriksaan_pasien/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
		} else {
			$this->session->set_flashdata('failed', 'Tambah Data Pemeriksaan Pasien <b>'.urldecode($nama_pasien).'</b> Gagal, Silahkan Coba Lagi atau Segera Hubungi Developer');
			redirect('data_pasien/data_pemeriksaan_pasien/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
		}
		
	}

	public function hapus_data_pemeriksaan($id_pemeriksaan, $id_pasien, $nama_pasien)
	{
		if ($this->data_pemeriksaan_pasien_model->delete_data_pemeriksaan_pasien($id_pemeriksaan) == TRUE) {
			$this->session->set_flashdata('success', 'Data Pemeriksaan Berhasil Dihapus');
			redirect('data_pasien/data_pemeriksaan_pasien/'.$id_pasien.'/'.$nama_pasien);
		} else {
			$this->session->set_flashdata('failed', 'Data Pemeriksaan Gagal Dihapus, Silahkan Coba Lagi atau Segera Hubungi Developer');
			redirect('data_pasien/data_pemeriksaan_pasien/'.$id_pasien.'/'.$nama_pasien);
		}
		
	}

	public function edit_data_pemeriksaan($id_pemeriksaan, $id_pasien, $nama_pasien)
	{
		if ($this->data_pemeriksaan_pasien_model->edit_data_pemeriksaan_pasien($id_pemeriksaan) == TRUE) {
			$this->session->set_flashdata('success', 'Data Pemeriksaan Berhasil Diubah');
			redirect('data_pasien/data_pemeriksaan_pasien/'.$id_pasien.'/'.$nama_pasien);
		} else {
			$this->session->set_flashdata('failed', 'Data Pemeriksaan Gagal Diubah, Silahkan Coba Lagi atau Hubungi Developer');
			redirect('data_pasien/data_pemeriksaan_pasien/'.$id_pasien.'/'.$nama_pasien);
		}
		
	}

}

/* End of file data_pasien.php */
/* Location: ./application/controllers/data_pasien.php */