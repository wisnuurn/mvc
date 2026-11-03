<?php
require_once 'model/ulasan_model.php';
require_once 'model/buku_model.php';

class UlasanController {
    private $model;

    public function __construct() {
        $this->model = new UlasanModel();
    }

    public function index() {
        $ulasan = $this->model->getAll();
        require_once 'view/ulasan_view.php';
    }

    public function create() {
        // Cek Login: Guest dilarang masuk
        if(!isset($_SESSION['user_id'])) {
            $_SESSION['notifikasi'] = "Anda harus login terlebih dahulu untuk memberikan ulasan.";
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        $bukuModel = new BukuModel();
        $buku = $bukuModel->getAll();
        require_once 'view/ulasan_create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // ID User otomatis diambil dari sesi yang sedang login
            $user_id = $_SESSION['user_id'];
            
            $this->model->insert($user_id, $_POST['buku_id'], $_POST['rating'], $_POST['komentar']);
            
            $_SESSION['notifikasi'] = "Terima kasih! Ulasan Anda berhasil dikirim.";
            header("Location: index.php?controller=ulasan&action=index");
        }
    }
    
    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);
        $_SESSION['notifikasi'] = "Ulasan berhasil dihapus.";
        header("Location: index.php?controller=ulasan&action=index");
    }
}
?>