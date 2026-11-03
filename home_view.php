<?php require_once 'view/layout/header.php'; ?>

<div style="text-align: center; padding: 40px 20px;">
    <h1 style="color: #2c3e50; font-size: 36px;">Selamat Datang di SIPERPUS</h1>
    <p style="font-size: 18px; color: #7f8c8d; margin-top: 10px;">Platform Manajemen Perpustakaan Digital Berbasis MVC PHP</p>
    
    <?php if(!isset($_SESSION['user_id'])): ?>
        <div style="margin-top: 30px;">
            <p>Silakan login untuk meminjam buku atau memberikan ulasan.</p>
            <a href="index.php?controller=auth&action=login" class="btn" style="padding: 15px 30px; font-size: 16px;">Login ke Akun Anda</a>
        </div>
    <?php else: ?>
        <div style="margin-top: 30px;">
            <a href="index.php?controller=buku&action=index" class="btn" style="padding: 15px 30px; font-size: 16px;">Lihat Katalog Buku</a>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'view/layout/footer.php'; ?>