<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_hash extends CI_Controller {

	public function index()
	{
		$nama = "tasrin";
		$hashed_name = $this->hash_string($nama);
		echo "Nama Anda : ".$nama."<br>";
		echo $hashed_name;

		echo "<br>";
		$jika_ditekan_login = "tasrin";
		$result = $this->hash_verify($jika_ditekan_login, $hashed_name);
		if ($result==TRUE) {
			echo "login sukses";
		}else{
			echo "login gagal";
		}
	}



	public function hash_string($string)
	{
		$hashed_string = password_hash($string, PASSWORD_BCRYPT, ['cost'=>9]);
		return $hashed_string;
	}

	public function hash_verify($plain_text, $hashed_string)
	{
		$hashed_string = password_verify($plain_text, $hashed_string);
		return $hashed_string;
	}

}


/* End of file c_hash.php */
/* Location: ./application/controllers/c_hash.php */
?>