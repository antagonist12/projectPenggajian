<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aturan_gaji extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Halaman Menu Aturan Gaji';
		$data['aturanGaji'] = $this->Aturangaji_model->getAllData('aturan_gaji')->result_array();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('aturanGaji/index', $data);
		$this->load->view('layout/footer');
	}

	// tambah Aturan baru
	public function addAturan()
	{
		$data['judul'] = 'Halaman Tambah Jabatan';
		$data['jabatan'] = $this->Aturangaji_model->getAllData('jabatan')->result_array();

		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
			'required' => 'Jabatan Harus Diisi'
		]);
		$this->form_validation->set_rules('masaKerja', 'MasaKerja', 'required|trim', [
			'required' => 'Masa Kerja Harus Diisi'
		]);
		$this->form_validation->set_rules('insentif', 'Insentif', 'required|trim', [
			'required' => 'Insentif Harus Diisi'
		]);
		$this->form_validation->set_rules('bonus', 'Bonus', 'required|trim', [
			'required' => 'Bonus Harus Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('aturanGaji/addAturan');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'jabatan' => htmlspecialchars($this->input->post('jabatan')),
				'masa_kerja' => htmlspecialchars($this->input->post('masaKerja')),
				'insentif' => htmlspecialchars($this->input->post('insentif')),
				'bonus' => htmlspecialchars($this->input->post('bonus'))
			];
			$this->security->xss_clean($data);
			$this->Aturangaji_model->insertData('aturan_gaji', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Aturan Gaji Berhasil <strong>Ditambahkan!</strong>
			</div>');
			redirect('Aturan_gaji');
		}
	}

	// menghapus Aturan
	public function deleteAturan($id)
	{
		$where = array('id' => $id);

		$this->Aturangaji_model->deleteData($where, 'aturan_gaji');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Aturan Gaji Berhasil <strong>Dihapus!</strong>
					</div>');
		redirect('Aturan_gaji');
	}

	// update Aturan
	public function updateAturan($id)
	{
		$data['judul'] = 'Halaman Tambah Jabatan';
		$data['aturanGaji'] = $this->Aturangaji_model->getData('aturan_gaji', ['aturan_gaji.id' => $id])->row_array();
		$data['jabatan'] = $this->Aturangaji_model->getAllData('jabatan')->result_array();

		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
			'required' => 'Jabatan Harus Diisi'
		]);
		$this->form_validation->set_rules('masaKerja', 'MasaKerja', 'required|trim', [
			'required' => 'Masa Kerja Harus Diisi'
		]);
		$this->form_validation->set_rules('insentif', 'Insentif', 'required|trim', [
			'required' => 'Insentif Harus Diisi'
		]);
		$this->form_validation->set_rules('bonus', 'Bonus', 'required|trim', [
			'required' => 'Bonus Harus Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('aturanGaji/updateAturan', $data);
			$this->load->view('layout/footer');
		} else {
			$where = array('id' => $id);
			$data = [
				'jabatan' => htmlspecialchars($this->input->post('jabatan')),
				'masa_kerja' => htmlspecialchars($this->input->post('masaKerja')),
				'insentif' => htmlspecialchars($this->input->post('insentif')),
				'bonus' => htmlspecialchars($this->input->post('bonus'))
			];

			$this->security->xss_clean($data);
			$this->Aturangaji_model->updateData('aturan_gaji', $data, $where);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Aturan Gaji <strong>Diupdate!</strong>
			</div>');
			redirect('Aturan_gaji');
		}
	}
}
