<?php
require_once 'database.php';

class UlasanModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        // Melakukan JOIN ke tabel users dan buku
        $query = "SELECT ulasan.*, users.nama as nama_user, buku.judul as judul_buku 
                  FROM ulasan 
                  LEFT JOIN users ON ulasan.user_id = users.id 
                  LEFT JOIN buku ON ulasan.buku_id = buku.id
                  ORDER BY ulasan.id DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($user_id, $buku_id, $rating, $komentar, $tanggal) {
        $query = "INSERT INTO ulasan (user_id, buku_id, rating, komentar, tanggal) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiiss", $user_id, $buku_id, $rating, $komentar, $tanggal);
        return $stmt->execute();
    }
}
?>