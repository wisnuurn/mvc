<?php
require_once 'model/about_model.php';

class AboutController {
    public function index() {
        $model = new AboutModel();
        $info = $model->getAboutInfo(); // Ambil data dari model
        
        // Load view dan passing data
        require_once 'view/about_view.php';
    }
}
?>