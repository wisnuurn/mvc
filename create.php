<?php require_once 'view/layout/header.php'; ?>

<h2>Tambah Buku Baru</h2>
<form action="index.php?controller=buku&action=store" method="POST" enctype="multipart/form-data">
    
    <label>Judul Buku:</label>
    <input type="text" name="judul" required placeholder="Masukkan judul buku">

    <label>Pengarang:</label>
    <input type="text" name="pengarang" required placeholder="Nama penulis">

    <label>Tahun Terbit:</label>
    <input type="number" name="tahun_terbit" min="1000" max="2026" required placeholder="Contoh: 2023">
    <label>Kategori:</label>
    <select name="kategori_id" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($kategori as $kat): ?>
            <option value="<?= $kat['id'] ?>"><?= $kat['nama_kategori'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Status Ketersediaan:</label>
    <select name="status" required>
        <option value="Tersedia">Tersedia</option>
        <option value="Dipinjam">Sedang Disewa / Dipinjam</option>
    </select>

    <label>Upload Cover/Sampul Buku (Gambar):</label>
    <input type="file" name="gambar" accept="image/*" style="width: 100%; padding: 10px; margin-top: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;">

    <button type="submit">Simpan Buku</button>
    <a href="index.php?controller=buku&action=index" class="btn" style="background-color: #95a5a6;">Batal</a>
</form>

<?php require_once 'view/layout/footer.php'; ?>