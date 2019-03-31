<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mahasiswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_query');
		$this->load->library('form_validation');
		$this->load->helper('url', 'html');
	}

	public function index()
	{
		if (!$this->session->userdata('level') == "admin") {
			redirect('c_user','refresh');
		}
		$data = $this->m_query->dataMahasiswa();
		$this->load->view('v_mahasiswa', ['data'=>$data]);		
	}

	public function insertMahasiswa()
	{
		$this->form_validation->set_rules('nim', 'Nim' , 'required');
		$this->form_validation->set_rules('nama', 'nama' , 'required');
		$this->form_validation->set_rules('alamat', 'alamat' , 'required');
		$this->form_validation->set_rules('status', 'status' , 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		if ($this->form_validation->run() ) 
		{
			$nim = $this->input->post('nim');//sesuaikan nama fiednya denagn inputan ok
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');//sesuaikan nama fiednya denagn inputan ok
			$status = $this->input->post('status');
			
			$mahasiswa = (['nim'=>$nim,
							'nama'=>$nama,
							'alamat'=>$alamat,
							'status'=>$status]);
			$data = array_merge($mahasiswa);
			if ($this->m_query->TambahMahasiswa($data) == false) 
				{
					$this->session->set_flashdata('pesan', 'Data Anda Sudah tersimpan di database');
					redirect('c_mahasiswa','refresh');
				}
				else
				{
					$this->index();
				}
		}
		 else
		{
			$this->index();
		}
	}

	public function EditMahasiswa($id)
	{
		$data = $this->m_query->AmbilDataMahasiswa($id);
		$this->load->view('v_editmahasiswa', ['data'=>$data]);
	}

	public function UpdateMahasiswa()
	{
		$this->form_validation->set_rules('nim', 'Nim' , 'required');
		$this->form_validation->set_rules('nama', 'nama' , 'required');
		$this->form_validation->set_rules('alamat', 'alamat' , 'required');
		$this->form_validation->set_rules('status', 'status' , 'required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">','</span>');
		if ($this->form_validation->run() ) 
		{
			$nim = $this->input->post('nim');//sesuaikan nama fiednya denagn inputan ok
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');//sesuaikan nama fiednya denagn inputan ok
			$status = $this->input->post('status');
			
			$mahasiswa = (['nim'=>$nim,
							'nama'=>$nama,
							'alamat'=>$alamat,
							'status'=>$status]);
			$data = array_merge($mahasiswa);
			if ($this->m_query->M_EditMahasiswa($data, $this->input->post('id')) == false) 
				{
					$this->session->set_flashdata('pesan', 'Data Anda Berhasil Di Update');
				}
				else
				{
					$this->index();
				}
				redirect('c_mahasiswa','refresh');
		}
		 else
		{
			$this->index();
	
		}
	}

	public function DeleteMahasiswa($id)
	{
		if ($this->m_query->M_DeleteMahasiswa($id) == false) 
			{
				$this->session->set_flashdata('pesan', 'Data Anda Berhasil Di Hapus');
			}
			redirect('c_mahasiswa','refresh');
	}


}

/* End of file c_mahasiswa.php */
/* Location: ./application/controllers/c_mahasiswa.php */