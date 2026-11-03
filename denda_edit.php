<?php require_once 'view/layout/header.php'; ?>

<h2>Edit Status Denda</h2>

<form action="index.php?controller=denda&action=update" method="POST">
    <input type="hidden" name="id" value="<?= $denda['id'] ?>">
    
    <label>Ubah Status Pembayaran Denda (ID Denda: <?= $denda['id'] ?>):</label><br>
    <select name="status_bayar" required>
        <option value="belum" <?= ($denda['status_bayar'] == 'belum') ? 'selected' : '' ?>>Belum Lunas</option>
        <option value="lunas" <?= ($denda['status_bayar'] == 'lunas') ? 'selected' : '' ?>>Lunas</option>
    </select><br><br>
    
    <button type="submit">Simpan Status</button>
    <a href="index.php?controller=denda&action=index" class="btn" style="background-color: #7f8c8d;">Batal</a>
</form>

<?php require_once 'view/layout/footer.php'; ?>