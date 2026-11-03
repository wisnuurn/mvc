<?php require_once 'view/layout/header.php'; ?>

<h2>Tambah Data User</h2>
<form action="index.php?controller=user&action=store" method="POST">
    
    <label>Nama Lengkap:</label><br>
    <input type="text" name="nama" required placeholder="Masukkan nama lengkap"><br>
    
    <label>Email:</label><br>
    <input type="email" name="email" required placeholder="Masukkan email aktif" style="width: 100%; padding: 12px; margin-top: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;"><br>
    
    <label>Role (Hak Akses):</label><br>
    <select name="role" required>
        <option value="anggota">Anggota</option>
        <option value="admin">Admin</option>
    </select><br><br>
    
    <button type="submit">Simpan User</button>
    <a href="index.php?controller=user&action=index" class="btn" style="background-color: #7f8c8d;">Batal</a>
</form>

<?php require_once 'view/layout/footer.php'; ?>