<?php require_once 'view/layout/header.php'; ?>

<h2>Ulasan & Rating Buku</h2>
<a href="index.php?controller=ulasan&action=create" class="btn">+ Tambah Ulasan</a>

<table class="tabel-data display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Anggota</th>
            <th>Buku</th>
            <th>Rating</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ulasan as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_user'] ?></td>
            <td><?= $row['judul_buku'] ?></td>
            <td>
                <strong style="color: #f39c12; font-size: 18px;">
                    <?= str_repeat('★', $row['rating']) ?><?= str_repeat('☆', 5 - $row['rating']) ?>
                </strong>
            </td>
            <td><i>"<?= $row['komentar'] ?>"</i></td>
            <td><?= $row['tanggal'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once 'view/layout/footer.php'; ?>