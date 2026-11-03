<?php
require_once 'model/buku_model.php';
require_once 'model/kategori_model.php';

class BukuController {
    private $model;
    private $kategoriModel;

    public function __construct() {
        $this->model = new BukuModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index() {
        $buku = $this->model->getAll();
        require_once 'view/buku/index.php';
    }

    public function create() {
        $kategori = $this->kategoriModel->getAll();
        require_once 'view/buku/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Gambar default jika user tidak mengunggah foto
            $gambar = 'https://via.placeholder.com/250x250?text=Cover+Buku'; 
            
            // Proses Upload Gambar
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
                $target_dir = "assets/uploads/";
                $nama_file = time() . '_' . basename($_FILES["gambar"]["name"]);
                $target_file = $target_dir . $nama_file;
                
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                    $gambar = $target_file;
                }
            }

            // Menyimpan data beserta status (bukan stok)
            $this->model->insert($_POST['judul'], $_POST['pengarang'], $_POST['tahun_terbit'], $_POST['kategori_id'], $gambar, $_POST['status']);
            header("Location: index.php?controller=buku&action=index");
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $buku = $this->model->getById($id);
        $kategori = $this->kategoriModel->getAll();
        require_once 'view/buku/edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Gunakan gambar lama sebagai default agar tidak hilang
            $gambar = $_POST['gambar_lama']; 
            
            // Jika user mengunggah foto baru, timpa gambar lama
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
                $target_dir = "assets/uploads/";
                $nama_file = time() . '_' . basename($_FILES["gambar"]["name"]);
                $target_file = $target_dir . $nama_file;
                
                if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                    $gambar = $target_file;
                }
            }

            // Memperbarui data beserta status
            $this->model->update($_POST['id'], $_POST['judul'], $_POST['pengarang'], $_POST['tahun_terbit'], $_POST['kategori_id'], $gambar, $_POST['status']);
            header("Location: index.php?controller=buku&action=index");
        }
    }

    public function delete() {
        $id = $_GET['id'];
        
        try {
            // Mencoba menghapus buku
            $this->model->delete($id);
            header("Location: index.php?controller=buku&action=index");
        } catch (mysqli_sql_exception $e) {
            // Jika gagal karena buku pernah dipinjam (Foreign Key), tampilkan error
            header("Location: index.php?controller=buku&action=index&error=relasi");
        }
    }
}
?>