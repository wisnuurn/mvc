<?php
require_once 'model/kategori_model.php';

class KategoriController {
    private $model;

    public function __construct() {
        $this->model = new KategoriModel();
    }

    public function index() {
        $kategori = $this->model->getAll();
        require_once 'view/kategori_view.php';
    }

    public function create() {
        require_once 'view/create/kategori_create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insert($_POST['nama_kategori']);
            header("Location: index.php?controller=kategori&action=index");
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $kategori = $this->model->getById($id);
        require_once 'view/edit/kategori_edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($_POST['id'], $_POST['nama_kategori']);
            header("Location: index.php?controller=kategori&action=index");
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header("Location: index.php?controller=kategori&action=index");
    }
}
?>