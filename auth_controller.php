<?php
require_once 'model/user_model.php';

class AuthController {
    public function login() {
        require_once 'view/auth/login.php';
    }

    public function proses_login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = md5($_POST['password']); 
            
            $model = new UserModel();
            $user = $model->cekLogin($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['nama'] = $user['nama'];
                $_SESSION['role'] = $user['role'];
                
                $_SESSION['notifikasi'] = "Berhasil Login! Selamat datang, " . $user['nama'] . ".";
                header("Location: index.php?controller=home&action=index");
            } else {
                $_SESSION['notifikasi'] = "Gagal login! Email atau password salah.";
                header("Location: index.php?controller=auth&action=login");
            }
        }
    }

    // Fungsi menampilkan halaman form registrasi
    public function register() {
        require_once 'view/auth/register.php';
    }

    // Fungsi memproses data registrasi
    public function proses_register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = md5($_POST['password']); // Enkripsi MD5
            $role = 'anggota'; // Default pendaftar baru adalah anggota

            $model = new UserModel();
            $model->insert($nama, $email, $password, $role);

            $_SESSION['notifikasi'] = "Registrasi Berhasil! Silakan login menggunakan akun baru Anda.";
            header("Location: index.php?controller=auth&action=login");
        }
    }

    public function logout() {
        session_destroy();
        session_start();
        $_SESSION['notifikasi'] = "Anda berhasil logout.";
        header("Location: index.php?controller=home&action=index");
    }
}
?>