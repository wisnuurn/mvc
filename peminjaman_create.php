<?php require_once 'view/layout/header.php'; ?>

<h2>Tambah Data Peminjaman</h2>
<form action="index.php?controller=peminjaman&action=store" method="POST">
    
    <label>Pilih Peminjam (User):</label>
    <select name="user_id" required>
        <option value="">-- Pilih User --</option>
        <?php foreach ($users as $u): ?>
            <option value="<?= $u['id'] ?>"><?= $u['nama'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Pilih Buku:</label>
    <select name="buku_id" required>
        <option value="">-- Pilih Buku --</option>
        <?php foreach ($buku as $b): ?>
            <option value="<?= $b['id'] ?>"><?= $b['judul'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>Tanggal Pinjam:</label>
    <input type="date" name="tanggal_pinjam" required>

    <label>Tanggal Kembali:</label>
    <input type="date" name="tanggal_kembali" required>

    <label>Status:</label>
    <select name="status" required>
        <option value="dipinjam">Dipinjam</option>
        <option value="dikembalikan">Dikembalikan</option>
    </select>

    <button type="submit">Simpan Peminjaman</button>
    <a href="index.php?controller=peminjaman&action=index" class="btn" style="background-color: #95a5a6;">Batal</a>
</form>

<?php require_once 'view/layout/footer.php'; ?>