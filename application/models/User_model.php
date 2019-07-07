<?php

class User_model extends CI_Model {


	public function getUser(){
		$query = $this->db->get('users');
		return $query->result_array();
	}

	// method untuk membaca data profile user berdasar username
	public function getUserProfile($username){
		$query = $this->db->get_where('users', array('username' => $username));
		return $query->row_array();
	}

	// method untuk menampilkan data buku
	public function showUser($id = false){
		// membaca semua data kategori buku dari tabel 'kategori'
		if ($id == false){
			$query = $this->db->get('users');
			return $query->result_array();
		} else {
			// membaca data kategori buku berdasarkan id
			$query = $this->db->get_where('users', array("username" => $id));
			return $query->row_array();
		}
	}

	public function updateUser($username, $fullname, $role, $password){
		$data = array(
					"username" => $username,
					"fullname" => $fullname,
					"role" => $role,
					"password" => $password
		);
		$this->db->where('username', $username);
		$this->db->update('users', $data);
	}

	// method untuk hapus data buku berdasarkan id
	public function delUser($id){
		$this->db->delete('users', array("username" => $id));
	}

	// method untuk insert data kategori buku ke tabel 'kategori'
	public function insertUser($username, $fullname, $role, $password){
		$data = array(
					"username" => $username,
					"fullname" => $fullname,
					"role" => $role,
					"password" => $password
		);
		$query = $this->db->insert('users', $data);
	}

		// method untuk membaca data kategori buku dari tabel 'kategori'
	public function getRole(){
		$query = $this->db->get('roles');
		return $query->result_array();
	}
}

?>