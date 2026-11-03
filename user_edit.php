<?php require_once 'view/layout/header.php'; ?>

<h2>Edit Data User</h2>
<form action="index.php?controller=user&action=update" method="POST">
    <!-- ID disembunyikan untuk keperluan update database -->
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    
    <label>Nama Lengkap:</label><br>
    <input type="text" name="nama" value="<?= $user['nama'] ?>" required><br>
    
    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $user['email'] ?>" required style="width: 100%; padding: 12px; margin-top: 8px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;"><br>
    
    <label>Role (Hak Akses):</label><br>
    <select name="role" required>
        <option value="anggota" <?= ($user['role'] == 'anggota') ? 'selected' : '' ?>>Anggota</option>
        <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
    </select><br><br>
    
    <button type="submit">Update User</button>
    <a href="index.php?controller=user&action=index" class="btn" style="background-color: #7f8c8d;">Batal</a>
</form>

<?php require_once 'view/layout/footer.php'; ?>