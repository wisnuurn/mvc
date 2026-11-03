<?php require_once 'view/layout/header.php'; ?>

<?php if(isset($_GET['error']) && $_GET['error'] == 'relasi'): ?>
    <script>alert("GAGAL MENGHAPUS BUKU!\nBuku ini tidak dapat dihapus karena masih memiliki riwayat transaksi.");</script>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
    <h2 class="h3 m-0">Koleksi Buku Perpustakaan</h2>
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <a href="index.php?controller=buku&action=create" class="btn btn-primary">+ Tambah Buku Baru</a>
    <?php endif; ?>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-8">
        <input type="text" id="cariBuku" class="form-control" placeholder="Cari judul buku atau pengarang...">
    </div>
    <div class="col-md-4">
        <select id="filterKategori" class="form-select">
            <option value="">-- Semua Kategori --</option>
            <?php 
                $kategori_unik = array_unique(array_column($buku, 'nama_kategori'));
                foreach($kategori_unik as $kat): 
                    if(!empty($kat)):
            ?>
                <option value="<?= strtolower($kat) ?>"><?= htmlspecialchars($kat) ?></option>
            <?php endif; endforeach; ?>
        </select>
    </div>
</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" id="daftarBuku">
    <?php 
    $role = isset($_SESSION['role']) ? $_SESSION['role'] : 'guest';
    foreach ($buku as $row): 
        if ($role != 'admin' && $row['status'] == 'Dipinjam') {
            continue; 
        }
    ?>
    <div class="col card-item">
        <div class="card h-100 shadow-sm text-center border-0">
            <img src="<?= !empty($row['gambar']) ? $row['gambar'] : 'https://via.placeholder.com/250x250?text=Cover+Buku' ?>" class="card-img-top" alt="Cover" style="height: 220px; object-fit: cover;">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title text-truncate judul-buku h6"><?= htmlspecialchars($row['judul']) ?></h5>
                    <span class="kategori-buku d-none"><?= strtolower($row['nama_kategori']) ?></span>
                    <p class="card-text text-muted small mb-2"><?= htmlspecialchars($row['pengarang']) ?> <br> <?= $row['tahun_terbit'] ?> | <?= htmlspecialchars($row['nama_kategori']) ?></p>
                </div>
                <div class="mt-2">
                    <?php if($row['status'] == 'Tersedia'): ?>
                        <span class="badge bg-success-subtle text-success border border-success mb-2">Status: Tersedia</span>
                        <a href="index.php?controller=transaksi&action=checkout&buku_id=<?= $row['id'] ?>" class="btn btn-primary btn-sm w-100 rounded-pill">Pinjam Sekarang</a>
                    <?php else: ?>
                        <span class="badge bg-warning-subtle text-warning border border-warning mb-2">Status: Sedang Disewa</span>
                        <button class="btn btn-secondary btn-sm w-100 rounded-pill" disabled>Tidak Tersedia</button>
                    <?php endif; ?>
                    
                    <?php if($role == 'admin'): ?>
                    <div class="btn-group btn-group-sm w-100 mt-2" role="group">
                        <a href="index.php?controller=buku&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning text-white">Edit</a> 
                        <a href="index.php?controller=buku&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php require_once 'view/layout/footer.php'; ?>

<script>
$(document).ready(function(){
    function saringBuku() {
        var teksCari = $("#cariBuku").val().toLowerCase();
        var teksKategori = $("#filterKategori").val();

        $("#daftarBuku .card-item").filter(function() {
            var cocokTeks = $(this).text().toLowerCase().indexOf(teksCari) > -1;
            var cocokKategori = (teksKategori === "") || $(this).find('.kategori-buku').text() === teksKategori;
            
            $(this).toggle(cocokTeks && cocokKategori);
        });
    }

    $("#cariBuku").on("keyup", saringBuku);
    $("#filterKategori").on("change", saringBuku);
});
</script>