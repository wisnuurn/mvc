<?php require_once 'view/layout/header.php'; ?>

<h2>Tulis Ulasan Buku</h2>
<form action="index.php?controller=ulasan&action=store" method="POST">
    
    <!-- Profil Terkunci Otomatis (Fix Dropdown User) -->
    <label>Nama Pengulas:</label><br>
    <input type="text" value="<?= $_SESSION['nama'] ?>" readonly style="background-color: #f1f2f6; cursor: not-allowed; width: 100%; padding: 12px; margin-top: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;">
    
    <!-- Dropdown Buku -->
    <label>Pilih Buku:</label><br>
    <select name="buku_id" required>
        <option value="">-- Pilih Buku yang Ingin Diulas --</option>
        <?php foreach ($buku as $b): ?>
            <option value="<?= $b['id'] ?>"><?= $b['judul'] ?></option>
        <?php endforeach; ?>
    </select><br><br>
    
    <!-- Dropdown Rating -->
    <label>Rating (1-5 Bintang):</label><br>
    <select name="rating" required>
        <option value="5">⭐⭐⭐⭐⭐ (5 - Sangat Bagus)</option>
        <option value="4">⭐⭐⭐⭐ (4 - Bagus)</option>
        <option value="3">⭐⭐⭐ (3 - Cukup)</option>
        <option value="2">⭐⭐ (2 - Kurang)</option>
        <option value="1">⭐ (1 - Buruk)</option>
    </select><br><br>
    
    <label>Komentar & Kesan:</label><br>
    <textarea name="komentar" rows="4" required placeholder="Ceritakan pendapat Anda tentang buku ini..."></textarea><br>
    
    <button type="submit">Kirim Ulasan</button>
    <a href="index.php?controller=ulasan&action=index" class="btn" style="background-color: #7f8c8d;">Batal</a>
</form>

<?php require_once 'view/layout/footer.php'; ?>