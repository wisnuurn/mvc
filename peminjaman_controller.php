<?php
require_once 'model/peminjaman_model.php';
require_once 'model/user_model.php';
require_once 'model/buku_model.php';

class PeminjamanController {
    public function index() {
        $model = new PeminjamanModel();
        $peminjaman = $model->getAll();
        require_once 'view/peminjaman_view.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $model = new PeminjamanModel();
        $peminjaman = $model->getById($id);
        require_once 'view/edit/peminjaman_edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new PeminjamanModel();
            $model->updateStatus($_POST['id'], $_POST['status']);
            header("Location: index.php?controller=peminjaman&action=index");
        }
    }

    public function create() {
        $userModel = new UserModel();
        $bukuModel = new BukuModel();
        
        $users = $userModel->getUsers();
        $buku = $bukuModel->getAll();
        
        require_once 'view/create/peminjaman_create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new PeminjamanModel();
            $model->insert($_POST['user_id'], $_POST['buku_id'], $_POST['tanggal_pinjam'], $_POST['tanggal_kembali'], $_POST['status']);
            header("Location: index.php?controller=peminjaman&action=index");
        }
    }
}
?>