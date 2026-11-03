<?php require_once 'view/layout/header.php'; ?>

<div class="invoice-box">
    <h1>NOTA TRANSAKSI PEMINJAMAN</h1>
    
    <table>
        <tr>
            <td colspan="2">
                <strong>No. Referensi:</strong> TRX-<?= rand(1000, 9999) ?><br>
                <strong>Tanggal Transaksi:</strong> <?= date('d M Y') ?>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr class="heading">
            <td>Informasi Penyewa</td>
            <td>Detail Buku</td>
        </tr>
        <tr class="item">
            <td>
                <strong>Nama:</strong> <?= $user['nama'] ?><br>
                <strong>Email:</strong> <?= $user['email'] ?><br>
                <strong>Status Akses:</strong> <?= ucfirst($user['role']) ?>
            </td>
            <td>
                <strong>Judul:</strong> <?= $buku['judul'] ?><br>
                <strong>Pengarang:</strong> <?= $buku['pengarang'] ?><br>
                <strong>Tahun:</strong> <?= $buku['tahun_terbit'] ?>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr class="heading">
            <td>Durasi Peminjaman</td>
            <td>Status Transaksi</td>
        </tr>
        <tr class="item">
            <td>
                Tanggal Pinjam: <?= $tanggal_pinjam ?><br>
                Tanggal Kembali: <?= $tanggal_kembali ?>
            </td>
            <td>
                <strong>BERHASIL DISERAHKAN</strong>
            </td>
        </tr>
    </table>

    <div class="total">
        Total Durasi Sewa: <?= $durasi ?> Hari
    </div>
    
    <div style="text-align: center; margin-top: 30px;">
        <button onclick="window.print()" class="btn" style="background-color: #27ae60;">Cetak Nota (PDF)</button>
        <a href="index.php?controller=buku&action=index" class="btn">Kembali ke Katalog</a>
    </div>
</div>

<?php require_once 'view/layout/footer.php'; ?>