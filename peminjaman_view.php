<?php require_once 'view/layout/header.php'; ?>

<h2>Data Peminjaman Buku</h2>
<a href="index.php?controller=peminjaman&action=create" class="btn">+ Tambah Peminjaman Baru</a>

<table class="tabel-data display" style="width:100%">
    <thead>
        <tr>
            <th>ID Transaksi</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($peminjaman as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_user'] ?></td>
            <td><?= $row['judul_buku'] ?></td>
            <td><?= $row['tanggal_pinjam'] ?></td>
            <td><?= $row['tanggal_kembali'] ?></td>
            <td>
                <?php 
                    if($row['status'] == 'dipinjam') {
                        echo "<span style='color: orange; font-weight: bold;'>Dipinjam</span>";
                    } else {
                        echo "<span style='color: green; font-weight: bold;'>Dikembalikan</span>";
                    }
                ?>
            </td>
            <td>
                <a href="index.php?controller=peminjaman&action=edit&id=<?= $row['id'] ?>" class="btn-edit">Edit Status</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once 'view/layout/footer.php'; ?>