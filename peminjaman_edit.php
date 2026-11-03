<?php require_once 'view/layout/header.php'; ?>

<h2>Edit Status Peminjaman</h2>

<form action="index.php?controller=peminjaman&action=update" method="POST">
    <input type="hidden" name="id" value="<?= $peminjaman['id'] ?>">
    
    <label>Ubah Status Peminjaman (ID: TRX-<?= $peminjaman['id'] ?>):</label><br>
    <select name="status" required>
        <option value="dipinjam" <?= ($peminjaman['status'] == 'dipinjam') ? 'selected' : '' ?>>Dipinjam</option>
        <option value="dikembalikan" <?= ($peminjaman['status'] == 'dikembalikan') ? 'selected' : '' ?>>Dikembalikan</option>
    </select><br><br>
    
    <button type="submit">Simpan Status</button>
    <a href="index.php?controller=peminjaman&action=index" class="btn" style="background-color: #7f8c8d;">Batal</a>
</form>

<?php require_once 'view/layout/footer.php'; ?>