<?php
require_once 'model/buku_model.php';
require_once 'model/user_model.php';
require_once 'model/peminjaman_model.php';

class TransaksiController {
    public function checkout() {
        // Cek login
        if(!isset($_SESSION['user_id'])) {
            $_SESSION['notifikasi'] = "Akses Ditolak! Anda harus login terlebih dahulu untuk meminjam buku.";
            header("Location: index.php?controller=auth&action=login");
            exit;
        }

        $buku_id = $_GET['buku_id'];
        
        $bukuModel = new BukuModel();
        $userModel = new UserModel();
        
        $buku = $bukuModel->getById($buku_id);
        
        // Ambil semua user untuk keperluan opsi dropdown Admin
        $users = $userModel->getUsers(); 
        
        require_once 'view/transaksi_checkout.php';
    }

    public function process() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_POST['user_id'];
            $buku_id = $_POST['buku_id'];
            $tanggal_pinjam = $_POST['tanggal_pinjam'];
            $tanggal_kembali = $_POST['tanggal_kembali'];
            $status_peminjaman = 'dipinjam';

            $peminjamanModel = new PeminjamanModel();
            $peminjamanModel->insert($user_id, $buku_id, $tanggal_pinjam, $tanggal_kembali, $status_peminjaman);

            $bukuModel = new BukuModel();
            $buku = $bukuModel->getById($buku_id);
            $bukuModel->update($buku['id'], $buku['judul'], $buku['pengarang'], $buku['tahun_terbit'], $buku['kategori_id'], $buku['gambar'], 'Dipinjam');

            $userModel = new UserModel();
            $user = $userModel->getById($user_id);

            $datetime1 = new DateTime($tanggal_pinjam);
            $datetime2 = new DateTime($tanggal_kembali);
            $durasi = $datetime1->diff($datetime2)->days;

            $_SESSION['notifikasi'] = "Transaksi Berhasil! Silakan cetak nota peminjaman Anda.";
            require_once 'view/transaksi_invoice.php';
        }
    }
}
?>