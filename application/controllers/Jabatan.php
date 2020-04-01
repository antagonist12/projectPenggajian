<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Halaman Menu Jabatan';
		$data['jabatan'] = $this->Jabatan_model->getAllData('jabatan')->result_array();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('jabatan/index', $data);
		$this->load->view('layout/footer');
	}

	// tambah jabatan baru
	public function addJabatan()
	{
		$data['judul'] = 'Halaman Tambah Jabatan';

		$this->form_validation->set_rules('kodeJabatan', 'KodeJabatan', 'required|trim', [
			'required' => 'Kode Jabatan Harus Diisi'
		]);
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
			'required' => 'Jabatan Harus Diisi'
		]);
		$this->form_validation->set_rules('standarGaji', 'StandarGaji', 'required|trim', [
			'required' => 'Standar Gaji Harus Diisi'
		]);
		$this->form_validation->set_rules('ketJabatan', 'KetJabatan', 'required|trim', [
			'required' => 'Keterangan Harus Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('jabatan/addJabatan');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'kode' => htmlspecialchars($this->input->post('kodeJabatan')),
				'jabatan' => htmlspecialchars($this->input->post('jabatan')),
				'standar_gaji' => htmlspecialchars($this->input->post('standarGaji')),
				'keterangan' => htmlspecialchars($this->input->post('ketJabatan'))
			];
			$this->security->xss_clean($data);
			$this->Jabatan_model->insertData('jabatan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Jabatan Berhasil <strong>Ditambahkan!</strong>
			</div>');
			redirect('jabatan');
		}
	}

	// menghapus jabatan
	public function deleteJabatan($id)
	{
		$where = array('id' => $id);

		$this->Jabatan_model->deleteData($where, 'jabatan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Jabatan Berhasil <strong>Dihapus!</strong>
					</div>');
		redirect('jabatan');
	}

	// detail jabatan
	public function detailJabatan($id)
	{
		$data['judul'] = 'Halaman Menu Jabatan';
		$where = ['jabatan.id' => $id];
		$data['jabatan'] = $this->Jabatan_model->getData('jabatan', $where)->row_array();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('jabatan/detailJabatan', $data);
		$this->load->view('layout/footer');
	}

	// update jabatan
	public function updateJabatan($id)
	{
		$data['judul'] = 'Halaman Tambah Jabatan';
		$data['jabatan'] = $this->Jabatan_model->getData('jabatan', ['jabatan.id' => $id])->row_array();

		$this->form_validation->set_rules('kodeJabatan', 'KodeJabatan', 'required|trim', [
			'required' => 'Kode Jabatan Harus Diisi'
		]);
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
			'required' => 'Jabatan Harus Diisi'
		]);
		$this->form_validation->set_rules('standarGaji', 'StandarGaji', 'required|trim', [
			'required' => 'Standar Gaji Harus Diisi'
		]);
		$this->form_validation->set_rules('ketJabatan', 'KetJabatan', 'required|trim', [
			'required' => 'Keterangan Harus Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('jabatan/updateJabatan', $data);
			$this->load->view('layout/footer');
		} else {
			$where = array('id' => $id);
			$data = [
				'kode' => htmlspecialchars($this->input->post('kodeJabatan')),
				'jabatan' => htmlspecialchars($this->input->post('jabatan')),
				'standar_gaji' => htmlspecialchars($this->input->post('standarGaji')),
				'keterangan' => htmlspecialchars($this->input->post('ketJabatan'))
			];

			$this->security->xss_clean($data);
			$this->Jabatan_model->updateData('jabatan', $data, $where);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Jabatan Berhasil <strong>Diupdate!</strong>
			</div>');
			redirect('jabatan');
		}
	}
}
