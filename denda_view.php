<?php require_once 'view/layout/header.php'; ?>

<h2>Data Denda Keterlambatan</h2>
<a href="index.php?controller=denda&action=create" class="btn">+ Tambah Denda Baru</a>

<table class="tabel-data display" style="width:100%">
    <thead>
        <tr>
            <th>ID Denda</th>
            <th>ID Peminjaman</th>
            <th>Nama Peminjam</th>
            <th>Buku yang Dipinjam</th>
            <th>Jumlah Denda</th>
            <th>Status Pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($denda as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td>TRX-<?= $row['peminjaman_id'] ?></td>
            <td><?= $row['nama_user'] ?></td>
            <td><?= $row['judul_buku'] ?></td>
            <td>Rp <?= number_format($row['jumlah_denda'], 0, ',', '.') ?></td>
            <td>
                <?php 
                    if($row['status_bayar'] == 'belum') {
                        echo "<span style='color: red; font-weight: bold;'>Belum Lunas</span>";
                    } else {
                        echo "<span style='color: blue; font-weight: bold;'>Lunas</span>";
                    }
                ?>
            </td>
            <td>
                <a href="index.php?controller=denda&action=edit&id=<?= $row['id'] ?>" class="btn-edit">Edit Status</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once 'view/layout/footer.php'; ?>