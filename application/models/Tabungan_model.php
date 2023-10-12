<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan_model extends CI_Model {

	public function getPecahan()
	{
		return $this->db->get('pecahan')->result();
	}

	public function getSpesifikasiByIdUser($id_user = null)
	{
		return $this->db->get_where('spesifikasi_tabungan', ['id_user' => $id_user, 'aktif' => 1])->row();
	}

	public function getTotalTabungan($id_spesifikasi = null)
	{
		$this->db->select('SUM(nilai) AS total');
		$this->db->group_by('id_spesifikasi');
		return $this->db->get_where('tabungan', ['id_spesifikasi' => $id_spesifikasi])->row();	
	}

	public function getNumTabunganBySpesifikasi($id_spesifikasi = null)
	{
		return $this->db->get_where('tabungan', ['id_spesifikasi' => $id_spesifikasi])->num_rows();;
	}

	public function getTabunganBySpesifikasi($id_spesifikasi = null)
	{
		return $this->db->get_where('tabungan', ['id_spesifikasi' => $id_spesifikasi])->result();
	}

	public function insertSpesifikasi($data = null)
	{
		return $this->db->insert('spesifikasi_tabungan', $data);
	}

	public function deleteSpesifikasi($id = null)
	{
		return $this->db->delete('spesifikasi_tabungan', ['id' => $id]);
	}

	public function insertTabungan($data = null)
	{
		return $this->db->insert('tabungan', $data);
	}

	public function getSpesifikasiById($id = null)
	{
		return $this->db->get_where('spesifikasi_tabungan', ['id' => $id])->row();
	}

	public function insertPecahan($data = null)
	{
		return $this->db->insert('pecahan', $data);
	}
	public function deletePecahan($id = null)
	{
		return $this->db->delete('pecahan', ['id' => $id]);
	}
	public function updatePecahan($id = null, $data = null)
	{
		$this->db->where('id', $id);
		return $this->db->update('pecahan', $data);	
	}
	
}
