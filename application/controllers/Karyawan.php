<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Halaman Menu Karyawan';
		$data['karyawan'] = $this->Karyawan_model->getAllData('karyawan')->result_array();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('karyawan/index', $data);
		$this->load->view('layout/footer');
	}

	// tambah Karyawan baru
	public function addKaryawan()
	{
		$data['judul'] = 'Halaman Tambah Karyawan';
		$data['jabatan'] = $this->Karyawan_model->getAllData('jabatan')->result_array();

		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[karyawan.nip]', [
			'required' => 'NIP Karyawan Harus Diisi',
			'is_unique' => "NIP Sudah Terdaftar."
		]);
		$this->form_validation->set_rules('nama', 'nama', 'required|trim', [
			'required' => 'Nama Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required|trim', [
			'required' => 'Jenis Kelamin Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'required|trim', [
			'required' => 'Tanggal Lahir Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('masaKerja', 'MasaKerja', 'required|trim', [
			'required' => 'Masa Kerja Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim', [
			'required' => 'No. Telepon Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required' => 'Email Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
			'required' => 'Alamat Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
			'required' => 'Jabatan Karyawan Harus Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('karyawan/addKaryawan');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'nip' => htmlspecialchars($this->input->post('nip')),
				'nama' => htmlspecialchars($this->input->post('nama')),
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir')),
				'telp' => htmlspecialchars($this->input->post('telp')),
				'email' => htmlspecialchars($this->input->post('email')),
				'alamat' => htmlspecialchars($this->input->post('alamat')),
				'jabatan' => htmlspecialchars($this->input->post('jabatan')),
				'masa_kerja' => htmlspecialchars($this->input->post('masaKerja'))
			];

			$this->security->xss_clean($data);
			$this->Karyawan_model->insertData('karyawan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Karyawan Berhasil <strong>Ditambahkan!</strong>
			</div>');
			redirect('karyawan');
		}
	}

	// menghapus Karyawan
	public function deleteKaryawan($id)
	{
		$where = array('id' => $id);

		$this->Karyawan_model->deleteData($where, 'karyawan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Karyawan Berhasil <strong>Dihapus!</strong>
					</div>');
		redirect('karyawan');
	}

	// detail Karyawan
	public function detailKaryawan($id)
	{
		$data['judul'] = 'Halaman Detail Karyawan';
		$where = ['karyawan.id' => $id];
		$data['karyawan'] = $this->Karyawan_model->getData('karyawan', $where)->row_array();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('karyawan/detailKaryawan', $data);
		$this->load->view('layout/footer');
	}

	// update Karyawan
	public function updateKaryawan($nip)
	{
		$data['judul'] = 'Halaman Tambah Jabatan';
		$data['karyawan'] = $this->Karyawan_model->getData('karyawan', ['karyawan.nip' => $nip])->row_array();
		$data['jabatan'] = $this->Karyawan_model->getAllData('jabatan')->result_array();

		$this->form_validation->set_rules('nama', 'nama', 'required|trim', [
			'required' => 'Nama Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required|trim', [
			'required' => 'Jenis Kelamin Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'required|trim', [
			'required' => 'Tanggal Lahir Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('masaKerja', 'MasaKerja', 'required|trim', [
			'required' => 'Masa Kerja Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('telp', 'Telp', 'required|trim', [
			'required' => 'No. Telepon Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required' => 'Email Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
			'required' => 'Alamat Karyawan Harus Diisi'
		]);
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
			'required' => 'Jabatan Karyawan Harus Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('karyawan/updateKaryawan', $data);
			$this->load->view('layout/footer');
		} else {
			$where = array('karyawan.nip' => $nip);
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama')),
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir')),
				'telp' => htmlspecialchars($this->input->post('telp')),
				'email' => htmlspecialchars($this->input->post('email')),
				'alamat' => htmlspecialchars($this->input->post('alamat')),
				'jabatan' => htmlspecialchars($this->input->post('jabatan')),
				'masa_kerja' => htmlspecialchars($this->input->post('masaKerja'))
			];

			$this->security->xss_clean($data);
			$this->Karyawan_model->updateData('karyawan', $data, $where);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Karyawan Berhasil <strong>Diupdate!</strong>
			</div>');
			redirect('karyawan');
		}
	}
}
