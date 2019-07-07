<?php

class Book_model extends CI_Model {

	// method untuk menampilkan data buku
	public function showBook($id = false){
		// membaca semua data buku dari tabel 'books'
		if ($id == false){
			$query = $this->db->get('books');
			return $query->result_array();
		} else {
			// membaca data buku berdasarkan id
			$query = $this->db->get_where('books', array("idbuku" => $id));
			return $query->row_array();
		}
	}

	// method untuk hapus data buku berdasarkan id
	public function delBook($id){
		$this->db->delete('books', array("idbuku" => $id));
	}

	// method untuk mencari data buku berdasarkan key
	public function findBook($key){

		$query = $this->db->query("SELECT * FROM books WHERE judul LIKE '%$key%' 
									OR pengarang LIKE '%$key%' 
									OR penerbit LIKE '%$key%'
									OR sinopsis LIKE '%$key%'
									OR thnterbit LIKE '%$key%'");
		return $query->result_array();
	}

	 
	// method untuk insert data buku ke tabel 'books'
	public function insertBook($judul, $pengarang, $penerbit, $thnterbit, $sinopsis, $idkategori, $filename){
		$data = array(
					"judul" => $judul,
					"pengarang" => $pengarang,
					"penerbit" => $penerbit,
					"sinopsis" => $sinopsis,
					"idkategori" => $idkategori,
					"thnterbit" => $thnterbit,
					"imgfile" => $filename
		);
		$query = $this->db->insert('books', $data);
	}

	public function updateBook($idbuku, $judul, $pengarang, $penerbit, $thnterbit, $sinopsis, $idkategori, $filename){
		$data = array(
					"idbuku" => $idbuku,
					"judul" => $judul,
					"pengarang" => $pengarang,
					"penerbit" => $penerbit,
					"sinopsis" => $sinopsis,
					"idkategori" => $idkategori,
					"thnterbit" => $thnterbit,
					"imgfile" => $filename
		);
		$this->db->where('idbuku', $idbuku);
		$this->db->update('books', $data, "idbuku = ".$idbuku);
	}

	function tampilData(){
		return $this->db->get('books');		
	}
 
	function jumlahData(){
		return $this->db->get('books')->num_rows();
	}

	// method untuk membaca data kategori buku dari tabel 'kategori'
	public function getKategori(){
		$query = $this->db->get('kategori');
		return $query->result_array();
	}

	// method untuk menghitung jumlah buku berdasarkan idkategori
	public function countByCat($idkategori){
		$query = $this->db->query("SELECT count(*) as jum FROM books WHERE idkategori = '$idkategori'");
		return $query->row()->jum;
	}


	public function hitungJumlah(){   
   		$query = $this->db->get('books');
    	if($query->num_rows()>0){
      		return $query->num_rows();
    	} else {
      		return 0;
    	}
	}



	//KATEGORI
	//method untuk insert data kategori ke tabel 'kategori'
		public function showCat($id = false){
		// membaca semua data kategori buku dari tabel 'kategori'
		if ($id == false){
			$query = $this->db->get('kategori');
			return $query->result_array();
		} else {
			// membaca data kategori buku berdasarkan id
			$query = $this->db->get_where('kategori', array("idkategori" => $id));
			return $query->row_array();
		}
	}

	// method untuk hapus data buku berdasarkan id
	public function delCat($id){
		$this->db->delete('kategori', array("idkategori" => $id));
	}

	// method untuk insert data kategori buku ke tabel 'kategori'
	public function insertCat($kategori){
		$data = array(
					"kategori" => $kategori
		);
		$query = $this->db->insert('kategori', $data);
	}

	public function updateCat($idkategori, $kategori){
		$data = array(
					"idkategori" => $idkategori,
					"kategori" => $kategori
		);
		$this->db->where('idkategori', $idkategori);
		$this->db->update('kategori', $data);
	}


}
?>