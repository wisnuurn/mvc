<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPERPUS MVC</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body class="bg-light">
    <?php $role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest'; ?>
    
    <!-- Navbar Bootstrap 5 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold" href="index.php?controller=home&action=index">
                <span class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center me-2" style="width: 38px; height: 38px;">SP</span>
                SIPERPUS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php?controller=home&action=index">Beranda</a></li>
                    
                    <?php if($role == 'admin'): ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?controller=kategori&action=index">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?controller=buku&action=index">Kelola Buku</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?controller=user&action=index">Data User</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?controller=peminjaman&action=index">Peminjaman</a></li>
                    <?php endif; ?>

                    <?php if($role == 'anggota' || $role == 'guest'): ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?controller=buku&action=index">Katalog Buku</a></li>
                    <?php endif; ?>

                    <li class="nav-item"><a class="nav-link" href="index.php?controller=ulasan&action=index">Ulasan</a></li>
                </ul>
                <div class="d-flex">
                    <?php if($role == 'guest'): ?>
                        <a href="index.php?controller=auth&action=login" class="btn btn-warning text-white fw-bold">Login / Daftar</a>
                    <?php else: ?>
                        <a href="index.php?controller=auth&action=logout" class="btn btn-danger">Logout (<?= htmlspecialchars($_SESSION['nama']) ?>)</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container py-4">