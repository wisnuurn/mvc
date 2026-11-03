<?php require_once 'view/layout/header.php'; ?>

<h2>Edit Data Buku</h2>
<form action="index.php?controller=buku&action=update" method="POST" enctype="multipart/form-data">
    
    <input type="hidden" name="id" value="<?= $buku['id'] ?>">
    <!-- PENTING: Menyimpan link gambar lama agar tidak hilang jika tidak diupdate -->
    <input type="hidden" name="gambar_lama" value="<?= $buku['gambar'] ?>">
    
    <label>Judul Buku:</label>
    <input type="text" name="judul" value="<?= $buku['judul'] ?>" required>

    <label>Pengarang:</label>
    <input type="text" name="pengarang" value="<?= $buku['pengarang'] ?>" required>

 <label>Tahun Terbit:</label>
<input type="number" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>" min="1000" max="2026" required>
    <label>Kategori:</label>
    <select name="kategori_id" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($kategori as $kat): ?>
            <option value="<?= $kat['id'] ?>" <?= ($buku['kategori_id'] == $kat['id']) ? 'selected' : '' ?>>
                <?= $kat['nama_kategori'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Status Ketersediaan:</label>
    <select name="status" required>
        <option value="Tersedia" <?= ($buku['status'] == 'Tersedia') ? 'selected' : '' ?>>Tersedia</option>
        <option value="Dipinjam" <?= ($buku['status'] == 'Dipinjam') ? 'selected' : '' ?>>Sedang Disewa / Dipinjam</option>
    </select>

    <label>Upload Cover Baru (Kosongkan jika tidak ingin mengubah):</label>
    <input type="file" name="gambar" accept="image/*" style="width: 100%; padding: 10px; margin-top: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;">
    
    <?php if(!empty($buku['gambar'])): ?>
        <p style="font-size: 12px; margin-bottom: 20px; color: #7f8c8d;">Cover saat ini sudah tersimpan.</p>
    <?php endif; ?>

    <button type="submit">Update Buku</button>
    <a href="index.php?controller=buku&action=index" class="btn" style="background-color: #95a5a6;">Batal</a>
</form>

<?php require_once 'view/layout/footer.php'; ?>