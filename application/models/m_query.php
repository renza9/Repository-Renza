<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_query extends CI_Model {
	var $table = "users";
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(['username'=>$username, 'password'=>md5($password)]); //tanda [] ini sama dengan fungsi array
		$return = $this->db->get('');
		//memeriksa datanya apakah ada atau tidak
		//jika ada maka akan menampilkan pesan sukses
		
		if ($return->num_rows() > 0) {
			// result sama fungsinya dnegan mysql fetch array
			foreach ($return->result() as $row) 
			{
				// jika sukses
				if ($row->level=="admin") 
				{
					$session = array('level' =>'$admin');
					$this->session->set_userdata( $session);
				}
				redirect('c_mahasiswa','refresh');
				//redirect('view_mahasiswa','refresh');
				//$this->load->view('v_mahasiswa');
			}
		}
		//jika gagal
		else
		{
			$this->session->set_flashdata('pesan', 'Username Dan Password Tidak Valid');	
			//redirect('ctrl_satu','refresh');
			redirect('c_user','refresh');
		}

	}

	//untuk menampilkan data mahasiswa
	public function dataMahasiswa()
	{
		$this->db->select('*');
		$this->db->from('tb_mahasiswa');
		$this->db->order_by('nim', 'asc');
		$data = $this->db->get('');
		return $data;
	}

	public function dataUsers()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('username', 'asc');
		$data = $this->db->get('');
		return $data;
	}

	public function TambahMahasiswa($data)
	{
		$this->db->insert('tb_mahasiswa',$data);
	}

	public function TambahUsers($data)
	{
		$this->db->insert('users',$data);
	}


	public function AmbilDataMahasiswa($id)
	{
		$data = $this->db->where(['id'=>$id])
				 		 ->get("tb_mahasiswa");
		if ($data->num_rows() > 0) {
			return $data->row();//ambil data berdasarkan id dengan angkanya
		}

	}

	public function M_EditMahasiswa($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tb_mahasiswa', $data);
	}

	public function M_DeleteMahasiswa($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tb_mahasiswa');
	}

}

/* End of file m_query.php */
/* Location: ./application/models/m_query.php */