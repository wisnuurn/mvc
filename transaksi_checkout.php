<?php require_once 'view/layout/header.php'; ?>

<h2>Checkout Peminjaman Buku</h2>
<div class="container" style="max-width: 600px; margin-top: 0; box-shadow: 0 4px 10px rgba(0,0,0,0.05); padding: 30px; border-radius: 8px; background: #fff;">
    <div style="text-align: center; margin-bottom: 25px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
        <h3><?= $buku['judul'] ?></h3>
        <p style="color: #7f8c8d; font-size: 14px;">Pengarang: <?= $buku['pengarang'] ?></p>
    </div>

    <form action="index.php?controller=transaksi&action=process" method="POST">
        <input type="hidden" name="buku_id" value="<?= $buku['id'] ?>">
        
        <label>Profil Penyewa:</label>
        
        <?php if($_SESSION['role'] == 'admin'): ?>
            <!-- Tampilan Khusus Admin: Bisa memilih akun user lain -->
            <select name="user_id" required>
                <option value="">-- Pilih Profil Penyewa --</option>
                <?php foreach ($users as $u): ?>
                    <option value="<?= $u['id'] ?>" <?= ($u['id'] == $_SESSION['user_id']) ? 'selected' : '' ?>>
                        <?= $u['nama'] ?> (<?= $u['email'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        <?php else: ?>
            <!-- Tampilan Khusus Anggota: Terkunci pada akun sendiri -->
            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
            <input type="text" value="<?= $_SESSION['nama'] ?> (Akun Anda)" readonly style="background-color: #f1f2f6; cursor: not-allowed; width: 100%; padding: 12px; margin-top: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; font-weight: bold; color: #555;">
        <?php endif; ?>

        <label>Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" required value="<?= date('Y-m-d') ?>">

        <label>Rencana Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" required>

        <button type="submit" class="btn-checkout" style="width: 100%; border-radius: 5px; font-size: 16px; padding: 12px; margin-top: 10px;">Konfirmasi & Cetak Nota</button>
    </form>
</div>

<?php require_once 'view/layout/footer.php'; ?>