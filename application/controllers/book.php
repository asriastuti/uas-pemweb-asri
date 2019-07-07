<?php
class Book extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		// cek keberadaan session 'username'	
		if (!isset($_SESSION['username'])){
			// jika session 'username' blm ada, maka arahkan ke kontroller 'login'
			redirect('login');
		}
	}


	// method hapus data buku berdasarkan id
	public function delete($id){
		$this->book_model->delBook($id);
		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/books');
	}

	// method untuk tambah data buku
	public function insert(){

		// target direktori fileupload
		$target_dir = "c:/xampp/htdocs/books/assets/images/";
		
		// baca nama file upload
		$filename = $_FILES["imgcover"]["name"];

		// menggabungkan target dir dengan nama file
		$target_file = $target_dir . basename($filename);

		// proses upload
		move_uploaded_file($_FILES["imgcover"]["tmp_name"], $target_file);

		// baca data dari form insert buku
		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$sinopsis = $_POST['sinopsis'];
		$thnterbit = $_POST['thnterbit'];
		$idkategori = $_POST['idkategori'];

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->book_model->insertBook($judul, $pengarang, $penerbit, $thnterbit, $sinopsis, $idkategori, $filename);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/books');
	}

	public function edit($id){
    			$data['kategori'] = $this->book_model->getKategori();
                $data['view_book'] = $this->book_model->showBook($id);

                $data['fullname'] = $_SESSION['fullname'];

                if (empty($data['view_book'])){
                show_404();
                }

                $data['idbuku'] = $data['view_book']['idbuku'];
                $data['judul'] = $data['view_book']['judul'];
                $data['pengarang'] = $data['view_book']['pengarang'];
                $data['penerbit'] = $data['view_book']['penerbit'];
                $data['idkategori'] = $data['view_book']['idkategori'];
                $data['img'] = $data['view_book']['imgfile'];
                $data['sinopsis'] = $data['view_book']['sinopsis'];
                $data['thnterbit'] = $data['view_book']['thnterbit'];

                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/editBook', $data);
                $this->load->view('dashboard/footer');
    }

   	public function update(){

		// target direktori fileupload
		$target_dir = "c:/xampp/htdocs/books/assets/images/";
		
		// baca nama file upload
		$filename = $_FILES["imgcover"]["name"];

		// menggabungkan target dir dengan nama file
		$target_file = $target_dir . basename($filename);

		// proses upload
		move_uploaded_file($_FILES["imgcover"]["tmp_name"], $target_file);

		// baca data dari form insert buku
		$idbuku = $_POST['idbuku'];
		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$sinopsis = $_POST['sinopsis'];
		$thnterbit = $_POST['thnterbit'];
		$idkategori = $_POST['idkategori'];

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->book_model->updateBook($idbuku, $judul, $pengarang, $penerbit, $thnterbit, $sinopsis, $idkategori, $filename);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/books');
	}


	// method untuk mencari data buku berdasarkan 'key'
	public function findbooks(){
		
		// baca key dari form cari data
		$key = $_POST['key'];

		// ambil session fullname untuk ditampilkan ke header
		$data['fullname'] = $_SESSION['fullname'];

		// panggil method findBook() dari model book_model untuk menjalankan query cari data
		$data['book'] = $this->book_model->findBook($key);

		// tampilkan hasil pencarian di view 'dashboard/books'
		$this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/books', $data);
        $this->load->view('dashboard/footer');
	}

	public function view($id){
                $data['view_book'] = $this->book_model->showBook($id);

                $data['fullname'] = $_SESSION['fullname'];

                if (empty($data['view_book'])){
                show_404();
                }

                $data['idbuku'] = $data['view_book']['idbuku'];
                $data['judul'] = $data['view_book']['judul'];
                $data['pengarang'] = $data['view_book']['pengarang'];
                $data['penerbit'] = $data['view_book']['penerbit'];
                $data['idkategori'] = $data['view_book']['idkategori'];
                $data['img'] = $data['view_book']['imgfile'];
                $data['sinopsis'] = $data['view_book']['sinopsis'];
                $data['thnterbit'] = $data['view_book']['thnterbit'];

                $this->load->view('dashboard/header', $data);
                $this->load->view('dashboard/view', $data);
                $this->load->view('dashboard/footer');
    }
		//KATEGORI
	public function deleteKategori($id){
		$this->book_model->delCat($id);
		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/addCat');
	}

	// method untuk tambah data buku
	public function insertKategori(){

		// baca data dari form insert buku
		$kategori = $_POST['kategori'];

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->book_model->insertCat($kategori);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/addCat');
	}

    public function editKategori($id){
        $data['view_category'] = $this->book_model->showCat($id);

        $data['fullname'] = $_SESSION['fullname'];

        if (empty($data['view_category'])){
            show_404();
        }

        $data['idkategori'] = $data['view_category']['idkategori'];
        $data['kategori'] = $data['view_category']['kategori'];

        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/editKategori', $data);
        $this->load->view('dashboard/footer');
    }

   	public function updateKategori(){
   		// baca data dari form insert buku
   		$idkategori = $_POST['idkategori'];
		$kategori = $_POST['kategori'];

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->book_model->updateCat($idkategori, $kategori);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/addCat');

	}

	//USER
	// method hapus data buku berdasarkan id
	public function deleteUser($id){
		$this->user_model->delUser($id);
		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/addUser');
	}

	// method untuk tambah data buku
	public function insertUser(){

		// baca data dari form insert buku
		$username = $_POST['username'];
		$fullname = $_POST['fullname'];
		$password = $_POST['password'];
		$idrole = $_POST['idrole'];

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->user_model->insertUser($username, $fullname, $idrole, $password);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/addUser');
	}

    public function editUser($id){
    	$data['roles'] = $this->user_model->getRole();
        $data['view_user'] = $this->user_model->showUser($id);

        $data['fullname'] = $_SESSION['fullname'];

        if (empty($data['view_user'])){
            show_404();
        }

        $data['username'] = $data['view_user']['username'];
        $data['fullname'] = $data['view_user']['fullname'];
        $data['role'] = $data['view_user']['role'];
        $data['password'] = $data['view_user']['password'];

        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/editUser', $data);
        $this->load->view('dashboard/footer');
    }

    public function updateUser(){

		$username = $_POST['username'];
		$fullname = $_POST['fullname'];
		$idrole = $_POST['idrole'];
		$password = $_POST['password'];

		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->user_model->updateUser($username, $fullname, $idrole, $password);

		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/addUser');
	}
}
?>