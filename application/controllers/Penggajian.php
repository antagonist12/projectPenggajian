<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penggajian extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Halaman Utama Penggajian';
		$data['gaji'] = $this->Penggajian_model->getAllData('gaji')->result_array();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('penggajian/index');
		$this->load->view('layout/footer');
	}

	// tambah penggajian baru
	public function addGaji()
	{
		$data['judul'] = 'Halaman Tambah Penggajian';
		$data['jabatan'] = $this->Penggajian_model->getAllData('jabatan')->result_array();
		$data['karyawan'] = $this->Penggajian_model->getAllData('karyawan')->result_array();

		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
			'required' => 'Jabatan Harus Diisi'
		]);
		$this->form_validation->set_rules('tglPenerimaan', 'tglPenerimaan', 'required|trim', [
			'required' => 'Standar Gaji Harus Diisi'
		]);
		$this->form_validation->set_rules('nominal', 'Nominal', 'required|trim', [
			'required' => 'Keterangan Harus Diisi'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('penggajian/addGaji');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'kode_penggajian' => htmlspecialchars($this->Penggajian_model->kode_otomatis_gaji()),
				'nip' => htmlspecialchars($this->input->post('nip')),
				'nama_karyawan' => htmlspecialchars($this->input->post('nama')),
				'tanggal_penerimaan' => htmlspecialchars($this->input->post('tglPenerimaan')),
				'nominal' => htmlspecialchars($this->input->post('nominal'))
			];
			$this->security->xss_clean($data);
			$this->Penggajian_model->insertData('gaji', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Gaji Berhasil <strong>Ditambahkan!</strong>
			</div>');
			redirect('penggajian');
		}
	}

	// detail penggajian tiap-tiap karyawan
	public function detailPenggajian($nip)
	{
		$data['judul'] = 'Halaman Detail Gaji Karyawan';
		$data['detail'] = $this->Penggajian_model->getDetail($nip);

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('penggajian/detailGaji', $data);
		$this->load->view('layout/footer');
	}

	// mengambil data karyawan lengkap dengan json
	public function DataKaryawan()
	{
		$jabatan = $this->input->post('jabatan', true);
		$result = $this->Penggajian_model->getByJabatan($jabatan);
		echo json_encode($result);
	}
}
