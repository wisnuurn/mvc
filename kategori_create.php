<?php require_once 'view/layout/header.php'; ?>
<h2>Tambah Kategori</h2>
<form action="index.php?controller=kategori&action=store" method="POST">
    <label>Nama Kategori:</label><br>
    <input type="text" name="nama_kategori" required placeholder="Contoh: Majalah, Biografi, dll"><br>
    <button type="submit">Simpan Kategori</button>
    <a href="index.php?controller=kategori&action=index" class="btn" style="background-color: #7f8c8d;">Batal</a>
</form>
<?php require_once 'view/layout/footer.php'; ?>