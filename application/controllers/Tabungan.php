<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('Tabungan_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$num =$this->db->get_where('spesifikasi_tabungan', ['id_user' => 1, 'aktif' => 1])->num_rows();
		$data['pecahan'] = $this->Tabungan_model->getPecahan();
		if ($num < 1) {
			$this->load->view('tabungan/index', $data);
		} else{
			$data['spesifikasi'] = $this->Tabungan_model->getSpesifikasiByIdUser(1);
			$data['total_menabung'] = $this->Tabungan_model->getNumTabunganBySpesifikasi($data['spesifikasi']->id);
			$data['total_tabungan'] = $this->Tabungan_model->getTotalTabungan($data['spesifikasi']->id);

			$this->db->order_by('id','DESC');
			$data['tabunganku'] = $this->Tabungan_model->getTabunganBySpesifikasi($data['spesifikasi']->id);
			$this->load->view('tabungan/tabungan', $data);
		}
	}

	public function insertSpesifikasi()
	{
		$this->form_validation->set_rules('target_tabungan', 'Target Tabungan', 'trim|required');
		$this->form_validation->set_rules('target_tanggal', 'Target Tanggal', 'trim|required');
		$this->form_validation->set_rules('pecahan', 'Pecahan', 'trim|required');
		$this->form_validation->set_rules('total_menabung', 'Total Menabung', 'trim|required');
		$this->form_validation->set_rules('jangka_waktu_menabung', 'Jangka Waktu Menabung', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Spesifikasi Tabungan Gagal disimpan!
				</div>');
			redirect('tabungan');
		} else{
			$data = [
				'id_user' => 1,
				'target_tabungan' => $this->input->post('target_tabungan'),
				'target_tanggal' => $this->input->post('target_tanggal'),
				'pecahan' => $this->input->post('pecahan'),
				'total_menabung' => $this->input->post('total_menabung'),
				'jangka_waktu_menabung' => $this->input->post('jangka_waktu_menabung'),
				'aktif' => 1
			];
			;
			if ($this->Tabungan_model->insertSpesifikasi($data)) {
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Spesifikasi Tabungan berhasil disimpan, Selamat Menabung!
					</div>');
				redirect('tabungan');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Spesifikasi Tabungan Gagal disimpan!
					</div>');
				redirect('tabungan');
			}
		}
	}

	public function prosesTotalMenabung($target_tabungan,$target_tanggal,$pecahan)
	{
		$target_tanggal  = strtotime($target_tanggal);
		$sekarang    = time();
		$diff   = $target_tanggal - $sekarang;
		$total_hari = floor($diff / (60 * 60 * 24));
		$data['total_cicilan'] = $target_tabungan/$pecahan;
		$data['jangka_menabung'] = $total_hari/$data['total_cicilan'];
		$this->load->view('tabungan/total-menabung', $data);
	}

	public function reset($id_spesifikasi)
	{
		// $this->db->where('id', $id_spesifikasi);
		// $this->db->update('spesifikasi_tabungan', ['aktif' => 0]);
		$this->Tabungan_model->deleteSpesifikasi($id_spesifikasi);
		$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
			Tabungan Anda Telah direset!
			</div>');
		redirect('tabungan');
	}

	public function tabung($id_spesifikasi)
	{
		$spesifikasi = $this->Tabungan_model->getSpesifikasiById($id_spesifikasi);
		$data = [
			'id_spesifikasi' => $id_spesifikasi,
			'waktu_menabung' => date('Y-m-d H:i:s'),
			'nilai' => $spesifikasi->pecahan,
		];
		$this->Tabungan_model->insertTabungan($data);
		$tabungan = $this->Tabungan_model->getTotalTabungan($id_spesifikasi);
		if ($tabungan->total >= $spesifikasi->target_tabungan) {
			$this->session->set_flashdata('flash', 'Target menabung Anda telah tercapai :)');
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
				Selamat! Target Anda telah tercapai! :)
				</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
				Tabungan Anda telah masuk!
				</div>');
		}
		redirect('tabungan');
	}

	public function pecahan()
	{
		$data['pecahan'] = $this->Tabungan_model->getPecahan();
		$this->form_validation->set_rules('pecahan', 'Pecahan', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('tabungan/data-pecahan', $data);
		} else{
			$data = ['pecahan' => $this->input->post('pecahan')];
			$this->Tabungan_model->insertPecahan($data);
			$this->session->set_flashdata('flash', 'Data Pecahan ditambahkan');
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
				Data Pecahan ditambahkan! :)
				</div>');
			redirect('tabungan/pecahan');
		}
	}


	public function hapusPecahan($id = null)
	{
		if ($id) {
			$this->Tabungan_model->deletePecahan($id);
			$this->session->set_flashdata('flash', 'Data Pecahan dihapus');
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
				Data Pecahan dihapus! :)
				</div>');
		}
		redirect('tabungan/pecahan');
	}
	
	public function ubahPecahan()
	{
		$this->form_validation->set_rules('pecahan', 'Pecahan', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->pecahan();
		} else{
			$data = ['pecahan' => $this->input->post('pecahan')];
			$this->Tabungan_model->updatePecahan($this->input->post('id'), $data);
			$this->session->set_flashdata('flash', 'Data Pecahan diubah');
			$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">
				Data Pecahan diubah! :)
				</div>');
			redirect('tabungan/pecahan');
		}
	}
	
}
