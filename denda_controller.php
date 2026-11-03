<?php
require_once 'model/denda_model.php';
require_once 'model/peminjaman_model.php';

class DendaController {
    public function index() {
        $model = new DendaModel();
        $denda = $model->getAll();
        require_once 'view/denda_view.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $model = new DendaModel();
        $denda = $model->getById($id);
        require_once 'view/edit/denda_edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new DendaModel();
            $model->updateStatus($_POST['id'], $_POST['status_bayar']);
            header("Location: index.php?controller=denda&action=index");
        }
    }

    public function create() {
        $peminjamanModel = new PeminjamanModel();
        $peminjaman = $peminjamanModel->getAll();
        require_once 'view/create/denda_create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = new DendaModel();
            $model->insert($_POST['peminjaman_id'], $_POST['jumlah_denda'], $_POST['status_bayar']);
            header("Location: index.php?controller=denda&action=index");
        }
    }
}
?>