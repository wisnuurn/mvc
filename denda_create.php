<?php require_once 'view/layout/header.php'; ?>

<h2>Tambah Data Denda</h2>
<form action="index.php?controller=denda&action=store" method="POST">
    
    <label>Pilih Transaksi Peminjaman:</label>
    <select name="peminjaman_id" required>
        <option value="">-- Pilih Transaksi (ID - Nama - Buku) --</option>
        <?php foreach ($peminjaman as $p): ?>
            <option value="<?= $p['id'] ?>">
                TRX-<?= $p['id'] ?> | <?= $p['nama_user'] ?> | Buku: <?= $p['judul_buku'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Jumlah Denda (Rp):</label>
    <input type="number" name="jumlah_denda" required placeholder="Contoh: 15000">

    <label>Status Pembayaran:</label>
    <select name="status_bayar" required>
        <option value="belum">Belum Lunas</option>
        <option value="lunas">Lunas</option>
    </select>

    <button type="submit">Simpan Denda</button>
    <a href="index.php?controller=denda&action=index" class="btn" style="background-color: #95a5a6;">Batal</a>
</form>

<?php require_once 'view/layout/footer.php'; ?>