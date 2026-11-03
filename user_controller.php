<?php
require_once 'model/user_model.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function index() {
        $users = $this->model->getUsers();
        require_once 'view/user_view.php';
    }

    public function create() {
        require_once 'view/create/user_create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insert($_POST['nama'], $_POST['email'], $_POST['role']);
            header("Location: index.php?controller=user&action=index");
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $user = $this->model->getById($id);
        require_once 'view/edit/user_edit.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->update($_POST['id'], $_POST['nama'], $_POST['email'], $_POST['role']);
            header("Location: index.php?controller=user&action=index");
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header("Location: index.php?controller=user&action=index");
    }
}
?>