<?php require_once 'view/layout/header.php'; ?>
<h2>Edit Kategori</h2>
<form action="index.php?controller=kategori&action=update" method="POST">
    <input type="hidden" name="id" value="<?= $kategori['id'] ?>">
    <label>Nama Kategori:</label><br>
    <input type="text" name="nama_kategori" value="<?= $kategori['nama_kategori'] ?>" required><br>
    <button type="submit">Update Kategori</button>
    <a href="index.php?controller=kategori&action=index" class="btn" style="background-color: #7f8c8d;">Batal</a>
</form>
<?php require_once 'view/layout/footer.php'; ?>