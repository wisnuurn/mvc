<?php require_once 'view/layout/header.php'; ?>

<h2>Data Kategori Buku</h2>
<a href="index.php?controller=kategori&action=create" class="btn">+ Tambah Kategori Baru</a>

<table class="tabel-data display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kategori as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_kategori'] ?></td>
            <td>
                <a href="index.php?controller=kategori&action=edit&id=<?= $row['id'] ?>" class="btn-edit">Edit</a> 
                <a href="index.php?controller=kategori&action=delete&id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Yakin hapus kategori ini? Pastikan tidak ada buku yang memakai kategori ini.')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once 'view/layout/footer.php'; ?>